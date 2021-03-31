<?php
/**
 * Created by PhpStorm.
 * User: linyoocom
 * Date: 2021/3/31
 * Time: 上午10:24
 */
namespace App\Http\SyncData;

use Illuminate\Support\Facades\DB;

class SyncDataService {

    public $connection;

    public function __construct()
    {
        $this->connection = DB::connection('mysql2');
    }

    public function getOriginAllTable(){
        $data = $this->connection->select("show tables;");
        return array_column($data,'Tables_in_'.Env('DB_DATABASE_'));
    }

    public function getColumns(){
        $sql = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_SCHEMA = 'db-name' 
    AND TABLE_NAME = 'table-name' 
    AND COLUMN_NAME = 'column-name'";
        $result = \DB::select($sql);
    }

    public function doSync($table){
        $data = $this->connection->select("show tables;");
        $tables = array_column($data,'Tables_in_'.Env('DB_DATABASE_'));

        print_r($tables);
    }
}
