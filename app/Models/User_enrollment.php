<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_enrollment extends Model
{
    use HasFactory;
    protected $table = 'user_enrollments';
    protected $fillable = ['User_id', 'Fullname', 'Phone_Number', 'Address', 'age'];

    public function account()
    {
        return $this->belongsTo(Accounts::class, 'User_id');
    }

   
    public function enrollmentAppointments()
    {
        return $this->hasMany(Enrollment_appointments::class, 'enrollment_id'); 
    }


    public function enrollmentSchedules()
    {
        return $this->hasMany(Enrollment_appointments::class, 'enrollment_id')->with('Enrollment_schedule');
    }


    
}
