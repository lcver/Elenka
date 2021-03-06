<?php

/**
 * 
 * 
 * call controller
 */
use App\Core\Controller;

class PaketSoalModel extends Controller
{
    /**
     * 
     * create view resource data
     */
    public function create(){
        return Database::table('tbelenka_paket_soal')
                                ->where('idGuru',$_SESSION['elenka_adminsession'])
                                ->get();
                                            
    }
        /**
         * 
         * stored new resourece data
         */
        public function store($request){
            return Database::table('tbelenka_paket_soal')
                                ->insert($request);

        }
            /**
             * 
             * display the specified resource data
             */
            public function show($condition, $request=""){
                switch ($condition) {
                    case 'selectById':
                        $result = Database::table('tbelenka_paket_soal')
                                                ->where('id',$request)
                                                ->get();
                        break;
                    case 'soalview':
                        $result = Database::table('tbelenka_butir_soal')
                                                        ->where('idPaketSoal',$request)
                                                        ->get();
                        break;
                    case 'lastId':
                        $result = Database::table('tbelenka_paket_soal')
                                                ->orderBy('id','desc limit 1')
                                                ->get();
                        break;
                    case 'id':
                        $result = Database::table('tbelenka_paket_soal')
                                                ->join('tbelenka_matapelajaran')
                                                ->on('tbelenka_paket_soal.idMatapelajaran','tbelenka_matapelajaran.id and idGuru ='.$_SESSION['elenka_adminsession'])
                                                ->fetch(['tbelenka_paket_soal.*','tbelenka_matapelajaran.pelajaran'])
                                                ->get();
                        break;
                    case 'siswa':
                        $result = Database::table('tbelenka_paket_soal')
                                                ->join('tbelenka_kelas')
                                                ->on('tbelenka_paket_soal.idKelas ='.$_SESSION['elenka_userkelas'].' and tbelenka_paket_soal.idKelas','tbelenka_kelas.id')
                                                ->join('tbelenka_kelas_bagian')
                                                ->on('tbelenka_paket_soal.status = 1 and tbelenka_paket_soal.idBagian',"tbelenka_kelas_bagian.id")
                                                ->join('tbelenka_matapelajaran')
                                                ->on('tbelenka_paket_soal.idMatapelajaran','tbelenka_matapelajaran.id and tbelenka_paket_soal.id NOT IN (select idPaketSoal from tbelenka_nilai_siswa where tbelenka_nilai_siswa.idSiswa = '.$_SESSION['elenka_usersession'].')')
                                                ->fetch(['tbelenka_paket_soal.*','tbelenka_kelas.kelas','tbelenka_kelas_bagian.bagian','tbelenka_matapelajaran.pelajaran'])
                                                ->get();
                        // $result = Database::table('tbelenka_paket_soal')
                                                // ->join('tbelenka_nilai_siswa')
                                                // ->raw('tbelenka_paket_soal.id NOT EXISTS (select * from tbelenka_nilai_siswa where tbelenka_nilai_siswa.idSiswa = '.$_SESSION['elenka_usersession'].')')
                                                // ->get();
                        break;
                    case 'soalsiswa':
                        $result = Database::table('tbelenka_paket_soal')
                                                ->join('tbelenka_matapelajaran')
                                                ->on('tbelenka_paket_soal.id', $request.' and tbelenka_paket_soal.idMatapelajaran = tbelenka_matapelajaran.id')
                                                ->fetch(['tbelenka_matapelajaran.*'])
                                                ->get();
                    // default:
                    //     $result = [];
                    //     break;
                }

                return $result;
            }
                /**
                 * 
                 * display form for editing resource data
                 */
                public function edit($id){}
                    /**
                     * 
                     * update the specified resource data
                     */
                    public function update($condition,$id, $request=[]){
                        switch ($condition) {
                            case 'status':
                                $result = Database::table('tbelenka_paket_soal')
                                                        ->where('id',$id)
                                                        ->update($request);
                                break;
                            
                            // default:
                            //     # code...
                            //     break;
                        }
                        return $result;
                    }
                        /**
                         * 
                         * remove specified resource data
                         */
                        public function destroy($request){
                            return Database::table('tbelenka_paket_soal')
                                                    ->raw('id = '.$request['id'].' and idGuru = '.$request['idGuru'])
                                                    ->delete();
                        }
}
