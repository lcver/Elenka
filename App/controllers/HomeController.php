<?php
use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if(!isset($_SESSION['elenka_usersession'])){
            self::auth();
            return false;
        }

            $result = $this->model('PaketSoalModel')->show('siswa');
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
                $data=NULL;
            }

            $this->view('home/index', $data);
    }


    public function auth()
    {
        if(!isset($_SESSION['elenka_usersession'])){
            $this->view('Auth/index');
        }
    }

    public function authentication()
    {
        $account = [
            'username'=>$_POST['elenka_username'],
            'password'=>$_POST['elenka_password']
        ];

        if ($res=$this->model('SiswaModel')->auth($account))
        {   
            /**
             * set session
             */
            $_SESSION['elenka_usersession'] = $res['id'];
            $_SESSION['elenka_username'] = $res['nama'];
            $_SESSION['elenka_userkelas'] = $res['idKelas'];
            $_SESSION['elenka_userbagian'] = $res['idBagian'];

        }else
        {
            Flasher::setFlash('Username dan password tidak valid', false);
        }

        header('location:'.BASEURL);
    }

    public function logout()
    {
        session_destroy();
        header('location:'.BASEURL.'Admin/index');
    }
}


?>