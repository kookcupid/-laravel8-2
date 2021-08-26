<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('id','DESC')->get();
        return view('employees',compact('employees'));
    }
    
    public function addEmployee(Request $request)
    {
        $employee = new Employee();
        $employee-> name = $request->name;
        $employee-> email = $request->email;
        $employee-> phone = $request->phone;
        $employee-> salary = $request->salary;
        $employee-> department = $request->department;
        $employee->save();
        return response()->json($employee);
    }

    public function getEmployeeById($id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    public function updateEmployee(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee-> name = $request->name;
        $employee-> email = $request->email;
        $employee-> phone = $request->phone;
        $employee-> salary = $request->salary;
        $employee-> department = $request->department;
        $employee->save();
        return response()->json($employee);
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json(['success'=>'Record has been deleted']);
    }
}
