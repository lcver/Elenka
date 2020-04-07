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
    public function create(){
        return Database::table('tbelenka_siswa')
                                    ->join('tbelenka_kelas')
                                    ->on('tbelenka_siswa.idKelas','tbelenka_kelas.id and tbelenka_siswa.idKelas='.$_SESSION['elenka_adminkelas'])
                                    ->join('tbelenka_kelas_bagian')
                                    ->on('tbelenka_siswa.idBagian','tbelenka_kelas_bagian.id')
                                    ->orderBy('tbelenka_kelas_bagian.id asc, tbelenka_siswa.nama','asc')
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
            public function show($request){
                return Database::table('tbelenka_siswa')
                                        ->where('id',$request)
                                        ->get();
            }
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
