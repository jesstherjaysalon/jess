<?php

namespace App\Models;


use App\Models\Enrollment_appointments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment_schedule extends Model
{
    use HasFactory;
    protected $table = 'enrollment_schedule';
    protected $fillable = ['School_Year','Semester', 'Enroll_month', 'Year_level', 'Status', 'Max_participants_per_day'];

    public function Enrollment_appointments(){

        return $this->hasMany(Enrollment_appointments::class);

}
}
