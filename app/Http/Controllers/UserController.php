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
use App\Model\PostRelation;
use App\Model\User_menu;
use App\Model\Notification;
use App\Model\SocialManagement;
use App\Model\ProjectRelation;
class UserController extends Controller
{
   public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
      if(Auth::user()->role_id=='1' || Auth::user()->role_id=='10')
      {
		  $user=User::where(['is_delete'=>0])->get();
      }else{
         $user=User::where(['is_delete'=>0])->whereNotIn('role_id',[1,Auth::id()])->get();
      }
     
      return view('admin.usermanagement',compact('user'));
    }
    public function deletedUser(Request $request)
    {
      if(Auth::user()->role_id=='1')
      {
      $user=User::where(['is_delete'=>1])->get();
      }else{
      $user=User::where(['is_delete'=>1])->whereNotIn('role_id',[1,Auth::id()])->get();
      }
     
      return view('admin.deletedusermanagement',compact('user'));
    }
    public function restoreUser($id)
    {
      $user=User::where(['id'=>$id])->first();
      $user->is_delete='0';
      $user->save();

      return redirect()->back()->with('msg','User Restore Successfully');
    }

    public function add()
    {
      $menu=Menu::get();
      $role=Role::whereNotIn('id',[1])->get();
      return view('admin.addusermanagement',compact('menu','role'));
    }
    public function insert(Request $request)
    {
      $user=User::create([
      'name'=>$request->name,
      'email'=>$request->email,
      'password'=>Hash::make($request->password),
      'level'=>$request->level,
      ]);
      $user->save();
      $user->role_id=$request->role;
      $user->save();

      /*$menu=$request->menu;
      foreach($menu as $val)
      {
        $m=Menu::where(['id'=>$val])->first();
        $l_a=$request->post('list_'.$val);
        $a_a=$request->post('add_'.$val);
        $e_a=$request->post('edit_'.$val);
        $d_a=$request->post('delete_'.$val);
        $menuC=Menu_permission::create([
        'menu_id'=>$val,
        'user_id'=>$user->id,
        'list_access'=>($l_a) ? 'Y':'N',
        'add_access'=>($a_a) ? 'Y':'N',
        'edit_access'=>($e_a) ? 'Y':'N',
        'delete_access'=>($d_a) ? 'Y':'N',
        ]);
        $menuC->save();

        if($l_a)
        {
          $l=User_menu::create([
          'user_id'=>$user->id,
          'route'=>$m->route_name,
          ]);
          $l->save();
        }
        if($a_a)
        {
          $a=User_menu::create([
          'user_id'=>$user->id,
          'route'=>$m->add_route,
          ]);
          $a->save();
        }
        if($e_a)
        {
          $e=User_menu::create([
          'user_id'=>$user->id,
          'route'=>$m->edit_route,
          ]);
          $e->save();
        }
        if($d_a)
        {
          $d=User_menu::create([
          'user_id'=>$user->id,
          'route'=>$m->delete_route,
          ]);
          $d->save();
        }
      }*/
     
      return redirect()->route('user.management')->with('msg','User Added Successfully');
    }
     public function edit($id)
    {

      $user=User::where(['id'=>$id])->first();
      $menuP=Menu_permission::where(['user_id'=>$id])->get();
      $menu=Menu::get();
     
      if(Auth::user()->role_id=='1')
      {
       $role=Role::get();
      }else{
          $role=Role::whereNotIn('id',[1])->get();
      }
      return view('admin.editusermanagement',compact('user','menu','menuP','role'));
    }
     public function update(Request $request,$id)
    {
      $user=User::where(['id'=>$id])->first();
      $user->update([
      'name'=>$request->name,
      'email'=>$request->email,
      'role_id'=>$request->role,
      'level'=>$request->level,
      ]);
    if($request->password != '' && !Hash::check($request->password, $user->password)){
        $user->password = Hash::make($request->password);
        $user->save();
    }
     /* $menu=$request->menu;
      foreach($menu as $val)
      {
        $m=Menu::where(['id'=>$val])->first();
        $l_a=$request->post('list_'.$val);
        $a_a=$request->post('add_'.$val);
        $e_a=$request->post('edit_'.$val);
        $d_a=$request->post('delete_'.$val);
        
        $check=Menu_permission::where(['menu_id'=>$val,'user_id'=>$user->id])->first();
        if($check)
        {
          $check->update([
          'list_access'=>($l_a) ? 'Y':'N',
          'add_access'=>($a_a) ? 'Y':'N',
          'edit_access'=>($e_a) ? 'Y':'N',
          'delete_access'=>($d_a) ? 'Y':'N',
          ]);

              $l_check=User_menu::where(['user_id'=>$id,'route'=>$m->route_name])->first();
              $a_check=User_menu::where(['user_id'=>$id,'route'=>$m->add_route])->first();
              $e_check=User_menu::where(['user_id'=>$id,'route'=>$m->edit_route])->first();
              $d_check=User_menu::where(['user_id'=>$id,'route'=>$m->delete_route])->first();

              if($l_a)
              {
              if(!$l_check)
              {
                $l=User_menu::create([
                'user_id'=>$user->id,
                'route'=>$m->route_name,
                ]);
                $l->save();
              }
              }else{
               if($l_check)
               {
               User_menu::where(['id' => $l_check->id])->delete();
               }
              }
              if($a_a)
              {
              if(!$a_check)
              {
                $a=User_menu::create([
                'user_id'=>$user->id,
                'route'=>$m->add_route,
                ]);
                $a->save();
              }
              }else{
               if($a_check)
               {
                User_menu::where(['id' => $a_check->id])->delete();
               }
              }

              if($e_a)
              {
              if(!$e_check)
              {
              $e=User_menu::create([
              'user_id'=>$user->id,
              'route'=>$m->edit_route,
              ]);
              $e->save();
              } }else{
               if($e_check)
               {
                User_menu::where(['id' => $e_check->id])->delete();
               }
              }

              if($d_a)
              {
              if(!$d_check)
              {
              $d=User_menu::create([
              'user_id'=>$user->id,
              'route'=>$m->delete_route,
              ]);
              $d->save();
              }}else{
               if($d_check)
               {
                User_menu::where(['id' => $d_check->id])->delete();
               }
              }

        }else{
              $menuC=Menu_permission::create([
              'menu_id'=>$val,
              'user_id'=>$user->id,
              'list_access'=>($l_a) ? 'Y':'N',
              'add_access'=>($a_a) ? 'Y':'N',
              'edit_access'=>($e_a) ? 'Y':'N',
              'delete_access'=>($d_a) ? 'Y':'N',
              ]);
              $menuC->save();

              if($l_a)
              {
              $l=User_menu::create([
              'user_id'=>$user->id,
              'route'=>$m->route_name,
              ]);
              $l->save();
              }
              if($a_a)
              {
              $a=User_menu::create([
              'user_id'=>$user->id,
              'route'=>$m->add_route,
              ]);
              $a->save();
              }
              if($e_a)
              {
              $e=User_menu::create([
              'user_id'=>$user->id,
              'route'=>$m->edit_route,
              ]);
              $e->save();
              }
              if($d_a)
              {
              $d=User_menu::create([
              'user_id'=>$user->id,
              'route'=>$m->delete_route,
              ]);
              $d->save();
              }
        }


      
      }*/
      
      return redirect()->route('user.management')->with('msg','User Updated Successfully');
    }
    public function delete(Request $request,$id)
    {

		$data = PostRelation::where('user_id',$id)->count();
		$adata = SocialManagement::where('user_id',$id)->count();
    $pdata = ProjectRelation::where(['employee_id'=>$id])->count();
		if($data == 0 && $adata == 0 && $pdata==0){
			Menu_permission::where(['user_id' => $id])->update(['is_delete'=>1]);
			User::where(['id' => $id])->update(['is_delete'=>1]);
			User_menu::where(['user_id' => $id])->update(['is_delete'=>1]);
			Notification::where(['user_id' => $id])->update(['is_delete'=>1]);
			
      echo "1";
      exit;
		  } else {
      if($request->candel=='Y')
      {
        PostRelation::where('user_id',$id)->update(['is_delete'=>1]);
        SocialManagement::where('user_id',$id)->update(['is_delete'=>1]);
        ProjectRelation::where(['employee_id'=>$id])->update(['is_delete'=>1]);
        Menu_permission::where(['user_id' => $id])->update(['is_delete'=>1]);
        User::where(['id' => $id])->update(['is_delete'=>1]);
        User_menu::where(['user_id' => $id])->update(['is_delete'=>1]);
        Notification::where(['user_id' => $id])->update(['is_delete'=>1]);
        echo "1";
        exit;
      }
			echo "0";
		}
    }
	public function status(Request $request){
		$change = User::where(['id' => $request->id])->update(['status'=>$request->status]);
		if($change)
			return back()->with('msg','User can access your site.');
		else
			return back()->with('msg','User successfully block.');
	}
}