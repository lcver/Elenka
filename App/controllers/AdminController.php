<?php
use App\Core\Controller;

class AdminController extends Controller
{
    public function index()
    {
        /**
         * check session
         * 
         */
        if(!isset($_SESSION['elenka_adminsession'])){
            self::auth();
            return false;
        }

        /**
         * show nilai siswa
         * 
         */
        $result = $this->model('TampilNilaiModel')->create();
        // var_dump($result);die();

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
                    $data[] = $result;
                else:
                    $data = $result;
                endif;
            // var_dump($data);
            // die();
        }else{
            $data=[];
        }
        // var_dump($data);
        // die();

        $this->view('admin/index',$data,'admin');
    }

    public function arsip()
    {
        /**
         * check session
         * 
         */
        if(!isset($_SESSION['elenka_adminsession'])) self::auth();

        
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

        /**
         * List Paket Soal
         */
        $result = $this->model('PaketSoalModel')->show('id');
        // var_dump($result);
        // die();

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
        
        /**
         * 
         * 
         */

        $this->view('admin/arsip',$data,'admin');
    }

    public function arsip_upload()
    {
        /**
         * check session
         * 
         */
        if(!isset($_SESSION['elenka_adminsession'])) self::auth();

        /**
         * check empty field
         * 
         */
        $err=false;
        if($_POST['elenka_mapel']==="_BLANK_"):
            Flasher::setFlash('Pilih Mata Pelajaran!',false);
            $err = TRUE;
        elseif($_FILES['formfile_elenka_uploadsoal']['tmp_name']==="" or $_FILES['formfile_elenka_uploadsoal']['tmp_name']===NULL):
            Flasher::setFlash('Pilih file upload!',false);
            $err = TRUE;
        endif;

        if($err===TRUE){
            header('location:'.BASEURL.'admin/arsip');
            return FALSE;
        }


        /**
         * set data file
         * 
         */
        $temporary_file = $_FILES['formfile_elenka_uploadsoal']['tmp_name'];
        $type_file = $_FILES['formfile_elenka_uploadsoal']['type'];
        $name_file = $_FILES['formfile_elenka_uploadsoal']['name'].'_'.date("Ymdhisa").'.xlsx';
        // echo $name_file;
        /**
         * xlsx
         * application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
         * xls
         * application/vnd.ms-excel
         * csv
         * application/vnd.ms-excel
         */
        // die();

        // echo $type_file;
        if( $type_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $type_file == "application/vnd.ms-excel" )
        {   
            $target_file = "../public_html/soal/".$name_file;

            if(move_uploaded_file($temporary_file,$target_file))
            {
                /**
                 * persission
                 * read, write, execute, rewrite
                 */
                chmod($target_file,0777);

                /**
                 * filter file type
                 */
                if($type_file==="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"):
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                elseif (condition):
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                endif;

                $Spreadsheet = $reader->load($target_file);
                // var_dump($Spreadsheet);
                
                $sheetData = $Spreadsheet->getActiveSheet()->toArray();
                // var_dump($sheetData);
                // die();
                
                /**
                 * set data
                 * Paket soal
                 */
                $dataPaket = [
                    'idGuru' => $_SESSION['elenka_adminsession'],
                    'idMatapelajaran' => $_POST['elenka_mapel'],
                    'idKelas' => $_SESSION['elenka_adminkelas'],
                    'idBagian' => $_SESSION['elenka_adminbagian']
                ];
                // var_dump($dataPaket);
                // die();

                if($res = $this->model('PaketSoalModel')->store($dataPaket)){

                    $res = $this->model('PaketSoalModel')->show('lastId');
                    foreach ($sheetData as $key => $value) {
                        /**
                         * get array key
                         */
                        if($key < 1){
                            $pertanyaan = implode(' ',array_keys($value,'pertanyaan'));
                            $a = implode(' ',array_keys($value,'a'));
                            $b = implode(' ',array_keys($value,'b'));
                            $c = implode(' ',array_keys($value,'c'));
                            $kunci = implode(' ',array_keys($value,'kunci'));
                        }else{
                            /**
                             * check null rows
                             */
                            if($value[$pertanyaan]!==NULL){
                                /**
                                 * get data from file
                                 */
                                $dataSoal = [
                                    'idPaketSoal' => $res['id'],
                                    'pertanyaan' => $value[$pertanyaan],
                                    'a' => $value[$a],
                                    'b' => $value[$b],
                                    'c' => $value[$c],
                                    'kunciJawaban' => $value[$kunci],
                                ];
                                $result = $this->model('ButirSoalModel')->store($dataSoal);
                                unlink($target_file);
                                // var_dump($result);die();
                            }
                        }
                    }
                    // var_dump($dataSoal);
                    // die();

                    if($result){
                        Flasher::setFlash('File berhasil diupload', true);
                    }else{
                        Flasher::setFlash('Gagal! silakan hubungi Administrator', False);
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

    public function arsip_upload_pict()
    {
        $id = $_POST['elenka_idSoal'];
        $idPaketSoal = $_POST['elenka_idPaketSoal'];

        $extension = explode('.',$_FILES['elenka_uploadgambar'.$id]['name']);
        $extension = end($extension);
        $name_file = $id."_".$idPaketSoal.'.'.$extension;
        $size = $_FILES['elenka_uploadgambar'.$id]['size'];

        $target_file = '../public_html/img/soal_gambar/'.$name_file;
        // var_dump($_FILES);die();

        if($size < 2000000){
            $tmp = $_FILES['elenka_uploadgambar'.$id]['tmp_name'];
            if(move_uploaded_file($tmp,$target_file))
            {
                $data = ['gambar'=>$name_file];
                if($this->model('ButirSoalModel')->update($id,$data))
                {
                    Flasher::setFlash('Berhasil mengupload gambar', true);
                }
            }else{
                Flasher::setFlash('Gagal mengupload gambar', false);
            }
        }else{
            Flasher::setFlash('Ukuran gambar terlalu besar', false);
        }
        header('location:'.BASEURL.'admin/arsip');
    }

    public function arsip_pict_delete()
    {
        $id = $_POST['id'];
        $idPaket = $_POST['idPaket'];
        // var_dump($_POST);die();
        if($this->model('ButirSoalModel')->update($id,['gambar'=>NULL]))
        {
            $filename = $id.'_'.$idPaket;
            $files = glob('../public_html/img/soal_gambar/'.$filename.'.{jpg,png,gif}', GLOB_BRACE);
            if(unlink($files[0])){
                echo "berhasil";
            }else{
                echo "gagal menghapus";
            }
        }

    }

    public function arsip_reset()
    {
        if(isset($_SESSION['elenka_adminsession'])){
            $condition = ['id'=>$_POST['id'],'idGuru'=>$_SESSION['elenka_adminsession']];

            $res = $this->model('PaketSoalModel')->destroy($condition);
        }
    }

    public function soal_view()
    {
        /**
         * get id by link
         */
        $id = $_GET['url'];
        $id = explode('/',$_GET['url']);
        $id = end($id);

        /**
         * mata pelajaran
         * 
         */
        $result = $this->model('PaketSoalModel')->show('soalsiswa',$id);
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
                    $data['matapelajaran'][] = $result;
                else:
                    $data['matapelajaran'] = $result;
                endif;
            // var_dump($data['matapelajaran']);
            // die();
        }else{
            $data['matapelajaran']=NULL;
        }

        /**
         * data soal
         */
        $result = $this->model('PaketSoalModel')->show('soalview',$id);
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
                    $data['soal'][] = $result;
                else:
                    $data['soal'] = $result;
                endif;
            // var_dump($data['soal']);
            // die();
        }else{
            $data['soal']=NULL;
        }

        $this->view('admin/soalView',$data,'self');
    }

    public function soal_active()
    {
        $status = ['status'=>2];
        $res = $this->model('PaketSoalModel')->show('selectById', $_POST['id']);

        if($res['status']==2) $status = ['status'=>1];

        $res = $this->model('PaketSoalModel')->update('status',$_POST['id'], $status);
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
        session_destroy();
        header('location:'.BASEURL.'Admin/index');
    }
}