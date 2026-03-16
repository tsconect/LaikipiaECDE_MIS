<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ward;
use App\Models\Chief;
use App\Models\County;
use App\Classes\SendSms;
use App\Models\Location;
use App\Models\SubCounty;
use App\Models\ChiefsReview;
use Illuminate\Http\Request;
use App\Models\StudentDetails;
use App\Models\StudentParents;
use App\Models\BursaryApplications;
use App\Models\StudentApplications;
use Illuminate\Support\Facades\Hash;

class ChiefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('chief.dashboard');
    }
    public function bursary_applications(){
        $data = BursaryApplications::get();
        return view('chief.bursaries.index', compact('data'));
    }
    public function students(){
        $data = StudentDetails::all();
        return view ('chief.students.index', compact('data'));
    }
    public function show_bursary($id)
    {

        $chiefLocationId = auth()->user()->chief->location_id;

        $data = BursaryApplications::whereHas('studentApplications', function ($query) use ($chiefLocationId) {
            $query->whereHas('student', function ($subQuery) use ($chiefLocationId) {
                $subQuery->where('location_id', $chiefLocationId);
            });
        })->find($id);

        return view('chief.bursaries.view', compact('data'));
    }
    
    public function application_review($id)
    {
        $application = StudentApplications::find($id);
        $student = $application->student;
        return view('chief.bursaries.review', compact('application', 'student'));
    }

    public function reviewed_applications()
    {
 
        $data = StudentApplications::whereHas('chiefsReviews')->get();
      
        return view('chief.applications.reviewed', compact('data'));
    }

    public function application_view($id){
        $application = StudentApplications::find($id);
        $student = $application->student;
        return view('chief.applications.view', compact('application', 'student'));
    }
    public function unreviewed_applications()
    {
        $data = StudentApplications::whereDoesntHave('chiefsReviews')->get();
     
        return view('chief.applications.unreviewed', compact('data'));

    }

    public function store_review(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'status' => 'required|in:recommended,not_recommended',
            'percentage' => 'required|integer|min:0|max:100',
            'remark' => 'nullable|string',
            'chiefs_id' => 'required|exists:chiefs,id',
            'application_id' => 'required|exists:student_applications,id',
        ]);

        $application = StudentApplications::find($request->input('application_id'));
        if($application->student->user->phone_number){
            $phoneNumber = $application->student->user->phone_number;   
            if (substr($phoneNumber, 0, 1) === '0') {
                $phoneNumber = '254' . substr($phoneNumber, 1);
            }
            $name = $request->name;
            $responseStatusCodes =[];
            $sendSms = new SendSms();
            $message = "Hello ".$application->student->user->first_name.", your  bursary application has been reviewed by the chief and  ".$request->status." for Bursary allocation. LAIKIPIA CDF";

            $statusCode = $sendSms->sendSms($phoneNumber, $message);
        
     

        }


        $chiefsReview = ChiefsReview::create($request->all());

        return redirect()->back()->with('success', 'Review has been submitted successfully.');
    }


    public function index()
    {
        $data = Chief::all();
        return view('backoffice.chiefs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counties = County::all();
        $subCounties = SubCounty::all();
        $wards = Ward::all(); 
        $locations = Location::all();
        return view('backoffice.chiefs.create', compact('counties', 'subCounties', 'wards', 'locations'));
    }

    public function student_view($id){
        $student = StudentDetails::find($id);
        return view('chief.students.view', compact('student'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|max:255',
            'password' => 'required|confirmed|',
            'location_id' => 'required|max:255',
        ]);
        

        // Begin transaction
        \DB::beginTransaction();
        try {
            // Store user details
            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'role' => 'chief',
                'middle_name' => 'CHIEF', 
                'password' => Hash::make($validatedData['password']),
                'phone_number' => $validatedData['phone_number'],
            ]);

            // Store chief details
            $chief = new Chief();
            $chief->location_id = $validatedData['location_id'];
            $chief->status = 'active';
            $chief->user_id = $user->id;
            $chief->save();

            // Commit transaction
            \DB::commit();

            // Redirect with success message
            return redirect()->back()->with('success', 'Chief created successfully.');
        } catch (\Exception $e) {

            \DB::rollback();
            return redirect()->back()->with('error', 'Failed to create chief.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
