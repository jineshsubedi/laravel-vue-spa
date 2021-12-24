<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    protected $table = 'designation';  

    protected $fillable = array('title', 'department_id', 'tor');
    protected $primaryKey = 'id';
    
    
     public $timestamps = false;

    public function Department()
    {
    	return $this->belongsTo('App\Models\Department');
    }

    public static function getTitle($id)
    {
    	$cur = Designation::where('id', $id)->first();
    	if (isset($cur->title)) {
    		$title = $cur->title;
    	} else{
    		$title = '';
    	}
    	return $title;
    }
    public static function getTor($id)
    {
    	$cur = Designation::where('id', $id)->first();
    	if (isset($cur->title)) {
    		$tor = $cur->tor;
    	} else{
    		$tor = '';
    	}
    	return $tor;
    }
}
