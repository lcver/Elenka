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
            public function show($condition){
                switch ($condition) {
                    case 'lastId':
                        $result = Database::table('tbelenka_paket_soal')
                                                ->orderBy('id','desc limit 1')
                                                ->get();
                        break;
                    case 'id':
                        $result = Database::table('tbelenka_paket_soal')
                                                ->join('tbelenka_matapelajaran')
                                                ->on('tbelenka_paket_soal.idMatapelajaran','tbelenka_matapelajaran.id and idGuru ='.$_SESSION['elenka_adminsession'])
                                                ->get();
                        break;
                    default:
                        $result = [];
                        break;
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
                    public function update($id){}
                        /**
                         * 
                         * remove specified resource data
                         */
                        public function destroy($request){
                            return Database::table('tbelenka_paket_soal')
                                                    ->raw('idMatapelajaran = '.$request['idMatapelajaran'].' and idGuru = '.$request['idGuru'])
                                                    ->delete();
                        }
}
