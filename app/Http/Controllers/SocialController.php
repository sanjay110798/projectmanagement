<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Model\Menu;
use App\Model\Role;
use App\User;
use App\Model\Menu_permission;
use App\Model\User_menu;
use App\Model\Updatefor;
use App\Model\SocialManagement;
use App\Model\Comment;

class SocialController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
		if(Auth::user()->role_id=='1' || Auth::user()->role_id=='10')
		{
			$post=SocialManagement::where(['is_delete'=>0])->orderBy('id','desc')->get();    
		}else{
			$post=SocialManagement::where(['is_delete'=>0])->where(['user_id'=>Auth::id()])->orderBy('id','desc')->get();    
		}
		return view('admin.socialmanagement',compact('post'));
    }

    public function add()
    {
      $list=Updatefor::get();
      return view('admin.addsocialmanagement',compact('list'));
    }
    public function insert(Request $request)
    {
      date_default_timezone_set('Asia/Kolkata');
      $currentTime = date( 'Y-m-d H:i:s');
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $ext=strtolower(pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION));
        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'doc' || $ext == 'docx' || $ext == 'pdf' || $ext == 'xls' || $ext == 'xlsx'){
        $img = time().'_'.rand(0000,9999).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/task/');
        $image->move($destinationPath, $img);
        }
        }else{
        $img="";
        }
        $post=SocialManagement::create([
        'user_id'=>Auth::id(),
        'image'=>$img,
        'priority'=>$request->updatefor,
        'description'=>$request->description,
        'level'=>$request->level,
        'created_at'=>$currentTime,
        'updated_at'=>$currentTime,
        ]);
      $post->save();
      return redirect()->route('social.management')->with('msg','Post Added Successfully');
    }
     public function edit($id)
    {
      $list=Updatefor::get();
      $post=SocialManagement::where(['id'=>$id])->first();
      return view('admin.editpostmanagement',compact('post','list'));
    }
     public function update(Request $request,$id)
    {
      $post=SocialManagement::where(['id'=>$id])->first();
    
      date_default_timezone_set('Asia/Kolkata');
      $currentTime = date( 'Y-m-d H:i:s');

      if ($request->hasFile('image')) {

        $image = $request->file('image');
        $ext=strtolower(pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION));
        if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif' || $ext == 'doc' || $ext == 'docx' || $ext == 'pdf' || $ext == 'xls' || $ext == 'xlsx'){
        $img = time().'_'.rand(0000,9999).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/task/');
        $image->move($destinationPath, $img);
        }
        }else{
        $img=$post->image;
        }
        $post->update([
        'user_id'=>Auth::id(),
        'image'=>$img,
        'priority'=>$request->updatefor,
        'description'=>$request->description,
        'level'=>$request->level,
        'updated_at'=>$currentTime,
        ]);
       
      
      return redirect()->route('social.management')->with('msg','Post Updated Successfully');
    }
    public function delete($id)
    {
     SocialManagement::where(['id' => $id])->update(['is_delete'=>1]);   
     echo "1";
    }
}