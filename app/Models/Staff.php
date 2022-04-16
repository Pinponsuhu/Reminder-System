<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $primaryKey = 'id';

    protected $fillable = ['full_name','passport','appointment_token','gender','department','date_of_birth','phone','email','staff_id','next_reminder'];

    public function Appointment(){
        $this->hasMany(Appointment::class);
    }
}
