<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Model\Menu;
use App\Model\Role;
use App\Model\Menu_permission;
use App\Model\User_menu;

class RoleController extends Controller
{
   public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
      $role=Role::get();
      return view('admin.rolemanagement',compact('role'));
    }

    public function add()
    {
        $menu=Menu::get();
      return view('admin.addrolemanagement',compact('menu'));
    }
    public function insert(Request $request)
    {
      $role=Role::create([
         'role_name'=>$request->name,
      ]);
      $role->save();
      $menu=$request->menu;
      foreach($menu as $val)
      {
        $m=Menu::where(['id'=>$val])->first();
        $l_a=$request->post('list_'.$val);
        $a_a=$request->post('add_'.$val);
        $e_a=$request->post('edit_'.$val);
        $d_a=$request->post('delete_'.$val);
        $menuC=Menu_permission::create([
        'menu_id'=>$val,
        'user_id'=>$role->id,
        'list_access'=>($l_a) ? 'Y':'N',
        'add_access'=>($a_a) ? 'Y':'N',
        'edit_access'=>($e_a) ? 'Y':'N',
        'delete_access'=>($d_a) ? 'Y':'N',
        ]);
        $menuC->save();

        if($l_a)
        {
          $l=User_menu::create([
          'user_id'=>$role->id,
          'route'=>$m->route_name,
          ]);
          $l->save();
        }
        if($a_a)
        {
          $a=User_menu::create([
          'user_id'=>$role->id,
          'route'=>$m->add_route,
          ]);
          $a->save();
        }
        if($e_a)
        {
          $e=User_menu::create([
          'user_id'=>$role->id,
          'route'=>$m->edit_route,
          ]);
          $e->save();
        }
        if($d_a)
        {
          $d=User_menu::create([
          'user_id'=>$role->id,
          'route'=>$m->delete_route,
          ]);
          $d->save();
        }
      }
      return redirect()->route('role.management')->with('msg','Role Added Successfully');
    }
     public function edit($id)
    {
      $role=Role::where(['id'=>$id])->first();
      $menuP=Menu_permission::where(['user_id'=>$id])->get();
      $menu=Menu::get();
      return view('admin.editrolemanagement',compact('role','menu','menuP'));
    }
     public function update(Request $request,$id)
    {
      $role=Role::where(['id'=>$id])->first();
      $role->update([
      'role_name'=>$request->name, 
      ]);
      
      $menu=$request->menu;
      foreach($menu as $val)
      {
        $m=Menu::where(['id'=>$val])->first();
        $l_a=$request->post('list_'.$val);
        $a_a=$request->post('add_'.$val);
        $e_a=$request->post('edit_'.$val);
        $d_a=$request->post('delete_'.$val);
        
        $check=Menu_permission::where(['menu_id'=>$val,'user_id'=>$role->id])->first();
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
                'user_id'=>$role->id,
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
                'user_id'=>$role->id,
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
              'user_id'=>$role->id,
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
              'user_id'=>$role->id,
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
              'user_id'=>$role->id,
              'list_access'=>($l_a) ? 'Y':'N',
              'add_access'=>($a_a) ? 'Y':'N',
              'edit_access'=>($e_a) ? 'Y':'N',
              'delete_access'=>($d_a) ? 'Y':'N',
              ]);
              $menuC->save();

              if($l_a)
              {
              $l=User_menu::create([
              'user_id'=>$role->id,
              'route'=>$m->route_name,
              ]);
              $l->save();
              }
              if($a_a)
              {
              $a=User_menu::create([
              'user_id'=>$role->id,
              'route'=>$m->add_route,
              ]);
              $a->save();
              }
              if($e_a)
              {
              $e=User_menu::create([
              'user_id'=>$role->id,
              'route'=>$m->edit_route,
              ]);
              $e->save();
              }
              if($d_a)
              {
              $d=User_menu::create([
              'user_id'=>$role->id,
              'route'=>$m->delete_route,
              ]);
              $d->save();
              }
        }
      }
      return redirect()->route('role.management')->with('msg','Role Updated Successfully');
    }
    public function delete($id)
    {
     Role::where(['id' => $id])->delete();
     return redirect()->route('role.management')->with('msg','Role Deleted Successfully');
    }
}