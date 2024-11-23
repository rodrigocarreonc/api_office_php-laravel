<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Salary;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function employee($id){
        $employee = Employee::where('id_employee', $id)->get();
        return response()->json($employee);
    }

    public function salary($id){
        $salary = Employee::where('employees.id_employee', $id)->join('salary', 'employees.id_employee', '=', 'salary.id_employee')
        ->select('employees.id_employee','first_name','last_name', 'amount')-> get();
        return response()->json($salary);
    }
}
