<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\OurAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
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
        $this->data['pageHead'] = 'Contact Address';
        $this->data['addresses'] = ContactUs::all();
       return view('admin.contact.contact', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return $address = ContactUs::all()->count(); exit();
        if (ContactUs::all()->count() < 2) {
            $this->data['pageHead'] = 'Contact Add';
        return view('admin.contact.create', $this->data);
        }else{
            Session()->flash('msg', 'Address Can not add newly, Can update or Delete');
            return view('admin.error.error');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ContactUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'locationsign'  => 'nullable|image|mimes:png|max:100',
            'location'      => 'nullable|string',
            'phonesign'     => 'nullable|image|mimes:png|max:100',
            'phone_no'      => 'nullable|regex:/^[0-9+ (,)-]*$/',
            'emailsign'     => 'nullable|image|mimes:png|max:100',
            'email'         => 'nullable|email',
            'where'         => 'required|string',
        ]);

        $locationImg = $request->file('locationsign');

        $phoneImg = $request->file('phonesign');
        $emailImg = $request->file('emailsign');

        //Location Image Upload
        if ( isset($locationImg) ) {
            //Make unique slug
            $locationImgName = 'location'. '-' . uniqid() . '.' . $locationImg->getClientOriginalExtension();

            // return $locationImgName; exit();

            //Check Category Dir is Exists
            if ( ! Storage::disk('public')->exists('assets/contact') ) {
                Storage::disk('public')->makeDirectory('assets/contact');
            }

            //Resize image for Contact page and Upload
            $resizeLocationImg= Image::make($locationImg)->resize(99,99)->save(100);
            Storage::disk('public')->put('assets/contact/' . $locationImgName, $resizeLocationImg);
        }else{
            $locationImgName = 'location.png';
        }

        ///Phone Image Upload
        if ( isset($phoneImg) ) {
            //Make unique slug
            $phoneImgName = 'phone-no' . '-' . uniqid() . '.' . $phoneImg->getClientOriginalExtension();
            // return $phoneImgName; exit();
            //Check Category Dir is Exists
            if ( ! Storage::disk('public')->exists('assets/contact') ) {
                Storage::disk('public')->makeDirectory('assets/contact');
            }

            //Resize image for Contact Page and Upload
            $resizePhoneImg= Image::make($phoneImg)->resize(99,99)->save(100);
            Storage::disk('public')->put('assets/contact/' . $phoneImgName, $resizePhoneImg);
        }else{
            $phoneImgName = 'phone.png';
        }

        if ( $emailImg ) {
            //Make unique slug

            $emailImgName = Str::slug($request->email) . '-' . uniqid() . '.' . $emailImg->getClientOriginalExtension();
            // return $emailImgName; exit();

            //Check Category Dir is Exists
            if ( ! Storage::disk('public')->exists('assets/contact') ) {
                Storage::disk('public')->makeDirectory('assets/contact');
            }

            //Resize image for Category and Upload
            $resizeEmailImg= Image::make($emailImg)->resize(99,99)->save(100);
            Storage::disk('public')->put('assets/contact/' . $emailImgName, $resizeEmailImg);
        }else{ $emailImgName = 'email.png';}

        $contactAdd = new ContactUs;
        $contactAdd->locationsign = $locationImgName;
        $contactAdd->location = $request->location;
        
        $contactAdd->phonesign = $phoneImgName;
        $contactAdd->phone_no = $request->phone_no;
        $contactAdd->emailsign = $emailImgName;
        $contactAdd->email = $request->email;
        $contactAdd->where = $request->where;
        // return $contactAdd; exit();
        if ($contactAdd->save()) {
            Session()->flash('msg', 'Address has been added '.$contactAdd->where);
            return redirect()->route('contact.index');
        }

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
    public function edit($id)
    {
        $address=ContactUs::findOrFail($id);
        $mode = 'edit';
        return view('admin.contact.create', compact('address', 'mode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $contact)
    {
        $contactus= ContactUs::findOrFail($contact);
        $this->validate($request, [
            'locationsign'  => 'nullable|image|mimes:png|max:100',
            'location'      => 'nullable|string',
            'phonesign'     => 'nullable|image|mimes:png|max:100',
            'phone_no'      => 'nullable|regex:/^[0-9+ (,) -]*$/',
            'emailsign'     => 'nullable|image|mimes:png|max:100',
            'email'         => 'nullable|email',
            'where'         => 'required|string',
        ]);

        $locationImg = $request->file('locationsign');

        $phoneImg = $request->file('phonesign');
        $emailImg = $request->file('emailsign');

        //Location Image Upload
        if ( isset($locationImg) ) {
            //Make unique slug
            $locationImgName = 'location'. '-' . uniqid() . '.' . $locationImg->getClientOriginalExtension();

           //Old image check and delete
            if (Storage::disk('public')->exists('assets/contact/' . $contactus->locationsign ) && $contactus->locationsign != 'default.png') {
                Storage::disk('public')->delete('assets/contact/' . $contactus->locationsign);
            }

            //Check Category Dir is Exists
            if ( ! Storage::disk('public')->exists('assets/contact') ) {
                Storage::disk('public')->makeDirectory('assets/contact');
            }

            //Resize image for Contact page and Upload
            $resizeLocationImg= Image::make($locationImg)->resize(99,99)->save(100);
            Storage::disk('public')->put('assets/contact/' . $locationImgName, $resizeLocationImg);
        }else{
            $locationImgName = $contactus->locationsign;
        }

        ///Phone Image Upload
        if ( isset($phoneImg) ) {
            //Make unique slug
            $phoneImgName = 'phone-no' . '-' . uniqid() . '.' . $phoneImg->getClientOriginalExtension();
            
            //Old image check and delete
            if (Storage::disk('public')->exists('assets/contact/' . $contactus->phonesign ) && $contactus->phonesign != 'default.png') {
                Storage::disk('public')->delete('assets/contact/' . $contactus->phonesign);
            }

            //Check Category Dir is Exists
            if ( ! Storage::disk('public')->exists('assets/contact') ) {
                Storage::disk('public')->makeDirectory('assets/contact');
            }

            //Resize image for Contact Page and Upload
            $resizePhoneImg= Image::make($phoneImg)->resize(99,99)->save(100);
            Storage::disk('public')->put('assets/contact/' . $phoneImgName, $resizePhoneImg);
        }else{
            $phoneImgName = $contactus->phonesign;
        }

        if ( $emailImg ) {
            //Make unique slug

            $emailImgName = Str::slug($request->email) . '-' . uniqid() . '.' . $emailImg->getClientOriginalExtension();
            // return $emailImgName; exit();

            //Old image check and delete
            if (Storage::disk('public')->exists('assets/contact/' . $contactus->emailsign ) && $contactus->emailsign != 'email.png') {
                Storage::disk('public')->delete('assets/contact/' . $contactus->emailsign);
            }

            //Check Contact Dir is Exists
            if ( ! Storage::disk('public')->exists('assets/contact') ) {
                Storage::disk('public')->makeDirectory('assets/contact');
            }

            //Resize image for Contact and Upload
            $resizeEmailImg= Image::make($emailImg)->resize(99,99)->save(100);
            Storage::disk('public')->put('assets/contact/' . $emailImgName, $resizeEmailImg);
        }else{ $emailImgName = $contactus->emailsign;}

    
        $contactus->locationsign = $locationImgName;
        $contactus->location = $request->location;
        $contactus->phonesign = $phoneImgName;
        $contactus->phone_no = $request->phone_no;
        $contactus->emailsign = $emailImgName;
        $contactus->email = $request->email;
        $contactus->where = $request->where;
        
        if ($contactus->save()) {
            Session()->flash('msg', 'Address has been Updated '.$contactus->where);
            return redirect()->route('contact.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $contact)
    {
        $del_contact = ContactUs::findOrFail($contact);

        //Delete Image of location
        if (Storage::disk('public')->exists('assets/contact/'.$del_contact->locationsign) && 'default.png' != $del_contact->locationsign) {
            Storage::disk('public')->delete('storage/assets/contact/'.$del_contact->locationsign);
            
        }

        //Delete Image of Phone
        if (Storage::disk('public')->exists('assets/contact/'.$del_contact->phonesign) && 'default.png' != $del_contact->phonesign) {
            Storage::disk('public')->delete('storage/assets/contact/'.$del_contact->phonesign);

        }

        //Delete Image of Phone
        if ( Storage::disk('public')->exists('assets/contact/'.$del_contact->emailsign ) && 'default.png' != $del_contact->emailsign ) {
            Storage::disk('public')->delete('storage/assets/contact/'.$del_contact->emailsign);
            
        }

        if ($del_contact->delete()) {
         Session()->flash('msg', 'Address has been deleted form '.$del_contact->where);
            return redirect()->back();   
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactform()
    {
        $this->data['addresses'] = ContactUs::where('where', '=', 'contact-page')->get();
        $this->data['ouraddress'] = OurAddress::findOrFail(1);
       return view('contact.contact-form', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactsend(ContactUsRequest $request)
    {
        // return $request->all();
        // exit();
        $data = [];

        foreach ($request->all() as $key => $value) {
            $data[$key] = $value;
        }

        $user['to']= 'abutaher267@gmail.com';

       Mail::send('email.mytestmail', $data, function ($message) use($user) {
            $message->from('abu@abutaher.com', 'abu Taher form');
            $message->sender('abu@abutaher.com', 'abu Taher Sender');

            $message->to($user['to']);
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
            $message->subject('Contact Form');
        });

        Session()->flash('msg', 'Category has been deleted!');
            return redirect()->route('contact.form');
    }

    /**
     * Store Mail in Database
     *
     * @param  \Illuminate\Http\ContactUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function mailstore(ContactUsRequest $request)
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
}
