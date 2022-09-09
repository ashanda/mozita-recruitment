<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Contact;
use App\Models\Notes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserEmployersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $role = Auth::user()->type;
        if($role == 'employer'){
            $user_data = DB::table('users')
            ->join('employers', 'employers.employer_uid', '=', 'users.id')
            ->where('users.id', Auth::user()->id)
            ->get();
            
            return view('partials.employer.employer.index',compact('user_data'));

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
        if($role == 'employer'){
            return view('partials.employer.employer.create');
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
        $employer->trading = $request->trading;
        $employer->nzbn = $request->nzbn;
        $employer->business_industry = $request->business_industry;
        $employer->company_branch = $request->branch;
        $employer->branch_address = $request->branch_address;
        $employer->company_phone = $request->company_phone;
        $employer->website = $request->website;
        
        $employer->date_first_contact_made = $request->dfcm;
       
        
        $employers_add_more = $request->addMoreInputFields;
        $employers_add_more_contact = $request->addMoreInputFieldsContact;

        foreach($employers_add_more_contact as $key=> $employers){
            $contact = new Contact();
            $contact->unq_id = $employer_id;
            $contact->emp_uid = Auth::user()->id;
            $contact->contact_person = $employers['contact_person'];
            $contact->designation = $employers['designation'];
            $contact->phone_number = $employers['phone'];
            $contact->email = $employers['email'];
            
            if($employers['contact_person'] == null){

            }else{
             $contact->save();
            }
        }
        //add more save note table;
        
        foreach ($employers_add_more as $key=> $employers) {
            
            $note = new Notes();
            $note->note_id = $employer_id;
            $note->emp_uid = Auth::user()->id;
            $note->note = $employers['note'];
            $note->remind_me = $employers['reminder']; 
            if($employers['note'] == null && $employers['reminder']){

            }else{
             $note->save();
            }
            
            
        }
       
        $employer->save();

        Alert::Alert('Success', 'Employer has been Added successfully.');  
        return redirect()->route('user_employer.index'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $request,$id)
    {
        $role = Auth::user()->type;
        $employer = Employer::find($id);
        $notes = DB::table('notes')
        ->where('note_id', '=', $employer->employer_id)
        ->orderBy('remind_me','ASC')
        ->get();
        $contacts = DB::table('contacts')
        ->where('unq_id', '=', $employer->employer_id)
        ->orderBy('created_at','ASC')
        ->get();
        if($role == 'employer'){
            return view('partials.employer.employer.show',compact('employer','id','notes','contacts'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $request,$id)
    {
        $role = Auth::user()->type;
        $employer = Employer::find($id);
        if($role == 'employer'){
            return view('partials.employer.employer.edit',compact('employer','id'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User_Update = Employer::where("id", $id)->update(["company_name" => $request->company_name,"trading" => $request->trading , "nzbn" => $request->nzbn, "business_industry" => $request->business_industry,'company_branch'=> $request->branch, 'branch_address'=> $request->branch_address,'company_phone'=> $request->company_phone,'website'=> $request->website, 'date_first_contact_made'=> $request->dfcm]);
        
        $employers_add_more_contact = $request->addMoreInputFieldsContact;
        $unq_id = $request->employer_id;
        foreach($employers_add_more_contact as $key=> $employers){
            
            if($employers['row_id'] == null){
            $contact = new Contact();
            $contact->unq_id = $unq_id;
            $contact->emp_uid = Auth::user()->id;
            $contact->contact_person = $employers['contact_person'];
            $contact->designation = $employers['designation'];
            $contact->phone_number = $employers['phone'];
            $contact->email = $employers['email'];
            
            if($employers['contact_person'] == null && $employers['designation'] == null && $employers['phone'] == null && $employers['email'] == null){

            }else{
             $contact->save();
            }
            }else{
                $matchThese = ['id'=>$employers['row_id']];
                Contact::updateOrCreate($matchThese,['contact_person'=>$employers['contact_person'],'designation'=> $employers['designation'],'phone_number'=>$employers['phone'],'email'=>$employers['email']]);
            }
        }

        $employers_add_more = $request->addMoreInputFields;
        foreach ($employers_add_more as $key=> $employers) {
            if($employers['note_row_id'] == null){
            $note = new Notes();
            $note->note_id = $unq_id;
            $note->emp_uid = Auth::user()->id;
            $note->note = $employers['note'];
            $note->remind_me = $employers['reminder']; 
            if($employers['note'] == null && $employers['reminder']){

            }else{
             $note->save();
            }
        }else{
            $matchThese = ['id'=>$employers['note_row_id']];
            Notes::updateOrCreate($matchThese,['note'=>$employers['note'],'remind_me'=> $employers['reminder']]);
        }
            
            
            
        }
       
        Alert::success('Success', 'Employer Update successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Employer::where('id', $id)->delete()) {
            Alert::success('Success', 'Employer delete successfully');
            return redirect()->back();

        }
        Alert::warning('Fail', 'Employer delete faild');
        return redirect()->back();
    }
}
