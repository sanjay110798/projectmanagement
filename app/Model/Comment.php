<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment_table';
    protected $guarded = [];
    public $timestamps = false;

 	public function social(){
		return $this->belongsTo('App\Model\SocialManagement', 'social_id');
	}
	public function sender(){
		return $this->belongsTo('App\User', 'sender_id');
	}
}