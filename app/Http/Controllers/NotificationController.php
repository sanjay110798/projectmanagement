<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\Generalsetting;
use App\Model\Generalsocial;
use App\Model\SocialManagement;
use App\Model\PostRelation;
use App\Model\Comment;
use App\Model\Reply;
use App\Model\Project;
use App\Model\ProjectRelation;
use App\Model\Group;
use App\Model\GroupRelation;
use App\Model\Like_Dislike;
use App\Model\Updatefor;
use App\Model\ProjectPost;
use App\Model\Notification;
class NotificationController extends Controller
{
	protected $prbase_url;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
		$this->prbase_url = 'https://decor-x.com/apps/report';
    }

    public function fetchNotification(Request $request)
    {

    	// if(Auth::user()->role_id!='1'){
    		$comm = Notification::where(['post_for'=>Auth::id()])->orWhere(['post_for'=>'global'])->orderBy('id','desc')->take(10)->get();
    	// }else{
    	// 	$comm = Notification::orderBy('id','desc')->take(10)->get();
    	// }

    	foreach($comm as $k=>$v){
    		$user = User::select('name','image')->where('id',$v->user_id)->first();
    		$comm[$k]->user = ($user) ? $user : [];
    	}
    	$noti = $comm; 
    	$html="";
    	$html.='<ul class="notifications_list">';
    	foreach($noti as $k=>$v){
    		if($v->is_see=="n"){
    			$nt="not_red";
    			}else{
                $nt="";
    			}
    		$html.='<li class="seenoti '.$nt.'" data-id="'.$v->id.'">';
    		if($v->tbl_name=='Group'){
    			$html.='<a href='.$this->prbase_url.'/group/'.$v->post_id.'>';
    		}else if($v->tbl_name=='Project'){
    			$html.='<a href='.$this->prbase_url.'/project/'.$v->post_id.'>';
    		}else if($v->tbl_name=='Comment'){
    			$html.='<a href='.$this->prbase_url.'/give-reply/'.$v->post_id.'>';
    		}else{
    			$html.='<a href='.$this->prbase_url.'/show-post/'.$v->tbl_name.'/'.$v->post_id.'>';
    		}

    		$html.='<div class="user_photo">';
    		if(empty($v->user) && !isset($v->user->image)){
                $html.='<img src="'.$this->prbase_url.'/assets/social/images/users/user-1.jpg" alt="user"/>';
            }else if($v->user && $v->user->image==''){
				$html.='<img src="'.$this->prbase_url.'/assets/social/images/users/user-1.jpg" alt="user"/>';
            }else{
                $html.='<img src='.$this->prbase_url.'/upload/profile/'.$v->user->image.' alt="user"/>';
				
            }
    		$html.='</div>
    		<div class="text_content">
    		<h4 class="name">';
        if(isset($v->user->name) && !empty($v->user)){
        $html.= $v->user->name;
        }else{
        $html.='';   
        }
        $html.='</h4>
    		<h5 class="project">'.$v->details.'...</h5>
    		<p class="hrs">'.date('d-m-Y',strtotime($v->created_at)).' @ '.date('h:i a',strtotime($v->created_at)).'</p>
    		</div>
    		</a>
    		</li>';
    	}
    	$html.='</ul>';
    	echo $html;

    }
    
	}
