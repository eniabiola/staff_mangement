<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use Session;

class StaffManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::orderBy('created_at', 'desc')->paginate(10);
        return view('staff.index')->withStaff($staff);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit')->withStaff($staff);
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
        $staff = Staff::findOrFail($id);
        $this->validate($request, [
            'first_name'=> 'required|min:3|max:100',
            'last_name'=> 'required|min:3|max:100',
            'email'=> 'required|email',
            'mobile'=> 'required',
            'address'=> 'required|max:200',
        ]);

        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->email = $request->email;
        $staff->mobile = $request->mobile;
        $staff->address = $request->address;
        if ($staff->save()) {
            Session::flash('success', 'Staff Details was sucessfully edited.');
            return redirect()->route('staffmanagement.index'); 
        } else {
            return redirect()->back()->withInputs();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchstaff(Request $request)
    {
        if ($request->isMethod('get')) 
        {
            return redirect()->route('staffmanagement.index');
        }

        $searchTerm = $request->search; 
        $staff = DB::table('staff')
                ->where('first_name', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('last_name', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('mobile', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('address', 'LIKE', "%{$searchTerm}%") 
                ->orWhere('email', 'LIKE', "%{$searchTerm}%") 
                ->paginate(15);
        if ($staff->count() > 0) 
        {
        return view('staff.search')->withStaff($staff);
        } else {   
        $staff = "The Search Term does not match any record in our database";     
        return view('staff.error')->withStaff($staff);
        }
    }


    public function enablestaff(Request $request)
    {
        if ($request->isMethod('get')) 
        {
            return redirect()->route('staffmanagement.index');
        }

        $id = $request->enable;
        $staff = Staff::findOrFail($id);
        $staff->enable = "true";
        if ($staff->save()) {
        Session::flash('success', 'Staff has been disabled.');
        return redirect()->route('staffmanagement.index');
        }
    }

    public function disablestaff(Request $request)
    {
        if ($request->isMethod('get')) 
        {
            return redirect()->route('staffmanagement.index');
        }
        
        $id = $request->enable;
        $staff = Staff::findOrFail($id);
        $staff->enable = "false";
        if ($staff->save()) {
        Session::flash('success', 'Staff has been enabled.');
        return redirect()->route('staffmanagement.index');
        }
    }
}
