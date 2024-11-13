<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\HousingAllotmentApplication;

class AllotmentApplicationController extends Controller
{
    public function newAllotmentApplication(){
        $districts = HousingAllotmentApplication::orderBy('district_name', 'asc')->get();
        return view('allotment-application.new-application',compact('districts'));
    }

    public function newAllotmentApplicationSave(Request $request){

        $request->validate([
            'applicant_name' => 'required',
            'email' => 'required',
        ]);

        if (isset($validator) && $validator->fails()) {

            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $is_inserted=1;
        if($is_inserted){
            Alert::success('Done !', 'Application Submitted Successfully');
        }else{
            Alert::error('Error !', 'Failed to Submit Application');
        }
        
        return redirect('/new-application');
        

        //dd('test');
    }
}
