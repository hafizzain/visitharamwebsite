<?php

namespace App\Http\Controllers;

use App\Helper\GlobalHelper;
use App\Models\Contact;
use App\Models\CustomerReview;
use App\Models\Hotel;
use App\Models\HotelFacility;
use App\Models\Package;
use App\Models\Facility;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $packages = Package::count();
        $services = Service::count();
        $facilities = Facility::count();
        return view('home', compact('packages', 'services', 'facilities'));
    }



    public function packages(Request $request)
    {
        $data = Package::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    //                    dd($riders);
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->active == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('hotel', function ($data) {
                    $hotel = $data->hotel->name;
                    return $hotel;
                })
                ->addColumn('actions', function ($data) {

                    $actions = '<div class="btn-group-sm" role="group" aria-label="Basic example">
                    <a href="' . route('edit.package', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                    <button class="btn btn-outline-danger btn-sm delete-package" data-id="' . $data->id . '">Delete</button>

                                            </div>';
                    return $actions;
                })
                ->rawColumns(['status', 'actions','hotel'])
                ->make(true);
        }
        return view('packages.index');
    }

    public function addPackage(Request $request)
    {
        $hotels = Hotel::where('status', 1)->get();
        return view('packages.edit', compact('hotels'));
    }

    public function insertPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'files' => 'required|array',
            'files.*' => 'required|mimes:png,jpg,jpeg',
        ], [
            'files.required' => 'Please upload at least one file.',
            'files.*.mimes' => 'Each file must be a PNG, JPG, JPEG, WEBP, GIF, XLS, XLSX, DOC, DOCX, or PDF file.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $uploadedFiles = [];
        $filesUploaded = $request->file('files');
        $uploadedFiles = GlobalHelper::uploadAndSaveFile($filesUploaded, 'uploads/packages');

        $package = new Package();
        $package->name = $request->name;
        $package->days = $request->days;
        $package->nights = $request->nights;
        $package->hotel_id = $request->hotel_id;
        $package->price = $request->price;
        $package->description = $request->description;
        $package->active = $request->status;
        $package->save();

        foreach ($uploadedFiles as $filePath) {
            $filesToAssociate[] = ['file' => $filePath];
        }

        $package->media()->createMany($filesToAssociate);

        return redirect()->route('packages')->with('success', 'Package Added Successfully');
    }

    public function editPackage($id)
    {
        $package = Package::find($id);
        $hotels = Hotel::where('status', 1)->get();
        return view('packages.edit', compact('package','hotels'));
    }

    public function updatePackage($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $package = Package::find($id);
        $package->name = $request->name;
        $package->days = $request->days;
        $package->nights = $request->nights;
        $package->price = $request->price;
        $package->description = $request->description;
        $package->hotel_id = $request->hotel_id;
        $package->active = $request->status;
        $package->save();

        return redirect()->route('packages')->with('success', 'Package Updated Successfully');
    }

    public function deletePackage($id)
    {
        Package::find($id)->delete();
        return back()->with('success', 'Package deleted Successfully');
    }

    public function facilityIndex(Request $request)
    {
        $data = Facility::with('package')->orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('image', function ($data) {
                    $imageUrl = asset( $data->image); // Adjust the path accordingly
                    return '<img src="' . $imageUrl . '" alt="Image" class="img-thumbnail" width="50" height="50">';
                })
                ->addColumn('package', function ($data) {
                    $package = $data->package->name;
                    return $package;
                })
                ->addColumn('status', function ($data) {
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class=" btn-group-sm" role="group" aria-label="Basic example">
                    <a  href="' . route('edit.facility', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <button class="btn btn-outline-danger btn-sm delete-facility" data-id="' . $data->id . '">Delete</button>

                    </div>';
                    return $actions;
                })
                ->rawColumns(['image','package', 'status', 'actions'])
                ->make(true);
        }
        return view('facility.index');
    }
    public function addFacility()
    {
        $packages = Package::where('active', 1)->get();
        return view('facility.edit', compact('packages'));
    }
    public function storeFacility(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'package_id' => 'required',
            'image' => 'image|mimes:jpeg,png,svg,jpg,gif|max:2048'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $facility = new Facility();
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'facility_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $facility->image;
        }
        $facility->image = $image;
        $facility->name = $request->name;
        $facility->package_id = $request->package_id;
        if (!empty($request->status) && $request->status == 'on') {
            $facility->status = 1;
        } else {
            $facility->status = 0;
        }

        $facility->save();

        return redirect()->route('facility.index')->with('success', 'Facility saved successfully.');
    }
    public function editFacility($id)
    {
        $facility = Facility::find($id);
        $packages = Package::where('active', 1)->get();
        return view('facility.edit', compact('facility', 'packages'));
    }
    public function updateFacility(Request $request, $id)
    {
        $facility = Facility::find($id);
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'facility_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $facility->image;
        }
        $facility->image = $image;
        $facility->name = $request->name;
        $facility->package_id = $request->package_id;
        if ($request->status == 'on') {
            $facility->status = 1;
        } else {
            $facility->status = 0;
        }
        $facility->save();

        return redirect()->route('facility.index')->with('success', 'Facility updated successfully.');
    }
    public function deleteFacility($id)
    {
        Facility::find($id)->delete();
        return back()->with('success', 'Facility deleted Successfully');
    }


    public function serviceIndex(Request $request)
    {
        $data = Service::with('package')->orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('image', function ($data) {
                    $imageUrl = asset( $data->image); // Adjust the path accordingly
                    return '<img src="' . $imageUrl . '" alt="Image" class="img-thumbnail" width="50" height="50">';
                })
                ->addColumn('package', function ($data) {
                    $package = $data->package->name;
                    return $package;
                })
                ->addColumn('status', function ($data) {
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class=" btn-group-sm" role="group" aria-label="Basic example">
                    <a  href="' . route('edit.service', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                                       <button class="btn btn-outline-danger btn-sm delete-service" data-id="' . $data->id . '">Delete</button>

                                            </div>';
                    return $actions;
                })
                ->rawColumns(['image','package', 'status', 'actions'])
                ->make(true);
        }
        return view('service.index');
    }

    public function addService()
    {
        $packages = Package::where('active', 1)->get();
        return view('service.edit', compact('packages'));
    }
    public function storeService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'package_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $service = new Service();
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'service_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $service->image;
        }
        $service->name = $request->name;
        $service->image = $image;
        $service->package_id = $request->package_id;
        if (!empty($request->status) && $request->status == 'on') {
            $service->status = 1;
        } else {
            $service->status = 0;
        }

        $service->save();

        return redirect()->route('service.index')->with('success', 'Service saved successfully.');
    }
    public function editService($id)
    {
        $service = Service::find($id);
        $packages = Package::where('active', 1)->get();
        return view('service.edit', compact('service', 'packages'));
    }
    public function updateService(Request $request, $id)
    {
        $service = Service::find($id);
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'service_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $service->image;
        }
        $service->image = $image;
        $service->name = $request->name;
        $service->package_id = $request->package_id;
        if ($request->status == 'on') {
            $service->status = 1;
        } else {
            $service->status = 0;
        }
        $service->save();

        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    }
    public function deleteService($id)
    {
        Service::find($id)->delete();
        return back()->with('success', 'Service deleted Successfully');
    }



    public function hotels(Request $request)
    {
        $data = Hotel::all();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('status', function ($data) {
                    //                    dd($riders);
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {

                    $actions = '<div class="btn-group-sm" role="group" aria-label="Basic example">
                    <a href="' . route('edit.hotel', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                    <button class="btn btn-outline-danger btn-sm delete-hotel" data-id="' . $data->id . '">Delete</button>

                                            </div>';
                    return $actions;
                })
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }
        return view('hotels.index');
    }

    public function addHotel(Request $request)
    {
        return view('hotels.edit');
    }

    public function insertHotel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->status = $request->status;
        $hotel->save();

        return redirect()->route('hotels')->with('success', 'Hotel Added Successfully');
    }

    public function editHotel($id)
    {
        $hotel = Hotel::find($id);
        return view('hotels.edit', compact('hotel'));
    }

    public function updateHotel($id, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->has('status') && $request->status == 'on') {
            $request['status'] = 1;
        } else {
            $request['status'] = 0;
        }

        $hotel = Hotel::find($id);
        $hotel->name = $request->name;
        $hotel->description = $request->description;
        $hotel->status = $request->status;
        $hotel->save();

        return redirect()->route('hotels')->with('success', 'Hotel Updated Successfully');
    }

    public function deleteHotel($id)
    {
        Hotel::find($id)->delete();
        return back()->with('success', 'Hotel deleted Successfully');
    }


    public function hotelfacilityIndex(Request $request)
    {
        $data = HotelFacility::with('hotel')->orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('image', function ($data) {
                    $imageUrl = asset( $data->image); // Adjust the path accordingly
                    return '<img src="' . $imageUrl . '" alt="Image" class="img-thumbnail" width="50" height="50">';
                })
                ->addColumn('hotel', function ($data) {
                    $hotel = $data->hotel->name;
                    return $hotel;
                })
                ->addColumn('status', function ($data) {
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class=" btn-group-sm" role="group" aria-label="Basic example">
                    <a  href="' . route('edit.hotelfacility', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <button class="btn btn-outline-danger btn-sm delete-hotelfacility" data-id="' . $data->id . '">Delete</button>

                    </div>';
                    return $actions;
                })
                ->rawColumns(['image','hotel', 'status', 'actions'])
                ->make(true);
        }
        return view('hotelfacility.index');
    }
    public function addhotelFacility()
    {
        $hotels = Hotel::where('status', 1)->get();
        return view('hotelfacility.edit', compact('hotels'));
    }
    public function storehotelFacility(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
//            'hotel_id' => 'required',
            'image' => 'image|mimes:jpeg,png,svg,jpg,gif|max:2048'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $hotelfacility = new HotelFacility();
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'facility_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $hotelfacility->image;
        }
        $hotelfacility->image = $image;
        $hotelfacility->name = $request->name;
        $hotelfacility->hotel_id = $request->hotel_id;
        $hotelfacility->description = $request->description;
        if (!empty($request->status) && $request->status == 'on') {
            $hotelfacility->status = 1;
        } else {
            $hotelfacility->status = 0;
        }

        $hotelfacility->save();

        return redirect()->route('hotelfacility.index')->with('success', 'Hotel Facility saved successfully.');
    }
    public function edithotelFacility($id)
    {
        $hotelfacility = HotelFacility::find($id);
        $hotels = Hotel::where('status', 1)->get();
        return view('hotelfacility.edit', compact('hotelfacility', 'hotels'));
    }
    public function updatehotelFacility(Request $request, $id)
    {
        $hotelfacility = HotelFacility::find($id);
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'facility_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $hotelfacility->image;
        }
        $hotelfacility->image = $image;
        $hotelfacility->name = $request->name;
        $hotelfacility->hotel_id = $request->hotel_id;
        $hotelfacility->description = $request->description;

        if ($request->status == 'on') {
            $hotelfacility->status = 1;
        } else {
            $hotelfacility->status = 0;
        }
        $hotelfacility->save();

        return redirect()->route('hotelfacility.index')->with('success', 'Hotel Facility updated successfully.');
    }
    public function deletehotelFacility($id)
    {
        HotelFacility::find($id)->delete();
        return back()->with('success', 'Hotel Facility deleted Successfully');
    }



    public function contactForms(Request $request)
    {
        $data = Contact::all();

        if ($request->ajax()) {
            return DataTables::of($data)

                ->addColumn('email', function ($data) {
                    $email = $data->email;
                    return $email;
                })
                ->addColumn('phone_number', function ($data) {
                    $phoneNumber = $data->country_code . '-' . $data->phone_number;
                    return $phoneNumber;
                })

                ->rawColumns(['email','phone_number'])
                ->make(true);
        }
        return view('contact.index');
    }


    public function customerreviewIndex(Request $request)
    {
        $data = CustomerReview::orderBy('created_at', 'desc')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('image', function ($data) {
                    $imageUrl = asset( $data->image); // Adjust the path accordingly
                    return '<img src="' . $imageUrl . '" alt="Image" class="img-thumbnail" width="50" height="50">';
                })
                ->addColumn('status', function ($data) {
                    $status = '<span class="badge badge-pill badge-soft-danger font-size-11">InActive</span>';
                    if ($data->status == 1) {
                        $status = '<span class="badge badge-pill badge-soft-success font-size-11">Active</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    $actions = '<div class=" btn-group-sm" role="group" aria-label="Basic example">
                    <a  href="' . route('edit.customerreview', $data->id) . '" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <button class="btn btn-outline-danger btn-sm delete-customerreview" data-id="' . $data->id . '">Delete</button>

                    </div>';

                    return $actions;
                })
                ->rawColumns(['image', 'status', 'actions'])
                ->make(true);
        }
        return view('customerreview.index');
    }
    public function addcustomerReview()
    {
        return view('customerreview.edit');
    }
    public function storecustomerReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'image' => 'image|mimes:jpeg,png,svg,jpg,gif|max:2048'

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customerreview = new CustomerReview();
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'customer_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $customerreview->image;
        }
        $customerreview->image = $image;
        $customerreview->name = $request->name;
        $customerreview->company_name = $request->company_name;
        $customerreview->review = $request->review;
        if (!empty($request->status) && $request->status == 'on') {
            $customerreview->status = 1;
        } else {
            $customerreview->status = 0;
        }

        $customerreview->save();

        return redirect()->route('customerreview.index')->with('success', 'Customer Review saved successfully.');
    }
    public function editcustomerReview($id)
    {
        $customerreview = CustomerReview::find($id);

        return view('customerreview.edit', compact('customerreview'));
    }
    public function updatecustomerReview(Request $request, $id)
    {
        $customerreview = CustomerReview::find($id);
        $uploadedFiles = [];
        $image = '';

        if ($request->hasFile('image')) {
            $uploadedFiles['image'] = $request->file('image');
            $uploadedFiles = GlobalHelper::uploadAndSaveFile($uploadedFiles, 'customer_images');

            $image = $uploadedFiles['image'] ?? null;
        } elseif (!empty($id)) {
            $image = $customerreview->image;
        }
        $customerreview->image = $image;
        $customerreview->name = $request->name;
        $customerreview->company_name = $request->company_name;
        $customerreview->review = $request->review;

        if ($request->status == 'on') {
            $customerreview->status = 1;
        } else {
            $customerreview->status = 0;
        }
        $customerreview->save();

        return redirect()->route('customerreview.index')->with('success', 'Customer Review updated successfully.');
    }
    public function deletecustomerReview($id)
    {
        CustomerReview::find($id)->delete();
        return back()->with('success', 'Customer Review deleted Successfully');
    }
}
