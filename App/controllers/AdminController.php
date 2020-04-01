<?php
use App\Core\Controller;

class AdminController extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['elenka_adminsession']))
        {
            self::auth();
        }
        $this->view('admin/index',[],'admin');
    }

    public function arsip()
    {
        $result = $this->model('MapelModel')->show();
        // var_dump($result);
        // die();
        $result = $result===NULL ? NULL : $result;

        if(!is_null($result)){
            $key = array_keys($result);

            $count = count($key);
            $num = NULL;

            for ($i=0; $i < $count ; $i++) { 
                if(is_numeric($key[$i])) $num = true;
            }

            // foreach ($resultkey as $key) {
            //     if(!is_numeric($key)) $num = false;
            // }
                if(!$num):
                    $data['mapel'][] = $result;
                else:
                    $data['mapel'] = $result;
                endif;
            // var_dump($data['mapel']);
            // die();
        }else{
            $data['mapel']=NULL;
        }

        $result = $this->model('PaketSoalModel')->show('id');
        // var_dump($result);
        // die();
        $result = $result===NULL ? NULL : $result;

        if(!is_null($result)){
            $key = array_keys($result);

            $count = count($key);
            $num = NULL;

            for ($i=0; $i < $count ; $i++) { 
                if(is_numeric($key[$i])) $num = true;
            }

            // foreach ($resultkey as $key) {
            //     if(!is_numeric($key)) $num = false;
            // }
                if(!$num):
                    $data['paketsoal'][] = $result;
                else:
                    $data['paketsoal'] = $result;
                endif;
            // var_dump($data['paketsoal']);
            // die();
        }else{
            $data['paketsoal']=NULL;
        }
        
        $this->view('Admin/arsip',$data,'admin');
    }

    public function arsip_upload()
    {
        $temporary_file = $_FILES['formfile_elenka_uploadsoal']['tmp_name'];
        $type_file = $_FILES['formfile_elenka_uploadsoal']['type'];
        $name_file = $_FILES['formfile_elenka_uploadsoal']['name'].'_'.date("Ymdhisa").'.xlsx';
        // echo $name_file;
        
        // die();

        // echo $type_file;
        if( $type_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $type_file == "application/vnd.ms-excel" )
        {   
            $target_file = "../public_html/soal/".$name_file;

            if(move_uploaded_file($temporary_file,$target_file))
            {
                chmod($target_file,0777); // permission to read,write,execute,rewrite
                
                require "../App/vendor/spreadsheetreader/ExcelReader/excel_reader2.php";
                require "../App/vendor/spreadsheetreader/SpreadsheetReader.php";

                $Spreadsheet = new SpreadsheetReader($target_file);
                // var_dump($Spreadsheet);
                
                $Sheets = $Spreadsheet -> Sheets(2);

                /**
                 * set data
                 * Paket soal
                 */
                $data = [
                    'idGuru' => $_SESSION['elenka_adminsession'],
                    'idMatapelajaran' => $_POST['elenka_mapel'],
                    'idKelas' => $_SESSION['elenka_adminkelas'],
                    'idBagian' => $_SESSION['elenka_adminbagian']
                ];
                // var_dump($data);
                // die();

                if($res = $this->model('PaketSoalModel')->store($data)){

                    $res = $this->model('PaketSoalModel')->show('lastId');

                    foreach ($Spreadsheet as $key => $value) {
                        if( $key < 1 ) continue;
                            $data = [
                                'idPaketSoal' => $res['id'],
                                'pertanyaan' => $value[1],
                                'a' => $value[2],
                                'b' => $value[3],
                                'c' => $value[4],
                                'kunciJawaban' => $value[5],
                            ];
                        // var_dump($data);
                        
                        $result = $this->model('ButirSoalModel')->store($data);
                        // var_dump($result);die();

                        if($result){
                            Flasher::setFlash('File berhasil diupload', true);
                        }else{
                            Flasher::setFlash('Gagal! silakan hubungi Administrator', False);
                            unlink($target_file);
                        }
                    }
                }
            }else{
                Flasher::setFlash('Gagal Upload! silakan hubungi Administrator', False);
            }
            // header('location:'.BASEURL.'Admin/arsip');
        }else
        {
            Flasher::setFlash('File harus berbentuk excel atau berextensi .xlxs', FALSE);
            // header('location:'.BASEURL.'Admin/arsip');
        }
        // echo chmod($name_file,0777);
        header('location:'.BASEURL.'Admin/arsip');

    }

    public function arsip_reset()
    {
        if(isset($_SESSION['elenka_adminsession'])){
            $condition = ['idMatapelajaran'=>$_POST['id'],'idGuru'=>$_SESSION['elenka_adminsession']];

            $res = $this->model('PaketSoalModel')->destroy($condition);
        }
    }

    public function auth()
    {
        if(!isset($_SESSION['elenka_usersession']) && !isset($_SESSION['elenka_adminsession'])){
            $data['admin']=1;
            $this->view('auth/index',$data);
        }
    }

    public function authentication()
    {
        $account = [
            'username'=>$_POST['elenka_username'],
            'password'=>$_POST['elenka_password']
        ];

        if ($res=$this->model('GuruModel')->auth($account))
        {   
            /**
             * set session
             */
            $_SESSION['elenka_adminsession'] = $res['id'];
            $_SESSION['elenka_adminname'] = $res['nama'];
            $_SESSION['elenka_adminkelas'] = $res['idKelas'];
            $_SESSION['elenka_adminbagian'] = $res['idBagian'];

        }else
        {
            Flasher::setFlash('Username dan password tidak valid', false);
        }

        header('location:'.BASEURL.'admin');
    }

    public function logout()
    {
        unset($_SESSION['elenka_authAdmin']);
        session_destroy();
        header('location:'.BASEURL.'Admin/index');
    }
}