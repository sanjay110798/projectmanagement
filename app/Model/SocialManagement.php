<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SocialManagement extends Model
{
    protected $table = 'social_table';
    protected $guarded = [];
    public $timestamps = false;

 	public function users(){
		return $this->belongsTo('App\User', 'user_id');
	}
}