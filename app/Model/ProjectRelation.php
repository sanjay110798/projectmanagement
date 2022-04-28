<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectRelation extends Model
{
    protected $table = 'project_relation_table';
    protected $guarded = [];
    public $timestamps = false;
    
 	public function proj(){
		return $this->belongsTo('App\Model\Project', 'project_id');
	}
	public function empl(){
		return $this->belongsTo('App\User', 'employee_id');
	}

}