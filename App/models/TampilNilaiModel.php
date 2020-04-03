<?php

/**
 * 
 * 
 * call controller
 */
use App\Core\Controller;

class TampilNilaiModel extends Controller
{
    /**
     * 
     * create view resource data
     */
    public function create(){
        // return Database::table('tbelenka_tampil_nilai')
        //                                 ->where('idKelas',$_SESSION['elenka_adminkelas'])
        //                                 ->get();
        return Database::table('tbelenka_tampil_nilai')
                                        ->join('tbelenka_siswa')
                                        ->on('tbelenka_tampil_nilai.idSiswa','tbelenka_siswa.id')
                                        ->join('tbelenka_kelas')
                                        ->on('tbelenka_tampil_nilai.idKelas','tbelenka_kelas.id and tbelenka_kelas.id='.$_SESSION['elenka_adminkelas'])
                                        ->join('tbelenka_kelas_bagian')
                                        ->on('tbelenka_tampil_nilai.idBagian','tbelenka_kelas_bagian.id')
                                        ->fetch([
                                            'tbelenka_siswa.nama',
                                            'tbelenka_tampil_nilai.*',
                                            'tbelenka_kelas.kelas',
                                            'tbelenka_kelas_bagian.bagian'
                                            ])
                                        ->orderBy('tbelenka_kelas.id asc, tbelenka_kelas_bagian.bagian asc, tbelenka_siswa.nama','asc')
                                        ->get();
    }
        /**
         * 
         * stored new resourece data
         */
        public function store($request){
            return Database::table('tbelenka_tampil_nilai')->insert($request);
        }
            /**
             * 
             * display the specified resource data
             */
            public function show($request){
                return Database::table('tbelenka_tampil_nilai')
                                        ->where('idSiswa',$request)
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
                    public function update($id,$request){
                        return Database::table('tbelenka_tampil_nilai')
                                                    ->where('id',$id)
                                                    ->update($request);
                    }
                        /**
                         * 
                         * remove specified resource data
                         */
                        public function destroy($id){}
}
