<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchSetting extends Model
{
    use HasFactory;
    protected $table = 'branch_setting';

    protected $fillable = array('branch_id', 'revenue', 'client', 'performance', 'performance_rater', 'performance_rating_type', 'attendance_handler', 'account_handler', 'account_handler_signature', 'hr_handler', 'out_source_handler');

    protected $primaryKey = 'id';

    public function Branch()
    {
        return $this->belongsTo('App\Models\Branch');
    }

    public static function getPerformanceRater($branch_id)
    {
        $data = '';
        $bs = BranchSetting::select('performance_rater')->where('branch_id', $branch_id)->first();
        if (isset($bs->performance_rater)) {
            $data = $bs->performance_rater;
        }

        return $data;
    }

    public static function getClient($branch_id)
    {
        $data = '';
        $bs = BranchSetting::select('client')->where('branch_id', $branch_id)->first();
        if (isset($bs->client)) {
            $data = $bs->client;
        }

        return $data;
    }

    public static function getCanteen($branch_id)
    {
        $data = '';
        $bs = BranchSetting::select('canteen')->where('branch_id', $branch_id)->first();
        if (isset($bs->canteen)) {
            $data = $bs->canteen;
        }

        return $data;
    }
    // performance
    public static function getPerformanceRatingTime($branch_id)
    {
        $data = BranchSetting::select('performance_rating_type')->where('branch_id', $branch_id)->first();
        if (!isset($data->id)) {
            return null;
        }
        return $data->performance_rating_type;
    }
    //attendance handler
    public static function getAttendanceHandler($staff_id, $branch_id)
    {
        $data = BranchSetting::select('attendance_handler')->where('branch_id', $branch_id)->where('attendance_handler', $staff_id)->first();
        if (isset($data->attendance_handler)) {
            return true;
        }
        return false;
    }
    public static function isAccountHandler()
    {
        $data = BranchSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->where('account_handler', auth()->guard('staffs')->user()->id)->first();
        if ($data) {
            return true;
        }
        return false;
    }
    //get salary calculate type
    public static function getSalaryCalculate()
    {
        $branch = auth()->guard('staffs')->user()->branch;
        $data = BranchSetting::select('salary_calculate')->where('branch_id', $branch)->first();
        return $data->salary_calculate;
    }
    //payroll
    public static function getAccountHandler()
    {
        $branch = auth()->guard('staffs')->user()->branch;
        $data = BranchSetting::select('account_handler', 'account_handler_signature')->where('branch_id', $branch)->first();
        return $data;
    }
    public static function payrollViewer()
    {
        $data1 = Adjustment_staff::where('id', auth()->guard('staffs')->user()->id)->where('branch', 2)->where('department', 4)->first();
        $data2 = BranchSetting::where('account_handler', auth()->guard('staffs')->user()->id)->where('branch_id', auth()->guard('staffs')->user()->branch)->first();
        if ($data1 || $data2) {
            return true;
        }
        return false;
    }
    public static function isHrHandler()
    {
        $data = BranchSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->where('hr_handler', auth()->guard('staffs')->user()->id)->first();
        if ($data) {
            return true;
        }
        return false;
    }
    public static function isStaffHandler()
    {
        $data = BranchSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->where('staff_handler', auth()->guard('staffs')->user()->id)->first();
        if ($data) {
            return true;
        }
        return false;
    }
    public static function isSurveyHandler()
    {
        $data = BranchSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->where('survey_handler', auth()->guard('staffs')->user()->id)->first();
        if ($data) {
            return true;
        }
        return false;
    }
    public static function isTrainingHandler()
    {
        $data = BranchSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->where('training_handler', auth()->guard('staffs')->user()->id)->first();
        if ($data) {
            return true;
        }
        return false;
    }
    public static function isOutSourceHandler()
    {
        $data = BranchSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->first();
        if (isset($data->id) && $data->out_source_handler != NULL) {
            $ids = json_decode($data->out_source_handler);
            if (in_array(auth()->guard('staffs')->user()->id, $ids)) {
                return true;
            }
        }
        return false;
    }
}
