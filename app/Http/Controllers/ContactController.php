<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('contact.contact_us');
    }
    public function sendMail(Request  $request){
     $details=[
         'name'=>$request->name,
         'email'=>$request->email,
         'phone'=>$request->phone,
         'message'=>$request->message
     ];
     Mail::to('voanhtuan00001@gmail.com')->send(new ContactMail($details));

       return back()->with('message_sent','Đã gửi yêu cầu thành công!!!');
     }
}
