<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'BOOKING';

    public function getAllBooking($filters = [], $keywords) {
        $bookings =  DB::table('booking')
        ->join('car', 'car.id', '=', 'booking.car_id')
        ->join('customer', 'customer.id', '=', 'booking.customer_id')
        ->join('service_type', 'service_type.id', '=', 'booking.type_id')
        ->join('booking_status', 'booking_status.id', '=', 'booking.status_id')
        ->select('booking.id as booking_id', 'booking.created_at as booking_created', 'booking.time', 'booking.date', 'booking.note', 'customer.name as customer_name', 'booking_status.id as status_id', 'booking_status.name as status_name', 'car.model', 'car.color');

        if (!empty($filters)) {
            $filters = $filters[0];
            $bookings = $bookings->where($filters[0], $filters[1], $filters[2]);
        }

        if (!empty($keywords)) {
            $bookings = $bookings->where(function($query) use ($keywords) {
                $query->orWhere('customer.name', 'like', '%'.$keywords.'%');
                $query->orWhere('car.model', 'like', '%'.$keywords.'%');
            });
        }
        
        return $bookings->get();
    }

    public function getLastBooking() {
        $lastBooking = DB::select('SELECT * FROM '.$this->table.' ORDER BY ID DESC LIMIT 1');
        return $lastBooking;
    }

    public function addBooking($data){

        DB::table($this->table) ->  insert([
            'ID' => $data['booking_id'],
            'DATE'=> $data['booking_date'],
            'TIME'=> $data['booking_time'],
            'CREATED_AT'=> $data['booking_created'],
            'TYPE_ID'=> $data['type_id'],
            'NOTE'=> $data['booking_note'],
            'CUSTOMER_ID'=> $data['customer_id'],
            'STATUS_ID'=> $data['status_id'],
            'CAR_ID'=> $data['car_id']
        ]);
    }

    public function getDetail($id) {
        return DB::table('booking')
        ->join('car', 'car.id', '=', 'booking.car_id')
        ->join('customer', 'customer.id', '=', 'booking.customer_id')
        ->join('service_type', 'service_type.id', '=', 'booking.type_id')
        ->join('booking_status', 'booking_status.id', '=', 'booking.status_id')
        ->select('booking.id as booking_id', 'booking.created_at as booking_created',
        'booking.time', 'booking.date', 'booking.note', 'customer.name as customer_name',
        'booking_status.id as status_id', 'booking_status.name as status_name', 'car.model', 
        'car.color', 'production_year', 'service_type.name as type_name', 'customer.email', 
        'customer.phone_number', 'customer.address')
        ->where('booking.id', '=', $id) 
        ->get();
    }

    // public function updateBooking($data, $id) {

    //     $data = array_merge($data, [$id]); 

    //     return DB::update('UPDATE '.$this->table.' 
    //     SET EMPLOYEE_FIRSTNAME = ?,
    //         EMPLOYEE_LASTNAME = ?,
           
    //     WHERE EMPLOYEE_ID = ?', $data);
    // }

    public function updateStatus($data, $id){

        return DB::update('UPDATE '.$this->table.' 
        SET STATUS_ID = ?
        WHERE ID = ?', [$data, $id]);
    }

    public function deleteBooking($id) {
        return DB::delete('DELETE FROM '.$this->table.' WHERE BOOKING_ID = ?', [$id]);
    }
}
