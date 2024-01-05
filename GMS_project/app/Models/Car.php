<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;

    protected $table = 'CAR';

    public function getAll($filters = [], $keywords) {
        $cars =  DB::table('CAR')
        ->join('customers', 'customers.id', '=', 'car.customer_id')
        ->select('car.id as id', 'car.plateCode' , 'car.model', 'car.brand', 'car.color', 'car.status', 'car.production_year' ,'customers.name as customer_name');

        if (!empty($filters)) {
            $cars = $filters[0];
            $cars = $cars->where($filters[0], $filters[1], $filters[2]);
        }

        if (!empty($keywords)) {
            $cars = $cars->where(function($query) use ($keywords) {
                $query->orWhere('customers.name', 'like', '%'.$keywords.'%');
                $query->orWhere('car.model', 'like', '%'.$keywords.'%');
                $query->orWhere('car.brand', 'like', '%'.$keywords.'%');
                $query->orWhere('car.color', 'like', '%'.$keywords.'%');
                $query->orWhere('car.plateCode', 'like', '%'.$keywords.'%');
            });
        }

        $cars = $cars -> paginate(10);
        
        return $cars;
    }

    public function getByCustomerId($id) {
        $cars =  DB::table('CAR')
        ->join('customers', 'customers.id', '=', 'car.customer_id')
        ->select('car.id as id', 'car.plateCode' , 'car.model', 'car.brand', 'car.color', 'car.status', 'car.production_year' ,'customers.name as customer_name')
        ->where('customers.id', '=', $id);
        
        return $cars->get();
    }

    public function add($data){

        DB::table('CAR') ->  insert([
            'PLATECODE' =>$data['plateCode'],
            'MODEL' => $data['model'],
            'BRAND' => $data['brand'],
            'COLOR' => $data['color'],
            'PRODUCTION_YEAR' => $data['production_year'],
            'STATUS' => $data['status'],
            'CUSTOMER_ID' => $data['customer_id'],
        ]);
    }
     public function getDetail($id) {
        $car =  DB::table('car')
        ->join('customers', 'customers.id', '=', 'car.customer_id')
        ->select('car.id as id', 'car.model', 'car.brand', 'car.color', 'car.status', 'car.production_year' ,'customers.name as customer_name')
        ->where('car.id', '=', $id) 
        ->get();
        
        return $car;
    }

    public function updateCar($data, $id) {

        $data = array_merge($data, [$id]); 

        DB::table('CAR')
         ->where('ID', $data[0])
         ->  update([
            'MODEL' => $data['model'],
            'BRAND' => $data['brand'],
            'COLOR' => $data['color'],
            'PRODUCTION_YEAR' => $data['production_year'],
            'STATUS' => $data['status'],
        ]);

       
    }

    public function deleteCar($id) {
        return DB::delete('DELETE FROM '.$this->table.' WHERE ID = ?', [$id]);
    }



}
