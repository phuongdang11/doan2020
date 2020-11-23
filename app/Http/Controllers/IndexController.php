<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    function index(){
        return view("index");
     }
 
     function gioithieu(){
         $d=array('title'=>'Giới thiệu');
         return view('services.about',$d);
     }
 
     function lienhe(){
         $d=array('title'=>'Liên hệ');
         return view("services.contact", $d);
     }
 
     function menu(){
         $d=array('title'=>'Thực đơn');
         return view("services.thucdon", $d);
     }
 
     function services(){
         $d=array('title'=>'Dịch vụ');
         return view("services.serviceschild", $d);
     }
}
