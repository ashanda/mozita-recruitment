<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Category;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->type;
        
        if($role == 'admin'){
            $data = DB::table('users')
            ->join('employees', 'employees.employee_uid', '=', 'users.id')
            ->get();
            
            return view('partials.admin.employee.index',compact('data'));
        }  
         
        if($role == 'employee'){
            $data = DB::table('users')
            ->join('employees', 'employees.employee_uid', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->get();
            
            return view('partials.employer.employee.index',compact('data'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $s = Category::all()->where('parent_id','=','0');
        return view('partials.admin.employee.create',compact('s'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    
           $cv_file = $request->file('cv_file')->getClientOriginalName();
           $attachment = $request->file('attachment')->getClientOriginalName();
           
    
           $employee_id = UniqueRandomNumbersWithinRange(1,100000);
           $save = new Employee;
           $save->employee_id = $employee_id;
           $save->employee_uid = Auth::user()->id;
           $save->job_title = $request->job_name;
           $save->job_category = $request->category;
           $save->job_sub_category = $request->subcategory;
           $save->job_role = $request->job_role;
           $save->candidate_name = $request->candidate_name;
           $save->candidate_email = $request->candidate_email;

           if($request->file('cv_file')){
            $file= $request->file('cv_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/cv'), $filename);
            $save->cv = $filename;
          }

          if($request->file('attachment')){
            $file= $request->file('attachment');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/attachment'), $filename);
            $save->attachment = $filename;
          }

           
           
           $employees_add_more = $request->addMoreInputFields;
        
        //add more save note table;
        
        foreach ($employees_add_more as $key=> $employees) {
            
            $note = new Notes();
            $note->note_id = $employee_id;
            $note->emp_uid = Auth::user()->id;
            $note->note = $employees['note'];
           // $note->remind_me = $employees['reminder']; 
            if($employees['note'] == null ){

            }else{
             $note->save();
            }

           
            
         }
         
           $save->save();
           Alert::success('Success', 'Employee Added Successfully');
           $data = DB::table('users')
            ->join('employees', 'employees.employee_uid', '=', 'users.id')
            ->get();
           return view('partials.admin.employee.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $request, $id)
    {
        $role = Auth::user()->type;
        $employee = Employee::find($id);
        $notes = DB::table('notes')
        ->where('note_id', '=', $employee->employee_id)
        ->orderBy('remind_me','ASC')
        ->get();
        
        if($role == 'admin'){
            return view('partials.admin.employee.show',compact('employee','id','notes'));
        }else if($role == 'employee'){
            return view('partials.employer.employee.show',compact('employee','id','notes'));
        }else{

        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $request, $id)
    {
        $role = Auth::user()->type;
        $employee = Employee::find($id);
        
        $s = Category::all()->where('parent_id','=','0');
        if($role == 'admin'){
            return view('partials.admin.employee.edit',compact('employee','id','s'));
        }else if($role == 'employee'){
            return view('partials.employer.employee.edit',compact('employee','id','s'));
        }else{

        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    
    {
        if($request->file('cv_file')){
            $file= $request->file('cv_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/cv'), $filename);
            $update_cv = $filename;
          }else{
            $update_cv = $request->cv_file_update;
          }
    
          if($request->file('attachment')){
            $file= $request->file('attachment');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/upload/attachment'), $filename);
            $update_attachment = $filename;
          }else{
            $update_attachment = $request->attachment_update;
          }
        
        $User_Update = Employee::where("id", $id)->update(["job_title" => $request->job_name,"job_category" => $request->category, "job_sub_category" => $request->subcategory, "job_role" => $request->job_role,'candidate_name'=> $request->candidate_name, 'candidate_email'=> $request->candidate_email,'cv'=> $update_cv,'attachment'=> $update_attachment]);
        
        
        $unq_id = $request->unq_id;
        $emp_id = $request->employee_uid;
        $employees_add_more = $request->addMoreInputFields;
        foreach ($employees_add_more as $key=> $employees) {
            if($employees['note_row_id'] == null){
                $note = new Notes();
                $note->note_id = $unq_id;
                $note->emp_uid = $emp_id;
                $note->note = $employees['note'];
               // $note->remind_me = $employees['reminder']; 
                if($employees['note'] == null ){
    
                }else{
                 $note->save();
                }
         }else{
            $matchThese = ['id'=>$employees['note_row_id']];
            Notes::updateOrCreate($matchThese,['note'=>$employees['note']]);
        
    }
    }
    Alert::success('Success', 'Employee Update successfully');
    return redirect()->back();
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if ($employee->delete()) {
            Alert::success('Success', 'Employee delete successfully');
            return redirect()->back()->with(['success' => 'Category successfully deleted.']);

        }
        Alert::warning('Fail', 'Employee delete faild');
        return redirect()->back()->with(['fail' => 'Unable to delete category.']);
    }
}
