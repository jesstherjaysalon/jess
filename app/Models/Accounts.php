<?php

namespace App\Models;

use App\Models\User_enrollment;
use App\Models\Enrollment_appointments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $fillable = ['email','password'];


   public function userEnrollment(){
    return $this->hasMany(User_enrollment::class);
   }
 
}