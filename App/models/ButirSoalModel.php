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
    public function create(){}
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
            public function show(){}
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
