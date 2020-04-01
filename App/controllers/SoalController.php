<?php
use App\Core\Controller;

class SoalController extends Controller
{
    public function index()
    {
        /**
         * get id by link
         */
        $id = $_GET['url'];
        $id = explode('/',$_GET['url']);
        $id = end($id);

        $mapel = $this->model('PaketSoalModel')->show('soalsiswa',$id);

        $data['soal'] = $this->model('ButirSoalModel')->create($id);
        $data['mapel'] = $mapel['pelajaran'];
        // var_dump($data['mapel']);die();
        
        $this->view('soal/index',$data);

    }

    public function penilaian()
    {
        $idPaket = $_POST['elenka_idPaketSoal'];
        $result = $this->model('ButirSoalModel')->create($idPaket);
        // var_dump($result);
        // die();
        $count = count($result);
        for ($i=1; $i<=$count ; $i++) { 
            $data = [
                'idButirSoal'=> $_POST['elenka_idSoal'.$i],
                'idPaketSoal'=> $idPaket,
                'idSiswa'    => $_SESSION['elenka_usersession'],
                'jawaban' => $_POST['elenka_jawaban'.$i]
            ];
            // var_dump($data);

            $result = $this->model('JawabanModel')->store($data);
        }

        if($result)
            // header('location:'.BASEURL.'soal/hasil/'.$idPaket);
            self::hasil($idPaket);
            // echo "selesai";
    }

    public function hasil($idPaket)
    {
        /**
         * get id by link
         */
        $id = $idPaket;

        $result = $this->model('ButirSoalModel')->show($id);
        // var_dump($result[0]);
        // die();
        $totalSoal = 0;
        $benar = 0;
        foreach ($result as $d) { $totalSoal++;
            if($d['jawaban'] == $d['kunciJawaban'])
            {
                $benar++;
            }
            // $idMapel = $d['idMatapelajaran'];
            // $idSoal = $d['id'];
        }
        $nilai = $benar/$totalSoal*100;
        // var_dump($nilai);

        $dataNilai = [
            'idPaketSoal'=>$id,
            'idSiswa'    =>$_SESSION['elenka_usersession'],
            'nilai'      =>$nilai
        ];
        
        $res = $this->model('NilaiModel')->store($dataNilai);

        if($res===TRUE)
        {
            header('location:'.BASEURL.'soal/view_hasil/'.$id);
        }
        
    }

    public function view_hasil()
    {
        /**
         * get id paket soal by link
         */
        $id = $_GET['url'];
        $id = explode('/',$_GET['url']);
        $id = end($id);

        /**
         * 
         * fetch data soal dan jawaban
         */
        $ressoal = $this->model('ButirSoalModel')->show($id);
        
        if(!is_null($ressoal)){
            $key = array_keys($ressoal);

            $count = count($key);
            $num = NULL;

            for ($i=0; $i < $count ; $i++) { 
                if(is_numeric($key[$i])) $num = true;
            }

            // foreach ($resultkey as $key) {
            //     if(!is_numeric($key)) $num = false;
            // }
                if(!$num):
                    $data['soal'][] = $ressoal;
                else:
                    $data['soal'] = $ressoal;
                endif;
            // var_dump($data['soal']);
            // die();
        }else{
            $data['soal']=NULL;
        }

        /**
         * 
         * fetch data nilai siswa
         */
        $resnilai = $this->model('NilaiModel')->show($id);

        if(!is_null($resnilai)){
            $key = array_keys($resnilai);

            $count = count($key);
            $num = NULL;

            for ($i=0; $i < $count ; $i++) { 
                if(is_numeric($key[$i])) $num = true;
            }

            // foreach ($resultkey as $key) {
            //     if(!is_numeric($key)) $num = false;
            // }
                if(!$num):
                    $data['nilai'][] = $resnilai;
                else:
                    $data['nilai'] = $resnilai;
                endif;
            // var_dump($data['nilai']);
            // die();
        }else{
            $data['nilai']=NULL;
        }

        $respaket = $this->model('PaketSoalModel')->show('soalsiswa',$id);
        $data['mapel'] = $respaket['pelajaran'];
        
        $this->view('soal/hasil',$data);

    }
}
