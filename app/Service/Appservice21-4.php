<?php
namespace App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Model\Menu_permission;
use App\Model\Menu;
use App\Model\Generalsetting;
use App\Model\Generalsocial;
use App\Model\User_menu;
use App\Model\Comment;
use App\Model\Reply;
use App\Model\Group;
use App\Model\Notification;
use App\Model\Like_Dislike;
use App\Model\Project;
use App\Model\GroupRelation;
class Appservice
{
	public function __construct() {
        
    }
	public function checkpermission($menu_id,$user_id)
	{
		$check=Menu_permission::where(['menu_id'=>$menu_id,'user_id'=>$user_id])->first();
		return $check;
	}
    public function getsetting($name)
    {
		$value=Generalsetting::where(['name'=>$name])->first();
		return $value->value;
    }
	public function getComment($id)
	{
		$com=Comment::where(['social_id'=>$id])->orderBy('id','desc')->get();
		if(count($com)!=0)
		{
			return $com;
		}else{
			return $com=[];
		}
	}
	public function getReply($id)
	{
		$com=Reply::where(['comment_id'=>$id])->orderBy('id','desc')->take(3)->get();
		if(count($com)!=0)
		{
			return $com;
		}else{
			return $com=[];
		}
	}
	public function checkListaccess($route_name)
	{
		$menu = Menu::where(['route_name' => $route_name])->first();
		if($menu){
			
			$pre=Menu_permission::where(['menu_id'=>$menu->id,'user_id'=>Auth::user()->role_id,'list_access'=>'Y']);
			if($pre->count()!=0)
			{
				return true;  
			}
		}
	}
	public function checkAddaccess($route_name)
	{
		$menu = Menu::where(['route_name' => $route_name])->first();
					
		if($menu){	
			$pre=Menu_permission::where(['menu_id'=>$menu->id,'user_id'=>Auth::user()->role_id,'add_access'=>'Y'])->get();
			
			if(count($pre)>0)
			{
				return true;  
			}
		}
	}
	public function checkEditaccess($route_name)
	{
		$menu = Menu::where(['route_name' => $route_name])->first();
		if($menu){	
			$pre=Menu_permission::where(['menu_id'=>$menu->id,'user_id'=>Auth::user()->role_id,'edit_access'=>'Y']);
			if($pre->count()!=0)
			{
				return true;  
			}
		}
	}
	public function checkDeleteaccess($route_name)
	{
		$menu = Menu::where(['route_name' => $route_name])->first();
		if($menu){
			$pre=Menu_permission::where(['menu_id'=>$menu->id,'user_id'=>Auth::user()->role_id,'delete_access'=>'Y']);
			if($pre->count()!=0)
			{
				return true;  
			}
		}
	}
	public function canAccess($route_name)
	{
		$check=User_menu::where(['user_id'=>Auth::id(),'route'=>$route_name]);
		if($check->count()!=0)
		{
			return true;  
		}else{
			return false;
		}
	}
	public function get_group(){
		
		
		
		if(Auth::user()->role_id==1)
    	{
    		$group = Group::select('group_table.id','group_table.group_name')->where('group_table.is_delete',0)->orderBy('id','desc')->get();
    	}else if(Auth::user()->role_id==12){
            $group = Group::select('group_table.id','group_table.group_name')->where('group_table.is_delete',0)->orderBy('id','desc')->get();
    	}else{
    	    $group = Group::select('group_table.id','group_table.group_name')->join('group_relation_table','group_relation_table.group_id','=','group_table.id')
							->where('group_relation_table.employee_id',Auth::user()->id)->where('group_table.is_delete',0)->orderBy('id','desc')->get();
    		
    	}

    	return $group;

	}
	public function create_notification($user_id,$details,$p_id,$c_id,$p_for){
		date_default_timezone_set('Asia/Kolkata');
		$currentTime = date( 'Y-m-d H:i:s');
		if($p_for!=''){
			if($user_id!=$p_for)
			{
				$comm = Notification::create([
				'user_id'=>$user_id,
				'post_id'=>($p_id)? $p_id: NULL,
				'tbl_name'=>($c_id)? $c_id: NULL,
				'post_for'=>($p_for) ? $p_for:'global',
				'details'=>$details,
				'created_at'=>$currentTime,
				'updated_at'=>$currentTime
		        ]);
		        $comm->save();
			}
		}else{
			    $comm = Notification::create([
				'user_id'=>$user_id,
				'post_id'=>($p_id)? $p_id: NULL,
				'tbl_name'=>($c_id)? $c_id: NULL,
				'post_for'=>($p_for) ? $p_for:'global',
				'details'=>$details,
				'created_at'=>$currentTime,
				'updated_at'=>$currentTime
		        ]);
		        $comm->save();
		}
		
		
		return true;
	}
	public function total_likedis($status,$id,$table){
		$check = Like_Dislike::where(['post_id'=>$id, 'tbl_name'=>$table, 'status'=>$status])->count();
		return $check;
	}
	public function total_comment($id,$table){
		$check = Comment::where(['parent_id'=>NULL,'post_id'=>$id,'tbl_name'=>$table])->count();
		return $check;
	}
	public function get_notification(){
		// if(Auth::user()->role_id!='1'){
           $comm = Notification::where(['post_for'=>Auth::id()])->orWhere(['post_for'=>'global'])->orderBy('id','desc')->take(10)->get();
		// }else{
		// 	$comm = Notification::orderBy('id','desc')->take(10)->get();
		// }
		
		foreach($comm as $k=>$v){
			$user = User::select('name','image')->where('id',$v->user_id)->first();
			$comm[$k]->user = ($user) ? $user : [];
		}
		return $comm;
	}
	public function project(){

	if(Auth::user()->role_id==1)
	{
	$project = Project::select('project_table.id','project_table.project_name')->where('project_table.is_delete',0)->where('status','!=','Complete')->orderBy('id','desc')->get();
	}else if(Auth::user()->role_id==12){
	$project = Project::select('project_table.id','project_table.project_name')->where('project_table.is_delete',0)->where('status','!=','Complete')->orderBy('id','desc')->get();
	}else{

	$project = Project::select('project_table.id','project_table.project_name')->join('project_relation_table','project_relation_table.project_id','=','project_table.id')
				->where('project_relation_table.employee_id',Auth::user()->id)->where('project_table.is_delete',0)->where('status','!=','Complete')->orderBy('id','desc')->get();
	}

		return $project;
	}
}