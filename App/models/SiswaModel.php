<?php

/**
 * 
 * 
 * call controller
 */
use App\Core\Controller;

class SiswaModel extends Controller
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
        public function store(){}
            /**
             * 
             * display the specified resource data
             */
            public function show(){}
            /**
             * 
             * specialy method auth
             */
            public function auth($result)
            {
                return Database::table('tbelenka_siswa')
                                                ->where('nis',$result['username']."' and password ='".$result['password'])
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
