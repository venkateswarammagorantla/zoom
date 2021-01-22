<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use DB;

class ZoomMeeting extends Controller
{
    public static function CreateZoomMeeting()
	{	
	 $Topic='java class';	
	 $StartTime='2021-05-05T20:30:00';
	 $Duration='30';
	 

		// Modify the Start Time format a bit, YYYY-MM-DD HH:MM:SS to YYYY-MM-DDTHH:MM:SS
		$StartTime = str_replace(" ", "T", $StartTime);

		//Get Host Id and JWT Token from .env 		
		$ZOOM_Host_UserId = env('ZOOM_HOST_USERID');	
		$ZOOM_JWT_Token = env('ZOOM_JWT_TOKEN');
		$authorization = "Bearer " .$ZOOM_JWT_Token;	
		 
		try {
			$arr = array(
				"userid" => $ZOOM_Host_UserId,		
				"topic" => $Topic,			//Topic of the meeting.		
				"start_time" => $StartTime,		//e.g, "2020-10-21T10:30:00"
				"duration" => $Duration,
				"authorization" => $authorization	
			);

			$dataRet = self::createMeeting($arr);
			return Response::json($dataRet);

		} catch (Exception $e) {
			echo "error";
		}
	}

	public static function createMeeting($arr)
	{
		$curl = curl_init();
		$data = [
			"topic" => $arr["topic"],
			"type" => 2,
			"start_time" => $arr["start_time"],
			"duration" => 	$arr["duration"],	//meeting duration in minutes.
			"password" => "12349876",
			"settings" => [
				"waiting_room" => true,
				"host_video" => true,
				"join_before_host" => true	
			]
		];
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.zoom.us/v2/users/" . $arr["userid"] . "/meetings",
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_HTTPHEADER => array(
				"User-Agent: Zoom-Jwt-Request",
				"authorization: " . $arr["authorization"],
				"content-type: application/json"
			),
		));
		$response = curl_exec($curl);
		$data = json_decode($response);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$host_result=DB::Insert("INSERT INTO `zoom_host` (`table_id`, `id`, `host_id`, `host_email`, `topic`, `start_time`, `duration`, `created_at`, `join_url`, `password`, `encrypted_password`) VALUES (NULL, '$data->id', '$data->host_id', '$data->host_email', '$data->topic', '$data->start_time', '$data->duration', '$data->created_at', '$data->join_url', '$data->password', '$data->encrypted_password');");
			$user_result=DB::Insert("INSERT INTO `zoom` (`user_id`, `join_url`, `start_time`) VALUES (NULL, '$data->join_url', '$data->start_time');");
			if($host_result==true&&$user_result==true){
				echo "meeting created successfully";
			}


		}
	}
}
