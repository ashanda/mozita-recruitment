<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function destroy(Request $request)
    {
        
        if (Notes::where('id', $request->id)->delete()) {
            Alert::success('Success', 'Contact delete successfully');
            return redirect()->back();

        }
    }
}
