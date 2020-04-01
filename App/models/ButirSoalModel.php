<?php

/**
 * 
 * 
 * call controller
 */
use App\Core\Controller;

class ButirSoalModel extends Controller
{
    /**
     * 
     * create view resource data
     */
    public function create($request){
        return Database::table('tbelenka_butir_soal')
                                        ->where('idPaketSoal',$request)
                                        ->get();
    }
        /**
         * 
         * stored new resourece data
         */
        public function store($request){
            return Database::table('tbelenka_butir_soal')->insert($request);
        }
            /**
             * 
             * display the specified resource data
             */
            public function show($request){
                return Database::table('tbelenka_butir_soal')
                                            ->join('tbelenka_jawaban')
                                            ->on('tbelenka_butir_soal.idPaketSoal = '.$request.' and tbelenka_butir_soal.id','tbelenka_jawaban.idButirSoal and tbelenka_jawaban.idSiswa='.$_SESSION['elenka_usersession'])
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
