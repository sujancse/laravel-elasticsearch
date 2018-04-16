<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
      $salary = \DB::select("select salary from employees order by salary desc limit 0,1");
      print_r($salary);
    }
}
