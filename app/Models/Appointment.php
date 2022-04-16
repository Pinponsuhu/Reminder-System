<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $primaryKey = 'id';

    protected $fillable = ['staff_id','preferred_date','status'];

    public function Staff(){
        $this->belongsTo(Staff::class);
    }
}
