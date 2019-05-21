<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->paginate(10);
        return view('pages.companies.companies')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);
        $company = new Company();
        if($request->hasFile('logo')){
            $filenameToStore=upload_file($request);
        }
        else {
            $filenameToStore="noimage.jpg";
        }
        $company->name = $request->input('name');
        $company->website = $request->input('website');
        $company->logo = $filenameToStore;
        $company->save();
        return redirect('/companies')->with('success', 'New company was succesfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('pages.companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);
        $company = Company::find($id);
        if($request->hasFile('logo')){
            $filenameToStore=upload_file($request);
        }
        $company->name = $request->input('name');
        $company->website = $request->input('website');
        if(isset($filenameToStore))
            $company->logo = $filenameToStore;
        $company->save();
        return redirect('/companies')->with('success', 'Comapny was succesfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect('/companies')->with('success', 'Comapny was succesfully deleted!');
    }

    public function upload_file($request){
        $filenameWithExt=$request->file('logo')->getClientOriginalName();
        $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension=$request->file('logo')->getClientOriginalExtension();
        $filenameToStore=$filename.'_'.time().'.'.$extension;
        $path=$request->file('logo')->storeAs('public/companies_logo', $filenameToStore);
        return $filenameToStore;
    }
}
