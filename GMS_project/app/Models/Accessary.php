<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Accessary extends Model
{
    use HasFactory;
    protected $table = 'ACCESSARY';
    public function getAllAccessary() {
        $accessaries = DB::select('SELECT * FROM '.$this->table.' ');
        
        return $accessaries;
    }

    public function getAccessaryBySpAndTp($data) {
        
        $accessaries  = DB::table('ACCESSARY')
                ->where('SUPPLIER_ID', '=', $data['supplierId'])
                ->where('TYPE_ID', '=', $data['typeId'])
                ->get();

        return $accessaries; 
    }

    // public function getAccessaryBySpAndTp($data) {
        
    //     $accessaries  = DB::select('SELECT * FROM '.$this->table.' WHERE TYPE_ID = ? AND SUPPLIER_ID = ?', $data);

    //             dd($accessaries);
    //     return $accessaries; 
    // }

    public function getAllAccessaryById($id) {
        $accessaries = DB::select('SELECT * FROM '.$this->table.' WHERE ID = ?', [$id]);
        
        return $accessaries;
    }
    
}
