<?php

namespace App\Models;

use App\Models\Accounts;
use App\Models\Enrollement_schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment_appointments extends Model
{
    use HasFactory;
    protected $table = 'enrollment_appointments';
    protected $fillable = ['enrollee_id','enrollment_id', 'exam_day', 'exam_time', 'Status'];

    public function Accounts(){

        return $this->belongsTo(Accounts::class, 'enrollee_id');

}

public function Enrollment_schedule(){

    return $this->belongsTo(Enrollment_schedule::class, 'enrollment_id');

}

}
