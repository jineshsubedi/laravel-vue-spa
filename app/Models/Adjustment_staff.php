<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Adjustment_staff extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'adjustment_staff';

    protected $fillable = array('branch', 'department', 'employee_id', 'staffType', 'nature_of_employment','name','gender', 'supervisor', 'email','password', 'district', 'age', 'employmentType', 'salaryType','shifttime','dob','joindate','remember_token','permanent_address','temporary_address','account_number','blood_group','marital_status','designation','grade','image', 'f_name', 'bank_name', 'resume', 'offer_letter', 'appointment_letter', 'contract', 'id_proof', 'education_level', 'faculty', 'institute', 'university', 'education_year', 'device_id', 'phone', 'salary', 'status', 'pan', 'pf', 'work_mode', 'business_department', 'personal_email', 'citizenship_number', 'emergency_contact_number', 'contact_person', 'contact_person_number', 'assets_taken', 'home_location', 'primary_location', 'secondary_location', 'dynamic_formData', 'probation_end_date', 'on_board', 'agrement', 'on_board_date', 'work_institute', 'work_designation', 'work_period');

    protected $primaryKey = 'id';
}
