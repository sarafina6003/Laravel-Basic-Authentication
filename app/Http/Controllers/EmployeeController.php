<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->with('company')->paginate(10);
        return view('pages.employees.index')->with('employees', $employees);
    }

    public function create()
    {
        $companies = Company::pluck('name', 'id');
        $companies->prepend('...', '-1');
        return view('pages.employees.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required'
        ]);
        $employee = new Employee();
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->mob_number = $request->input('mob_number');
        $companies_id=$request->input('companies_id');
        if($companies_id==-1)
            $companies_id=NULL;
        $employee->companies_id = $companies_id;
        $employee->email = $request->input('email');
        $employee->save();
        return redirect('/employees')->with('success', 'New Employee was succesfully created!');
    }

    public function show($id)
    {
        $employee = Employee::with('company')->find($id);
        if(!empty($employee))
            return view('pages.employees.employee')->with('employee', $employee);
        else return view('pages.403')->with('error_msg', 'Employee with that ID does not exist.');
    }

    public function edit($id)
    {
        $companies = Company::pluck('name', 'id');
        $companies->prepend('...', '-1');
        $employee = Employee::find($id);
        if(!empty($employee))
            return view('pages.employees.edit', compact('companies'))->with('employee', $employee);
        else return view('pages.403')->with('error_msg', 'Employee with that ID does not exist.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required'
        ]);
        $employee = Employee::find($id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->mob_number = $request->input('mob_number');
        $employee->email = $request->input('email');
        $companies_id=$request->input('companies_id');
        if($companies_id==-1)
            $companies_id=NULL;
        $employee->companies_id = $companies_id;
        $employee->save();
        return redirect('/employees')->with('success', 'Employee was succesfully updated!');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('/employees')->with('success', 'Employee was succesfully deleted!');
    }

}
