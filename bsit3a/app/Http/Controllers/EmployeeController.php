<?php

namespace App\Http\Controllers;

use App\Models\Employments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class EmployeeController extends Controller
{
    public function getEmployment(){
        //   return response()->json(["success" => true,"employee" =>  $employments],200);
         return view("employee");
    }

   public function displayData(){
    $employments = Employments::with(["user" => function($q){
        $q->select('*');
    }])->with(["locations" => function($q){
        $q->select('*')->with(["country" => function($q){
            $q->select('*');
        }]);
    }])
    ->get(); 
   

    return response()->json(["success" => true, "employee" => $employments], 200);
   }




   public function testFunction(){
     $test = DB::select("SELECT * FROM employments AS emp INNER JOIN users AS u ON u.id = emp.user_id
              INNER JOIN departments as d ON d.id = emp.department_id");

              return response()->json(["success" => true, "numberResponse"=> $test]);
   }

   public function testData(){
   $data = DB::select("SELECT emp.*,d.name AS d_name, u.email AS email FROM employments AS emp
            INNER JOIN departments AS d ON d.id = emp.department_id
            INNER JOIN locations AS l ON l.id = emp.location_id
            INNER JOIN employment_status AS es ON es.id = emp.employment_status_id
            INNER JOIN employment_types AS et ON et.id = emp.employment_types_id
            INNER JOIN users as u ON u.id = emp.user_id");


    // return response()->json(["success" => true,"employee" =>  $employments],200);
       return view("test",compact('data'));
   }
}
