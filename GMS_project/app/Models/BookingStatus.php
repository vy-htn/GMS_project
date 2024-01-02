<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookingStatus extends Model
{
    use HasFactory;

    protected $table = 'BOOKING_STATUS';

    public function getAll() {
        $bookings = DB::select('SELECT * FROM '.$this->table.' ');
        
        return $bookings;
    }
}
