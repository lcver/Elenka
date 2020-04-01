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
    public function create(){}
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
