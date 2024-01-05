<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Accessary extends Model
{
    use HasFactory;
    protected $table = 'ACCESSARY';
    public function getAllAccessary($filters = [], $keywords) {
        $accessaries =  DB::table('accessary')
        ->join('supplier', 'supplier.id', '=', 'accessary.supplier_id')
        ->join('accessary_type', 'accessary_type.id', '=', 'accessary.type_id')
        ->select('accessary.id as accessary_id', 'accessary.name as accessary_name','accessary.price as price', 'accessary.quantity as quantity', 'accessary_type.id as type_id', 'accessary_type.name as type_name', 'supplier.name as supplier_name', 'supplier.id as supplier_id');

        if (!empty($filters)) {
            $filters = $filters[0];
            $accessaries   = $accessaries ->where($filters[0], $filters[1], $filters[2]);
        }

        if (!empty($keywords)) {
            $accessaries  = $accessaries ->where(function($query) use ($keywords) {
                $query->orWhere('name', 'like', '%'.$keywords.'%');
            });
        }

        $accessaries = $accessaries ->paginate(10);
        
        return $accessaries;
    }

    public function getAccessaryBySpAndTp($data) {
        
        $accessaries  = DB::table('ACCESSARY')
                ->where('SUPPLIER_ID', '=', $data['supplierId'])
                ->where('TYPE_ID', '=', $data['typeId'])
                ->get();

        return $accessaries; 
    }

    public function getAllAccessaryById($id) {
        $accessaries = DB::select('SELECT * FROM '.$this->table.' WHERE ID = ?', [$id]);
        
        return $accessaries;
    }

    public function add($data){

        DB::table('ACCESSARY') ->  insert([
            'SUPPLIER_ID' => $data['supplier'],
            'TYPE_ID' => $data['type'],
            'NAME' => $data['name'],
            'PRICE' => $data['price'],
            'QUANTITY' => 0,
        ]);
    }

    public function getDetail($id) {
        $accessary =  DB::table('accessary')
        ->where('accessary.id', '=', $id) 
        ->get();
        
        return $accessary;
    }

    // public function updateSupplier($data, $id) {

    //     $data = array_merge($data, [$id]); 

    //     DB::table('SUPPLIER')
    //     ->where('ID', $data[0])
    //     ->  update([
    //        'NAME' => $data['name'],
    //        'EMAIL' => $data['email'],
    //        'PHONE' => $data['phone'],
    //        'ADDRESS' => $data['address'],
    //    ]);
    // }

    public function deleteAccessary($id) {
        return DB::delete('DELETE FROM '.$this->table.' WHERE ID = ?', [$id]);
    }

    public function updateQuantity($id, $quantity) {
        DB::table('ACCESSARY')
        ->where('ID', $id)
        ->  update([
           'QUANTITY' => $quantity,
       ]);
    }

    public function getQuantity($id) {
        $curQuantity = DB::select('SELECT QUANTITY FROM ACCESSARY WHERE ID = ?', [$id]);
        return $curQuantity;
    }

}
