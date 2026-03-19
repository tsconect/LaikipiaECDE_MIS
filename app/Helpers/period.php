<?php

use App\Models\Notification;
function log_user_activity($subject_id,$model_table_name,$action,$description,$asset_url,$new_object='{}',$current_object='{}', $type=''){

try {
 

   $asset_url = ltrim(str_replace(url('/'), '', $asset_url), '/');
   $currentSessionId = session()->getId();
   $ip_address =request()->getClientIp();

 



    $isp = 'Unknown';
    $object=new \App\Models\SystemActivityLog();
    $object->causer_id=auth()->user()->id;
    // $object->session_id =$session_id;
    $object->ip_address=$ip_address;
    $object->network=$isp;
    $object->subject_id=$subject_id;
    $object->model_table_name=$model_table_name;
    $object->action=$action;
    $object->description=$description;
    $object->asset_url= $asset_url;
    $object->current_object=$current_object;
    $object->new_object=$new_object;
    $object->type=$type;
    $object->save();
} catch (\Throwable $th) {
   throw $th;
}

}

function sendNotification($id, $message)
{
   try {
    Notification::create([
        'user_id' => $id,
        'message' => $message,
        'link' => url('/'),
      ]);
   } catch (\Exception $e) {
      // Handle the exception
      // You can log the error or perform other actions here
      throw $e;
   }
}

