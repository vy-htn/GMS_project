<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'plateNo',
    ];

    public function getByEmail($email) {
        return DB::select('SELECT * FROM CUSTOMERS WHERE EMAIL = ?', [$email]);
    }

    public function getAll() {
        return DB::select('SELECT * FROM CUSTOMERS ');
    }

}
