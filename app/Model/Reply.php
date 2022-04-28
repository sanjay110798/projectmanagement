<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Reply extends Model
{
    protected $table = 'reply_table';
    protected $guarded = [];
    public $timestamps = false;

    
 	public function social(){
		return $this->belongsTo('App\Model\SocialManagement', 'post_id');
	}
	public function comm(){
		return $this->belongsTo('App\Model\Comment', 'comment_id');
	}
	public function sender(){
		return $this->belongsTo('App\User', 'sender_id');
	}
}