<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->paginate(10);
        return view('pages.companies.index')->with('companies', $companies);
    }

    public function create()
    {
        return view('pages.companies.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg, png, jpg|max:2048|dimensions:min_width=300,min_height=200',
        ]);
        $company = new Company();
        if($request->hasFile('logo')){
            $filenameToStore=$this->upload_file($request);
        }
        else {
            $filenameToStore="no_image.png";
        }
        $company->name = $request->input('name');
        $company->website = $request->input('website');
        $company->email = $request->input('email');
        $company->logo = $filenameToStore;
        $company->save();
        return redirect('/companies')->with('success', 'New company was succesfully created!');
    }

    public function show($id)
    {
        $company = Company::find($id);
        if(!empty($company))
            return view('pages.companies.company')->with('company', $company);
        else return view('pages.403')->with('error_msg', 'Company with that ID does not exist.');
    }

    public function edit($id)
    {
        $company = Company::find($id);
        if(!empty($company))
            return view('pages.companies.edit')->with('company', $company);
        else return view('pages.403')->with('error_msg', 'Company with that ID does not exist.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpeg, png, jpg|max:2048|dimensions:min_width=300,min_height=200',
        ]);
        $company = Company::find($id);
        if($request->hasFile('logo')){
            $filenameToStore=$this->upload_file($request);
        }
        $company->name = $request->input('name');
        $company->website = $request->input('website');
        $company->email = $request->input('email');
        if(isset($filenameToStore))
            $company->logo = $filenameToStore;
        $company->save();
        return redirect('/companies')->with('success', 'Comapny was succesfully updated!');
    }

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
