<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'department';  

    protected $fillable = array('title', 'leave_number', 'max_leave', 'branch_id', 'department_head');
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function Designations()
    {
    	return $this->hasMany('App\Models\Designation');
    }

    public static function getTitle($id)
    {
    	$cur = Department::where('id', $id)->first();
    	if (isset($cur->title)) {
    		$title = $cur->title;
    	} else{
    		$title = '';
    	}
    	return $title;
    }

    public static function getLeave($id)
    {
        $cur = Department::where('id', $id)->first();
        if (isset($cur->leave_number)) {
            $leave_number = $cur->leave_number;
        } else{
            $leave_number = 0;
        }
        return $leave_number;
    }

    public static function getAllDepartment()
    {
        return Department::where('branch_id', auth()->user()->branch)->orderBy('title', 'asc')->get();
    }
    public static function isDeptHead()
    {
        $data = Department::where('id', auth()->user()->department)->where('department_head', auth()->user()->id)->first();
        if($data){
            return true;
        }
        return false;
    }
}
