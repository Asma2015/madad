<?php

namespace App\Http\Controllers;



use App\Http\Requests\UpdateEmployee;
use App\Http\Requests\StoreEmployee;
use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $employees = Employee::with('company')->orderBy('created_at', 'DESC')
        ->paginate(10);
        switch ($request->ws)
        {
            case 'getEmployees' :
                return $employees;
                break;
            default :
                return view('employees.index', compact('employees'));
        }
        
        //return view('employees.index', compact('employees'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();
        return view('employees.create', compact('companies'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        try {
            $employee = Employee::create($request->all());
            $response = redirect()->route('employees.index')->withSuccess($employee->first_name . ' has been created!');
        } catch (\Throwable $t) {
            $response = redirect()->back()->withErrors($t->getMessage());
        }
        return $response;
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::get();
        return view('employees.edit', compact('employee', 'companies'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employees.index')->withSuccess($employee->first_name . ' has been updated!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $message = $employee->fullname . " successfully deleted!";
        $employee->delete();
        return redirect()->route('employees.index')->withSuccess($message);
    }
}
