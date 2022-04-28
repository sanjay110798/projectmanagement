<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class PostRelation extends Model
{
    protected $table = 'post_relation_table';
    protected $guarded = [];
    public $timestamps = false;


 	public function posts(){
		return $this->belongsTo('App\Model\SocialManagement', 'post_id');
	}
}