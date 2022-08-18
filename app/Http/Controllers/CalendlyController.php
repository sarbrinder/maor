<?php

namespace App\Http\Controllers;
use Helper;
use DB;
use Session;
use App\Models\Calendly as Calendly;
use Illuminate\Http\Request;

class CalendlyController extends Controller
{
    
    public function getEvents(){
    $ch = curl_init();
    $uuid = 'c9b3b38e-a538-4c8d-8ec9-e5d71dddb77a';
    curl_setopt($ch, CURLOPT_URL, 'https://calendly.com/api/v1/users/me/event_types');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization:Bearer eyJraWQiOiIxY2UxZTEzNjE3ZGNmNzY2YjNjZWJjY2Y4ZGM1YmFmYThhNjVlNjg0MDIzZjdjMzJiZTgzNDliMjM4MDEzNWI0IiwidHlwIjoiUEFUIiwiYWxnIjoiRVMyNTYifQ.eyJpc3MiOiJodHRwczovL2F1dGguY2FsZW5kbHkuY29tIiwiaWF0IjoxNjU4ODQwMjc4LCJqdGkiOiI3ZDkzNWIyZS0wMDVjLTQ5NDgtYTM5Yy0yMDY0NGE4MTZkNDYiLCJ1c2VyX3V1aWQiOiJjOWIzYjM4ZS1hNTM4LTRjOGQtOGVjOS1lNWQ3MWRkZGI3N2EifQ.GdnE2fUDLHq2C5EegNZt8E7KHJkTq5sBg6G1XnGygWdVf_5CvYbrw2Fe0p7yV1OkCHdwhO6Z3IopLxc9aEXXsw',
    // 'organization:https://api.calendly.com/organizations/f0cb6df5-de56-4b59-a5b3-6578ceb1745d'
    ]);

   $response = curl_exec($ch);
   $result = json_decode($response);
    curl_close($ch);
     echo '<pre>';print_r($result->data);
     $events = array();
     foreach($result->data as $val){
         $created = explode('T',$val->attributes->created_at);
        //   echo '<pre>';print_r($created);die;
         $events[] = array(
             'eventId' => $val->id,
             'color' => $val->attributes->color,
             'duration' => $val->attributes->duration,
             'created_at' => $created[0],
             'slug' => $val->attributes->slug,
             'name' => $val->attributes->name,
             'description' => $val->attributes->description,
             'location' => $val->attributes->location,
             'url' => $val->attributes->url,
             'active' => $val->attributes->active,
             );
     }
     
      $res = Calendly::saveEvents($events);
    }
    public function webhook(){
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, 'https://calendly.com/api/v1/users/me/event_types');
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
     curl_setopt($ch, CURLOPT_HTTPHEADER, [
     'Content-Type : application/json',
     'X-TOKEN:XX5SX52YXRDBQ5QEDJ3PTMJWK3TIXWIZ',
    ]);

    $response = curl_exec($ch);
echo '<pre>';print_r($response);die;
curl_close($ch);
    }
    
    public function dbTest(){
         $res = Calendly::dbTest();
        echo '<pre>';print_r($res);die;
    }
}