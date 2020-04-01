<?php

/**
 * 
 * 
 * call controller
 */
use App\Core\Controller;

class MapelModel extends Controller
{
    /**
     * 
     * create view resource data
     */
    public function create(){
        return Database::table('tbelenka_matapelajaran')
                                        ->get();
    }
        /**
         * 
         * stored new resourece data
         */
        public function store(){}
            /**
             * 
             * display the specified resource data
             */
            public function show(){
                return Database::table('tbelenka_matapelajaran')
                                                ->raw('NOT EXISTS (select idMatapelajaran from tbelenka_paket_soal where tbelenka_paket_soal.idGuru = '.$_SESSION['elenka_adminsession'].' and tbelenka_paket_soal.idMatapelajaran = tbelenka_matapelajaran.id)')
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
