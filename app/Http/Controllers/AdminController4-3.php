<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\User;
use App\Model\Generalsetting;
use App\Model\Generalsocial;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }
        public function profile()
    {
      return view('admin.profile');
    }
    public function profileUpdate(Request $request)
    {
      $updt = User::where(['id' => Auth::id()])->firstOrFail();
      $pass=$request->password;
      $updt->update([
        'name'=>$request->name,
        'email'=>$request->email,
      ]);
      if ($request->hasFile('photo')) {
      $image = $request->file('photo');
      $img = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/upload/profile/');
      $image->move($destinationPath, $img);
      }else{
      $img=$updt->image;
      }
      $updt->image=$img;
      $updt->save();
      return redirect()->route('profile')->with('msg','Profile Updated Successfully');
    }
    public function profilePassword(Request $request)
    {
    //   $validate = Validator::make($request->all(), [
    //         'old_password' => ['required', 'string'],
    //         'password' => 'required|min:6',
    //         'confirm_password' => 'required|same:password'
    // ]);
    // if ($validator->fails()){
    //   return redirect()->back();
    // }
    $user_id=Auth::user()->id;
    $updt = User::where(['id' => $user_id])->first();
    $pass=$request->old_password;
    if($request->password!=$request->confirm_password)
    {
       return redirect()->back()->with('msg','Password And Confirm Password Does Not Match!!');  
    }
    elseif(Hash::check($pass, $updt->password))
    {

    $updt->update([
    'password' =>Hash::make($request->input('password')),
    ]); 
    return redirect()->back()->with('msg','Password Updated Successfully');   
    }

    else{
        return redirect()->back()->with('msg','Sorry !! Old Password Does Not Match!!');
    } 
       
    }

    ///////////////General Setting//////////////
    public function generalSetting()
    {
      $setting=Generalsetting::get();
      $social=Generalsocial::get();
      return view('admin.generalsetting',compact('setting','social'));
    }
    public function generalSettingadd()
    {
        return view('admin.addgeneral');
    }
    public function generalSettinginsert(Request $request)
    {
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $img = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/upload/general/');
        $image->move($destinationPath, $img);
        }else{
        $img="";
        }
        if($request->type=='text')
        {
          $value=$request->value;
        }
        if($request->type=='file')
        {
          $value=$img;
        }
        $setting=Generalsetting::create([
        'name'=>strtolower(str_replace(" ", "_", $request->name)),
        'value'=>$value,
        ]);
        $setting->save();

        return redirect()->route('general.management')->with('msg','General Setting Added Successfully');
    }
    public function generalSettingupdate(Request $request)
    {

      $site_title=Generalsetting::where(['name'=>'site_title'])->first();
      $site_logo=Generalsetting::where(['name'=>'site_logo'])->first();
      $site_icon=Generalsetting::where(['name'=>'site_icon'])->first();
      $address=Generalsetting::where(['name'=>'address'])->first();
      $admin_email=Generalsetting::where(['name'=>'admin_email'])->first();
      $phone=Generalsetting::where(['name'=>'phone'])->first();
      $description=Generalsetting::where(['name'=>'site_description'])->first();
     

      if ($request->hasFile('site_logo')) {
      $image = $request->file('site_logo');
      $img = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/upload/general/');
      $image->move($destinationPath, $img);
      }else{
      $img=$site_logo->value;
      }

      if ($request->hasFile('site_icon')) {
      $image2 = $request->file('site_icon');
      $img2 = time().'.'.$image2->getClientOriginalExtension();
      $destinationPath = public_path('/upload/general/');
      $image2->move($destinationPath, $img2);
      }else{
      $img2=$site_icon->value;
      }

      $site_title->value = ($request->site_title!='')?$request->site_title : $site_title->value;
      $site_title->save();

      $site_logo->value = $img;
      $site_logo->save();

      $site_icon->value = $img2;
      $site_icon->save();

      $address->value = ($request->address!='')?$request->address : $address->value;
      $address->save();

      $admin_email->value = ($request->admin_email!='')?$request->admin_email : $admin_email->value;
      $admin_email->save();

      $phone->value = ($request->phone!='')?$request->phone : $phone->value;
      $phone->save();

      $description->value = ($request->site_description!='')?$request->site_description : $description->value;
      $description->save();
      
        $name=$request->input('name');
        $value=$request->input('value');
        $count=count($request->input('name'));

        for($i=0;$i<$count;$i++)
        {
            if($name[$i]!='')
            {
             $social = Generalsocial::create([
            'name'=>$name[$i],
            'value'=>$value[$i],
            ]);
            $social->save();   
            }
            
        }
      return redirect()->route('general.management');
    }
    public function getGeneralSocial(Request $request)
    {
      $id = $request->id;
        $value = Generalsocial::where(['id'=>$id])->first();
        $html='<div class="row">
                <div class="col-md-4">
                <label for="email_address">Name</label>
                <div class="form-group">
                <div class="form-line">
                <input type="text"  class="form-control" value="'.$value->name.'" name="name" placeholder="Enter Name" required>
                </div>
                </div> 
                </div>
                <div class="col-md-8">
                <label for="email_address">Link</label>
                <div class="form-group">
                <div class="form-line">
                <input type="text"  class="form-control" value="'.$value->value.'" name="value" placeholder="Enter Link">
                </div>
                </div> 
                </div>';
        echo $html;
     }
     public function generalSocialupdate(Request $request)
     {
      $id=$request->social_id;
      $step=Generalsocial::where(['id'=>$id])->first();
      $step->name=$request->name;
      $step->value=$request->value;
      $step->save();
      return redirect()->back();
     }
    public function generalsettingdelete($id)
    {
     Generalsetting::where(['id' => $id])->delete();
     return redirect()->route('general.management')->with('msg','Setting Deleted successfully');
    }
    public function deletesocial($id)
    {
      Generalsocial::where(['id' => $id])->delete();
     return redirect()->back();
    }
}
