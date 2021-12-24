<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftTime extends Model
{
    use HasFactory;

    protected $table = 'shift_time';  
    protected $fillable = array('title', 'from', 'to', 'branch_id');
    protected $primaryKey = 'id';
    

    public static function gettitle($id){
    	$shift_time = ShiftTime::where('id', $id)->first();
    	if(isset($shift_time->id)){
    		$shifttime = $shift_time->title;
    	}
    	else{
    		$shifttime = '';
    	}
    	return $shifttime;

    }

    public static function checkIntime($staffId, $in_time)
	{	
		$userShiftId = Adjustment_staff::where('id',$staffId)->select('shiftTime')->first();
		$userInTime = ShiftTime::where('id',$userShiftId->shiftTime)->select('from')->first();
		if(!isset($userInTime->from))
		{
		    return FALSE;
		}
		$attendance = Attendance::where('adjustment_staff_id', $staffId)->where('attendance_date', date('Y-m-d'))->first();
		if($attendance)
		{
			if($attendance->in_time && !$attendance->in_time_reason){
				$attendance_user_time = Carbon::parse($attendance->in_time); //user clock in time
				$attendance_in_time =Carbon::parse($userInTime->from); //user shift from time
				// $diffTime = Carbon::parse($attendance_user_time)->diffInMinutes($attendance_in_time);
				if(Carbon::parse($attendance_in_time)->addMinutes(15) < $attendance_user_time)
				{
					return TRUE;
				}
				return FALSE;
			}else{
				return FALSE;
			}
		}
		return FALSE;
	}
	public static function checkOuttime($staffId, $out_time)
	{
		$userShiftId = Adjustment_staff::where('id',$staffId)->select('shiftTime')->first();
		$userOutTime = ShiftTime::where('id',$userShiftId->shiftTime)->select('to')->first();
		$attendance = Attendance::where('adjustment_staff_id', $staffId)->where('attendance_date', date('Y-m-d'))->first();
		if($attendance)
		{
			if($attendance->out_time && !$attendance->out_time_reason)
			{
				$attendance_user_time = Carbon::parse($attendance->out_time); // user clock out time
				$attendance_out_time =Carbon::parse($userOutTime->to)->toDateTimeString(); // user shift time to
				
				// $diffTime =Carbon::parse($attendance_out_time)->diffInMinutes($attendance_user_time);
			
				if($attendance_out_time > Carbon::parse($attendance_user_time)->addMinutes(15)->toDateTimeString())
				{
				    
					return TRUE;
				}
				return FALSE;
			}else{
				return FALSE;
			}
		}
		return FALSE;
	}
}
