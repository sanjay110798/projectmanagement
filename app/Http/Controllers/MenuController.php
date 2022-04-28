<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Model\Menu;

class MenuController extends Controller
{
   public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
      $menu=Menu::get();
      return view('admin.menumanagement',compact('menu'));
    }
    public function denied()
    {
      return view('admin.permission_denied');
    }
    public function add()
    {
      return view('admin.addmenumanagement');
    }
    public function insert(Request $request)
    {
      $menu=Menu::create([
        'menu'=>$request->menu,
        'route_name'=>$request->route_name,
        'add_route'=>$request->add_route,
        'edit_route'=>$request->edit_route,
        'delete_route'=>$request->delete_route
      ]);
      $menu->save();
      return redirect()->route('menu.management')->with('msg','Menu Added Successfully');
    }
     public function edit($id)
    {
      $menu=Menu::where(['id'=>$id])->first();
      return view('admin.editmenumanagement',compact('menu'));
    }
     public function update(Request $request,$id)
    {
      $menu=Menu::where(['id'=>$id])->first();
      $menu->update([
      'menu'=>$request->menu,
      'route_name'=>$request->route_name,
      'add_route'=>$request->add_route,
        'edit_route'=>$request->edit_route,
        'delete_route'=>$request->delete_route
      ]);
      
      return redirect()->route('menu.management')->with('msg','Menu Updated Successfully');
    }
    public function delete($id)
    {
     Menu::where(['id' => $id])->delete();
     return redirect()->route('menu.management')->with('msg','Menu Deleted Successfully');
    }
}