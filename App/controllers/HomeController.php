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
        $data['page'] = "Home";
        $this->view('Home/index', $data);
    }


    public function auth()
    {
        $this->view('Auth/index');
    }

    public function authentication()
    {
        var_dump($_POST);
    }
}


?>