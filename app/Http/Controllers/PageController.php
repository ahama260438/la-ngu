<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_register;
class PageController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function add_data(Request $request){
    	$add = new data_register;
        $add->title = $request->input('title');
        $add->name = $request->input('name');
        $add->lastname = $request->input('lastname');
        $add->type = $request->input('type');
        $add->school = $request->input('school');
        $add->department = $request->input('department');
        $add->save();

        $title = $request->input('title');
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $type = $request->input('type');
        $school = $request->input('school');
        $department = $request->input('department');

        //ส่งเข้าไลน์
        $lineapi = 'xXb0MpU7V9pAOyK2Qcsf1Qwkq5rRUqQSFz9sebd7d13'; // ใส่ token key ที่ได้มา
		$mms =  trim($type."\n ชื่อ-สกุล =>".$title.$name."\r".$lastname."\n จบจาก =>".$school."\n แผนก =>".$department); // ข้อความที่ต้องการส่ง
		date_default_timezone_set("Asia/Bangkok");
		$chOne = curl_init();
		curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
		// SSL USE
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
		//POST
		curl_setopt( $chOne, CURLOPT_POST, 1);
		curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms");
		curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
		$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
		curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
		curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec( $chOne );
		//Check error
		if(curl_error($chOne))
		{
			echo 'error:' . curl_error($chOne);
		}
		else {
			$result_ = json_decode($result, true);
		}
		curl_close( $chOne );  
		//ส่งเข้าไลน์
	
        return redirect('/')->with('message','
        	สมัครเรียนเรียบร้อย');
    }

}
