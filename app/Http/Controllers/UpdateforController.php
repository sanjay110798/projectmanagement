<?php



namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\File;

use App\Model\Menu;

use App\Model\Updatefor;

use App\Model\Menu_permission;

use App\Model\User_menu;



class UpdateforController extends Controller

{

   public function __construct()

    {

        

        $this->middleware('auth');

    }

    public function index()

    {

      $up=Updatefor::get();

      return view('admin.updateformanagement',compact('up'));

    }


    public function insert(Request $request)

    {

      $role=Updatefor::create([

         'name'=>$request->name,
         'created_at'=>date('Y-m-d H:i:s'),
         'updated_at'=>date('Y-m-d H:i:s')

      ]);

      $role->save();

      return redirect()->back()->with('msg','Update For Added Successfully');

    }


     public function update(Request $request,$id)

    {

      $role=Updatefor::where(['id'=>$id])->first();

      $role->update([

      'name'=>$request->name, 

      ]);

   

      return redirect()->back()->with('msg','Data Updated Successfully');

    }

    public function delete($id)

    {

     Updatefor::where(['id' => $id])->delete();

     return redirect()->back()->with('msg','Data Deleted Successfully');

    }

}