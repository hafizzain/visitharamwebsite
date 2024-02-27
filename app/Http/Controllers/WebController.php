<?php

namespace App\Http\Controllers;

use App\Helper\GlobalHelper;
use App\Models\Contact;
use App\Models\Package;
use App\Models\Facility;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class WebController extends Controller
{

    public function index()
    {
        $packages = Package::where('active', 1)->get();
        return view('index', compact('packages'));
    }

    public function packageDetails($id)
    {
        $package = Package::findOrFail($id);
        $packages = Package::where('active', 1)->get();
        return view('detail', compact('package','packages'));
    }

    public function contactForm(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = Contact::create($request->all());

        $data = [
            'data' => $data,
        ];

        GlobalHelper::sendEmail('info@high5daycare.ca', "A new contact message has been recieved", 'emails.contact', $data);
        return redirect()->route('contact')->with('success', 'Contact message submitted successfully');
    }


}
