<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
class VisitorController extends Controller
{
  public function getVisitorDetails(){
    $ip_address= $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set('Africa/Lagos');
    $visit_time=date("h:i:sa");
    $visit_date=date('d-m-y');
    $result=Visitor::insert([
       'ip_address'=>$ip_address,
       'visit_time' => $visit_time,
       'visit_date'  => $visit_date,
    ]);
    return $result;
  }  
}
