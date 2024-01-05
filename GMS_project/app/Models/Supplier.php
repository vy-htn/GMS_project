<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'SUPPLIER';

    public function getAllSupplier($filters = [], $keywords) {
        $suppliers =  DB::table('supplier');

        if (!empty($filters)) {
            $filters = $filters[0];
            $suppliers  = $suppliers ->where($filters[0], $filters[1], $filters[2]);
        }

        if (!empty($keywords)) {
            $suppliers = $suppliers ->where(function($query) use ($keywords) {
                $query->orWhere('name', 'like', '%'.$keywords.'%');
                $query->orWhere('email', 'like', '%'.$keywords.'%');
                $query->orWhere('phone', 'like', '%'.$keywords.'%');
                $query->orWhere('id', 'like', '%'.$keywords.'%');
            });
        }

        // $sql = DB::getQueryLog();
        // dd($sql);

        $suppliers  = $suppliers  ->paginate(10);
        
        return $suppliers ;
    }


    public function addSupplier($data){

        DB::table('SUPPLIER') ->  insert([
            'NAME' => $data['name'],
            'EMAIL' => $data['email'],
            'PHONE' => $data['phone'],
            'ADDRESS' => $data['address'],
        ]);
    }

    public function getDetail($id) {
        $supplier =  DB::table('supplier')
        ->where('supplier.id', '=', $id) 
        ->get();
        
        return $supplier;
    }

    public function updateSupplier($data, $id) {

        $data = array_merge($data, [$id]); 

        DB::table('SUPPLIER')
        ->where('ID', $data[0])
        ->  update([
           'NAME' => $data['name'],
           'EMAIL' => $data['email'],
           'PHONE' => $data['phone'],
           'ADDRESS' => $data['address'],
       ]);
    }

    public function deleteSupplier($id) {
        return DB::delete('DELETE FROM '.$this->table.' WHERE ID = ?', [$id]);
    }

    
}
