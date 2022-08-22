<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Notes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmployersController extends Controller
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
            ->join('employers', 'employers.employer_uid', '=', 'users.id')
            ->get();
            
            return view('partials.admin.employer.index',compact('data'));
        }  
         
        if($role == 'employer'){
            $data = DB::table('users')
            ->join('employers', 'employers.employer_uid', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->get();
            
            return view('partials.employer.employer.index',compact('data'));

        }

    
        
      
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $role = Auth::user()->type;
        
        if($role == 'admin'){
            return view('partials.admin.employer.create');

        }else if($role == 'employer'){
            return view('partials.employer.employer.create');
        }else{

        } 
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employer_id = UniqueRandomNumbersWithinRange(1,100000);
        //employer save
        $employer = new Employer();
        $employer->employer_id = $employer_id;
        $employer->employer_uid = Auth::user()->id;
        $employer->company_name = $request->company_name;
        $employer->company_email = $request->email;
        $employer->company_branch = $request->branch;
        $employer->company_address = $request->address;
        $employer->contact_person = $request->contact_person;
        $employer->position = $request->position;
        $employer->date_first_contact_made = $request->dfcm;
       
        
        $employers_add_more = $request->addMoreInputFields;
        
        //add more save note table;
        foreach ($employers_add_more as $key=> $employers) {
            
            $note = new Notes();
            $note->note_id = $employer_id;
            $note->emp_uid = Auth::user()->id;
            $note->note = $employers['note'];
            $note->remind_me = $employers['reminder']; 
           $note->save();
            
        }
        $employer->save();

        Alert::Alert('Success', 'Employer has been Added successfully.');  
        return redirect()->route('employer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $request,$id)
    {
        $role = Auth::user()->type;
        $employer = Employer::find($id);
        if($role == 'admin'){
            return view('partials.admin.employer.show',compact('employer','id'));
        }else if($role == 'employer'){
            return view('partials.employer.employer.show');
        }else{

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $request,$id)
    {
        $role = Auth::user()->type;
        $employer = Employer::find($id);
        if($role == 'admin'){
            return view('partials.admin.employer.edit',compact('employer','id'));
        }else if($role == 'employer'){
            return view('partials.employer.employer.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {
        //
    }
}
