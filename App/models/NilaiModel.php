<?php

/**
 * 
 * 
 * call controller
 */
use App\Core\Controller;

class NilaiModel extends Controller
{
    /**
     * 
     * create view resource data
     */
    public function create(){
        return Database::table('tbelenka_nilai_siswa')
                                    ->join('tbelenka_siswa')
                                    ->on('tbelenka_nilai_siswa.idSiswa','tbelenka_siswa.id')
                                    ->join('tbelenka_kelas')
                                    ->on('tbelenka_siswa.idKelas','tbelenka_kelas.id')
                                    ->join('tbelenka_kelas_bagian')
                                    ->on('tbelenka_siswa.idBagian','tbelenka_kelas_bagian.id')
                                    ->join('tbelenka_paket_soal')
                                    ->on('tbelenka_paket_soal.idGuru = '.$_SESSION['elenka_adminsession'].' and tbelenka_nilai_siswa.idPaketSoal','tbelenka_paket_soal.id')
                                    ->join('tbelenka_matapelajaran')
                                    ->on('tbelenka_paket_soal.idMatapelajaran','tbelenka_matapelajaran.id')
                                    ->fetch([
                                        'tbelenka_matapelajaran.id as idMatapelajaran',
                                        'tbelenka_matapelajaran.pelajaran',
                                        'tbelenka_siswa.nama',
                                        'tbelenka_nilai_siswa.nilai',
                                        'tbelenka_kelas.kelas',
                                        'tbelenka_kelas_bagian.bagian'
                                        ])
                                    ->get();
    }
        /**
         * 
         * stored new resourece data
         */
        public function store($request){
            return Database::table('tbelenka_nilai_siswa')->insert($request);
        }
            /**
             * 
             * display the specified resource data
             */
            public function show($request){
                return Database::table('tbelenka_nilai_siswa')
                                                ->where('idPaketSoal',$request."' and idSiswa='".$_SESSION['elenka_usersession'])
                                                ->fetch(['nilai'])
                                                ->get();
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
                    public function update($id){}
                        /**
                         * 
                         * remove specified resource data
                         */
                        public function destroy($id){}
}
