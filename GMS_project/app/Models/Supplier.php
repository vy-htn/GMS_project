<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'SUPPLIER';

    public function getAllSupplier() {
        $suppliers = DB::select('SELECT * FROM '.$this->table.' ');
        
        return $suppliers;
    }
    
}
