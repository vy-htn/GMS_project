<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'ORDERS';

    public function getAllOrders($filters = [], $keywords) {

       $orders = DB::table('orders')
    ->join('supplier', 'supplier.id', '=', 'orders.supplier_id')
    ->select('orders.id as orders_id', 'supplier.id as supplier_id','supplier.name as supplier_name', 'supplier.name as supplier_name', 'orders.created_at as created_at', 'total_price', 'total_quantity');


    if (!empty($filters)) {
        $filters = $filters[0];
        $orders = $orders->where($filters[0], $filters[1], $filters[2]);
    }

    if (!empty($keywords)) {
        $orders = $orders->where(function($query) use ($keywords) {
            $query->orWhere('supplier_name', 'like', '%'.$keywords.'%');
            $query->orWhere('last_name', 'like', '%'.$keywords.'%');
            $query->orWhere('email', 'like', '%'.$keywords.'%');
            $query->orWhere('phone_number', 'like', '%'.$keywords.'%');
        });
    }

        return $orders->paginate(10);
    }

    public function getLastOrderId() {
        $lastOrderId =  DB::select('SELECT ID FROM '.$this->table.' ORDER BY ID DESC LIMIT 1');
        return $lastOrderId;
    }

    public function getLastOrder() {
        $lastOrder = DB::select('SELECT * FROM '.$this->table.' ORDER BY ID DESC LIMIT 1');
        return $lastOrder;
    }

    public function addOrder($data){

        //DB::insert('INSERT INTO EMPLOYEE (EMPLOYEE_ID ,EMPLOYEE_FIRSTNAME, EMPLOYEE_LASTNAME, GENDER, EMPLOYEE_BIRTHDATE, DEPARTMENT_ID, POSITION_ID, EMPLOYEE_EMAIL, EMPLOYEE_PHONENUMBER, EMPLOYEE_ADDRESS ) VALUES (?,?,?,?,?,?,?,?,?,\'?\')', $data);
        DB::table('ORDERS') ->  insert([
            'SUPPLIER_ID' => $data['supplier_id'],
            'CREATED_AT' => $data['created_at'],
            'TOTAL_QUANTITY'  => $data['total_quantity'],
            'TOTAL_PRICE'  => $data['total_price'],
        ]);

    }

    

    public function getDetail($id) {
        return DB::table('orders')
        ->join('supplier', 'supplier.id', '=', 'orders.supplier_id')
        ->select('orders.id as orders_id', 'supplier.id as supplier_id','supplier.name as supplier_name', 'supplier.name as supplier_name', 'orders.created_at as created_at', 'total_price', 'total_quantity')
        ->where('orders.id', '=', $id) 
        ->get();
    }

    public function updatePrice($data, $id) {

        $data = array_merge([$data], [$id]); 

        return DB::update('UPDATE '.$this->table.' 
        SET PRICE = ?
        WHERE ORDER_ID = ?', $data);
    }

    public function deleteOrder($id) {
        return DB::delete('DELETE FROM '.$this->table.' WHERE ID = ?', [$id]);
    }
}
