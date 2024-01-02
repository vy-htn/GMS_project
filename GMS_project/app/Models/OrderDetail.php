<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'ORDER_DETAIL';

    public function getAllOrderDetail() {
        $orders = DB::select('SELECT * FROM '.$this->table.' ');
        
        return $orders;
    }

    public function getAllOrderDetailByOrderId($id) {
        $orderDetails = DB::select('SELECT * FROM '.$this->table.'
        JOIN ACCESSARY
        ON ACCESSARY.ID = ORDER_DETAIL.ACCESSARY_ID
        WHERE ORDERS_ID = ? ', [$id]);
        
        return $orderDetails;
    }

    public function getLastOrderId() {
        $lastOrderId =  DB::select('SELECT ORDER_ID FROM '.$this->table.' ORDER BY ORDER_ID DESC LIMIT 1');
        return $lastOrderId;
    }

    public function addOrderDetail($data){
        DB::table('ORDER_DETAIL') ->  insert([
            'ORDERS_ID' => $data['order_id'],
            'QUANTITY' => $data['quantity'],
            'ACCESSARY_ID'  => $data['accessary_id'],
            'PRICE' => $data['price'],
        ]);
    }

    public function deleteOrderDetailByOrderId($orderId) {
        return DB::delete('DELETE FROM '.$this->table.' WHERE ORDERS_ID = ?', [$orderId]);
    }
}
