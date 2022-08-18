<?php
namespace App\Models;
use DB;
use Hash;
use Session;
use Illuminate\Database\Eloquent\Model;
class Calendly extends Model
{
    public static function saveEvents($data){
        $result=DB::table('events')->insert($data);
        return 1;
    }
    
     public static function dbTest(){
     try {
        DB::connection()->getPdo();
        echo "Connected successfully to: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        die("Could not connect to the database. Please check your configuration. error:" . $e );
    }
    }
    
}