<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'staffType' => $this->staffType,
            'nature_of_employment' => $this->nature_of_employment,
            'name' => $this->name,
            'f_name' => $this->f_name,
            'email' => $this->email,
            'employmentType' => $this->employmentType,
            'shiftTime' => $this->shiftTime,
            'shift_time' => \App\Models\ShiftTime::gettitle($this->shiftTime),
            'joindate' => $this->joindate,
            'branch' => $this->branch,
            'branch_title' => \App\Models\Branch::gettitle($this->branch),
            'department' => $this->department,
            'department_title' => \App\Models\Department::getTitle($this->department),
            'designation' => $this->designation,
            'designation_title' => \App\Models\Designation::getTitle($this->designation),
            'employee_id' => $this->employee_id,
            'image' => $this->image,

            'account_number' => $this->account_number,
            'bank_name' => $this->bank_name,
            'blood_group' => $this->blood_group,
            'citizenship_number' => $this->citizenship_number,
            'contact_person' => $this->contact_person,
            'contact_person_number' => $this->contact_person_number,
            'contract' => $this->contract,
            'district' => $this->district,
            'dob' => $this->dob,

            'education_level' => $this->education_level,
            'faculty' => $this->faculty,
            'education_year' => $this->education_year,
            'institute' => $this->institute,
            'university' => $this->university,

            'emergency_contact_number' => $this->emergency_contact_number,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'home_location' => $this->home_location,
            'nature_of_employment' => $this->nature_of_employment,
            'pan' => $this->pan,
            'permanent_address' => $this->permanent_address,
            'temporary_address' => $this->temporary_address,
            'imei' => $this->imei,
            'personal_email' => $this->personal_email,
            'phone' => $this->phone,
            'status' => $this->status,
            'supervisor' => $this->supervisor,

            'dynamic_formData' => $this->dynamic_formData,
            'id_proof' => $this->id_proof,
            'offer_letter' => $this->offer_letter,
            'resume' => $this->resume,
            'photo' => $this->photo,
            'appointment_letter' => $this->appointment_letter,
        ];
    }
}
