<?php

namespace App\Models;
use App\Models\LGA;
use App\Models\State;
use App\Models\Applicant;
use App\Models\StudentOLevel;
use App\Models\Application;
use App\Models\Programmes;
use App\Models\AcademicSession;
use App\Models\Course;
use App\Models\StudentPublication;
use App\Models\StudentPrize;
use App\Models\StudentReferee;
use App\Models\StudentRefereeQuestion;
use App\Mail\SendApplicationApproval;

use App\Models\StudentAppointment;
use App\Models\RefereeQuestion;
use App\Models\Countries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $guarded = [];
    // protected $fillable = [
    //     'surname',
    //     'firstname',
    //     'middlename',
    //     'sex',
    //     'marital_status',
    //     'state_of_origin',
    //     'dob',
    //     'nationality',
    //     'religion',
    //     'phone_number',
    //     'alt_phone_number',
    //     'email',
    //     'alt_email',
    // ];

    public function statename()
    {
        return $this->belongsTo('App\Models\State', 'state_of_origin')->withDefault(['name'=> '']);
    }

    public function studentContact()
    {
        $student = StudentContact::where('student_id',$this->id)->first();
        return $student;
    }
    public function StudentAppointment()
    {
        $student = StudentAppointment::where('appRefNo',$this->applicantRefNo)->first();
        return $student;
    }
    public function StudentCertifcate()
    {
        $student = StudentCertifcate::where('appRefNo',$this->applicantRefNo)->first();
        return $student;
    }
    public function StudentCourse()
    {
        $student = StudentCourse::where('appRefNo',$this->applicantRefNo)->first();
        return $student;
    }
    public function studentHome()
    {
        $student = StudentHomeAdd::where('appRefNo', $this->applicantRefNo)->first();
        // dd('here');
        return $student;
    }
    public function studentOlevel()
    {
        $student = studentOLevel::where('appRefNo',$this->applicantRefNo)->first();
        return $student;
    }
    public function StudentPublication()
    {
        $student = StudentPublication::where('appRefNo',$this->applicantRefNo)->get();
        return $student;
    }
    public function StudentPrize()
    {
        $student = StudentPrize::where('appRefNo',$this->applicantRefNo)->get();
        return $student;
    }
    public function StudentRefereeQuestion()
    {
        $student = StudentRefereeQuestion::where('appRefNo',$this->applicantRefNo)->get();
        return $student;
    }

}
