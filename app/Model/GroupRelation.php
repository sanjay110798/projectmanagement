<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class GroupRelation extends Model
{
    protected $table = 'group_relation_table';
    protected $guarded = [];
    public $timestamps = false;

 	public function grp(){
		return $this->belongsTo('App\Model\Group', 'group_id');
	}
	public function empl(){
		return $this->belongsTo('App\User', 'employee_id');
	}
}