<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User_enrollment;  

class TransactionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LEVEL 1 EASY
    |--------------------------------------------------------------------------
    |   
    */
    public function getAppointments()
    {
        $easy = DB::select('SELECT Fullname, enrollee_id, enrollment_id FROM Accounts AS a
                          INNER JOIN user_enrollments AS u ON a.id = u.User_id
                            INNER JOIN enrollment_appointments AS ea ON a.id = ea.enrollee_id
                           INNER JOIN enrollment_schedule AS es ON ea.id = es.id');

       return response()->json(['success' => true, 'easy' => $easy], 200);
    }



  /*]
    |--------------------------------------------------------------------------
    | LEVEL 2 MODERATE
    |--------------------------------------------------------------------------
    |
    */

    public function getAppointmentsData(){

        $moderate= DB::table('Accounts as a')
        ->select('u.Fullname As Fullname', 'ea.enrollee_id As Enrolle_id', 'ea.enrollment_id As Enrollment_id')
       ->join('user_enrollments as u','a.id','u.User_id')
        ->join('enrollment_appointments as ea','a.id','ea.enrollee_id')
     ->join('enrollment_schedule as es','ea.id','es.id')
        ->get();

        return response()->json(['success' => true, 'moderate'=> $moderate],200);
    }


    /*
    |--------------------------------------------------------------------------
    | LEVEL 3 CHALLENGING(ELOQUENT)
    |--------------------------------------------------------------------------
    |
    */

    public function getAppointmentsChallenging(){

        $challenging = User_enrollment::with('account','enrollmentAppointments', 'enrollmentSchedules')->get();

        return response()->json(['success' => true, 'challenging' => $challenging],200);


    }

      /*
    |--------------------------------------------------------------------------
    | LEVEL 4 DIFFICULT(ELOQUENT)
    |--------------------------------------------------------------------------
    |
    */

    public function getAppDifficult(){

        $difficult = User_enrollment::with(['account' => function($q){
            $q->select('*');
        }])->with(['enrollmentAppointments' => function($q){
            $q->select('*');
        }])->with(['enrollmentSchedules' => function($q){
            $q->select('*');
        }])->get();

        return response()->json(['success' => true,'difficult'=> $difficult],200);
    }

    public function viewDashboard(){
        return view('pages.dashboard');
    }

    public function viewEnrollmentApp(){
        $appointments = DB::table('User_enrollments as u')
        ->join('Accounts as a', 'u.User_id', '=', 'a.id')
        ->select('u.Fullname', 'u.Age', 'u.Phone_number', 'u.Address', 'a.Email')
        ->get();

    return view('appointment.enrollmentApp', compact('appointments'));
    }

    
}



