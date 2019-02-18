<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\data_register;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $title = "Home";
        return view('admin\home')->with('title',$title);
    }
    public function dashboard()
    { 
        $title = "Dashboard";
        $result = data_register::all();
        $cont_all = count($result);

        $result1 = data_register::where('type', 'ปวช')->get();
        $cont_vc = count($result1);

        $result2 = data_register::where('type', 'ปวส')->get();
        $cont_hvc = count($result2);
        return view('admin\dashboard')->with('title',$title)->with('cont_all',$cont_all)->with('cont_vc',$cont_vc)->with('cont_hvc',$cont_hvc);
    }
    public function manage()
    { 
        $data = data_register::orderBy('id', 'DESC')->get();
        $title = "Manage";
        return view('admin\manage')->with('title',$title)->with('data',$data);
    }

    public function delete(Request $request)
    {
         $result = data_register::find($request->input('id'));
        if($result->delete())
        {
            echo 'ลบข้อมูลสำเร็จ';
        }
    }
    public function insert_data(Request $request){

    }
    public function fetchdata(Request $request){
        $id = $request->input('id');
        $result = data_register::find($id);
        $output = array(
            'id'    =>  $result->id,
            'title'    =>  $result->title,
            'name'     =>  $result->name,
            'lastname'     =>  $result->lastname,
            'type'     =>  $result->type,
            'school'     =>  $result->school,
            'department'     =>  $result->department
        );
        echo json_encode($output);
    }
    public function add(Request $request)
    {   
        $add = new data_register;
        $add->title = $request->input('title');
        $add->name = $request->input('name');
        $add->lastname = $request->input('lastname');
        $add->type = $request->input('type');
        $add->school = $request->input('school');
        $add->department = $request->input('department');
        $add->save();
        return redirect('admin/manage')->with('message','เพิ่มข้อมูลเรียบร้อย');
       
     }
     public function update(Request $request)
     {
        $id = $request->input('id_user');
        $update = data_register::find($id);
        $update->title = $request->input('title');
        $update->name = $request->input('name');
        $update->lastname = $request->input('lastname');
        $update->type = $request->input('type');
        $update->school = $request->input('school');
        $update->department = $request->input('department');
        $update->save();
        return redirect('admin/manage')->with('message','แก้ไขข้อมูลเรียบร้อย');
     }
}
