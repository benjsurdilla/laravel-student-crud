<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Maatwebsite\Excel\Excel as BaseExcel;
class ExportExcellController extends Controller
{
    function index()
    {   
        $student_data = DB::table('students')->get();
        return view('export_excel')->with('student_data',$student_data);
    }

    function excel()
    {
        $student_data = DB::table('students')->get()->toArray();

        $student_array[] = array(
            'First Name',
            'Last Name',
            'Gender',
            'Country',
            'City',
            'Address'

        );

        foreach($student_data as $key => $students_data)
        {
            $student_array[] = array(
                'First Name'    =>     $students_data->first_name,
                'Last Name'     =>     $students_data->last_name,
                'Gender'        =>     $students_data->gender,
                'Country'       =>     $students_data->country,
                'City'          =>     $students_data->city,
                'Address'       =>     $students_data->address
    
            );
            
        }
        
        Excel::create('Students Data', function($excel) 
        use($student_array){ 
            //Spread Sheets title
            $excel->setTitle('Students Data');
            $excel->sheet('Students Sheet', function($sheet) 
            use($student_array){
                $sheet->fromArray($student_array,null,'A1',
                false, false);

            });


        })->download('xlsx');
        // return view('export_excel')->with('student_data',$student_data);
    }
}
