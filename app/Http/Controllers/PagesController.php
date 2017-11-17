<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;
class PagesController extends Controller
{
public function getIndex( )
{
return view('pages.welcome');
return "hello Index";

}
public function getAbout( )
{
$first = 'Sirajul';
$last = 'Mostafa';

$fullname = $first . " " . $last;
$email = 'sirajulmost@examp.com';
$data = [];
$data['email'] = $email;
$data['fullname'] = $fullname;
return view('pages.about')->withData($data);

}
public function getContact( )
{
return view('pages.contact');

}
public function postContact(Request $request )
{
$this->validate($request, [
'email' => 'required|email',
'subject' => 'min:3',
'message' => 'min:10']);

$data = array(
'email' => $request->email,
'subject' => $request->subject,
'bodyMessage' => $request->message
);

Mail::send('emails.contact', $data, function($message) use ($data){
$message->from($data['email']);
$message->to('sirajulmost@gmail.com');
$message->subject($data['subject']);
});

return redirect('/');
//->whith('success', 'Your Email was Sent successfully !');

}
}
