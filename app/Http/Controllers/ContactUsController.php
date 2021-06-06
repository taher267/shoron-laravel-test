<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\OurAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
       return view('contact.create', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ContactUsRequest $request)
    {
        $data = [];

        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        $user['to']= 'abutaher267@gmail.com';

       $messageSend = Mail::send('email.mytestmail', $data, function ($message) use($user) {
            $message->from('abu@abutaher.com', 'abu Taher form');
            $message->sender('abu@abutaher.com', 'abu Taher Sender');

            $message->to($user['to']);
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
            $message->subject('Contact Form');
             return true;
        });
        if( $messageSend == true) {
              //Session::flash('message', "Message Has been send!!!");
               return redirect()->route('contact'); 
            }
            // return Redirect::back()->with('message', 'Message Has been send!!!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContactUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactUsRequest $request)
    {
        $formData = $request->all();
        $name = $formData['name'];
        $email = $formData['email'];
        $phone = $formData['phone_no'];
        $message = $formData['message'];

        // if (ContactUs::create($formData)) {
        //     Session::flash('message', "Message Has been send!!!");
        // }else{
        //     Session::flash('message', "Message Has not been send!!!");
        // }
        
        // return redirect()->to('contact/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
