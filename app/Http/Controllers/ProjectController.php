<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Model\Role;
use App\User;
use App\Model\Project;
use App\Model\ProjectRelation;
use App\Model\SocialManagement;
use App\Model\ProjectPost;
class ProjectController extends Controller
{
 public function __construct()
 {

  $this->middleware('auth');
}
public function index()
{
  // echo Auth::user()->role_id;
  // exit;
  if(Auth::user()->level==NULL || Auth::user()->level=='' || Auth::user()->role_id==12 || Auth::user()->role_id==1)
  {
   $project=Project::where(['is_delete'=>'0'])->orderBy('id','desc')->get();
  }else{
   $project = Project::select('project_table.id','project_table.project_name')->join('project_relation_table','project_relation_table.project_id','=','project_table.id')
    ->where('project_relation_table.employee_id',Auth::user()->id)->where('project_relation_table.is_delete','0')->orderBy('id','desc')->get();
  }
    
  return view('admin.projectmanagement',compact('project'));
}
public function deletedProject(Request $request)
{
  $project=Project::where(['is_delete'=>1])->get();
  return view('admin.deletedprojectmanagement',compact('project'));
}
public function add()
{
  $empl=User::where('role_id','!=',1)->where(['is_delete'=>0])->get();
  return view('admin.addprojectmanagement',compact('empl'));
}
public function insert(Request $request)
{
  $project=Project::create([
   'project_name'=>$request->name,
   'created_by'=>Auth::user()->id
  ]);
  $project->save();
  ProjectRelation::create([
     'project_id'=>$project->id,
     'employee_id'=>Auth::id(),
     'position'=>'Admin'
  ]);
  $empl=$request->employee;
  $appservice = app()->make('Appservice');
  foreach ($empl as $key => $value) {
    $proRel=ProjectRelation::create([
     'project_id'=>$project->id,
     'employee_id'=>$value,
     'position'=>'Member'
    ]);
    $proRel->save();
    
    $appservice->create_notification(Auth::id(),'You are added in- '.$request->name.'- Project',$project->id,'Project',$value); 
  }
  return redirect()->route('project.management')->with('msg','Project Added Successfully');
}
public function changeStatus(Request $request)
{
  $pro=Project::where(['id'=>$request->id])->first();
  $pro->status=$request->sts;
  $pro->save();
}
public function edit($id)
{
  $project=Project::where(['id'=>$id])->first();
  $projectrel=ProjectRelation::where(['project_id'=>$id])->get();
  $empl=User::where('role_id','!=',1)->where(['is_delete'=>0])->get();
  return view('admin.editprojectmanagement',compact('project','empl','projectrel'));
}
public function update(Request $request,$id)
{
  $project=Project::where(['id'=>$id])->first();
  $project->update([
    'project_name'=>$request->name, 
  ]);
  $empl=$request->employee;
  $appservice = app()->make('Appservice');
  if($request->employee!=''){
    foreach ($empl as $key => $value) {
      $proRel=ProjectRelation::create([
       'project_id'=>$id,
       'employee_id'=>$value,
       'position'=>'Member'
     ]);
      $proRel->save();

      $appservice->create_notification(Auth::id(),'You are added in- '.$request->name.'- Project',$project->id,'Project',$value); 
    }
  }

  return redirect()->route('project.management')->with('msg','Project Updated Successfully');
}
public function delete(Request $request,$id)
{
  $adata = ProjectPost::where('project_id',$id)->count();
  if($adata == 0){
    Project::where(['id' => $id])->update(['is_delete'=>1]);
   ProjectRelation::where('project_id',$id)->update(['is_delete'=>1]);
   echo "1";
 } else {
   if($request->candel=='Y')
   {
     $adata = ProjectPost::where('project_id',$id)->update(['is_delete'=>1]);
     Project::where(['id' => $id])->update(['is_delete'=>1]);
     ProjectRelation::where('project_id',$id)->update(['is_delete'=>1]);
     echo "1";
     exit;
   }
   echo "0";
 }
}
public function proReldelete($id)
{
  ProjectRelation::where(['id' => $id])->delete();
  return redirect()->back()->with('msg','Project Deleted Successfully');
}
}