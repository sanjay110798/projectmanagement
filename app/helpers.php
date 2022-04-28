<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Model\Group;

if(!function_exists('get_user_name')){
	function get_user_name($id){
		$user = User::select('name')->where('id',$id)->first();
		return $user->name;
	}
}

