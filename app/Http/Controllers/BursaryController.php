<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Classes\SendSms;
use App\Models\ChiefsReview;
use Illuminate\Http\Request;
use App\Models\StudentParents;
use App\Models\CommitteeReview;
use App\Models\BursaryApplications;
use App\Models\StudentApplications;

class BursaryController extends Controller
{
    //
    //
    
    public function reviewed_applications()
    {
        $data = StudentApplications::whereHas('committeeReviews')->get();
 
        return view('backoffice.applications.reviewed', compact('data'));
    }

     
    public function released_applications()
    {
        $data = StudentApplications::whereHas('cheques')->get();
 
        return view('backoffice.applications.released', compact('data'));
    }

    public function application_view($id){
        $application = StudentApplications::find($id);
        // $parent = StudentParents::where('application_id', $application->id)->first();
        return view('backoffice.applications.view', compact('application', ));
    }
    public function assign_cheque($id){
        $cheques =  Cheque::all();
        $application = StudentApplications::find($id);
        $student = $application->student;

        return view('backoffice.applications.assign-cheque', compact('application', 'student', 'cheques'));
    }
    public function unreviewed_applications()
    {
        $data = StudentApplications::whereDoesntHave('committeeReviews')->get(); 
    
        return view('backoffice.applications.unreviewed', compact('data'));

    }

    public function storeCheque(Request $request)
    {
     
        $request->validate([
            'cheque_number' => 'required|string',
            'release_date' => 'required|date',
            'status' => 'required|in:released,pending,declined',
            'contact_person' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'remark' => 'nullable|string',
            'application_id' => 'required|exists:student_applications,id',
        ]);

        $application = StudentApplications::find($request->input('application_id'));
        $application->status = $request->input('status');
        $application->save();
      
        if($application->student->user->phone_number){
            $phoneNumber = $application->student->user->phone_number;   
            if (substr($phoneNumber, 0, 1) === '0') {
                $phoneNumber = '254' . substr($phoneNumber, 1);
            }
            $name = $request->name;
            $responseStatusCodes =[];
            $sendSms = new SendSms();
            $message = "Hello ".$application->student->user->first_name.", your cheque of Ksh". $request->amount." has been disbursed. Contact ".$request->contact_person." for more information. LAIKIPIA CDF";

            $statusCode = $sendSms->sendSms($phoneNumber, $message);
    

        }

        if ( $reason !== 'success') {
            return back()->with('error', 'SMS was not sent');
        }
        

       
        Cheque::create([
            'cheque_number' => $request->input('cheque_number'),
            'release_date' => $request->input('release_date'),
            'status' => $request->input('status'),
            'contact_person' => $request->input('contact_person'),
            'amount' => $request->input('amount'),
            'remark' => $request->input('remark'),
            'application_id' => $request->input('application_id'),
        ]);

        $students = StudentApplications::where('id', $request->input('application_id'))->get();
        foreach ($students as $student) {
            $student->status = 'Cheque released';
            $student->save();
        }

        return redirect()->back()->with('success', 'Cheque information stored successfully!');
        }


        public function index()
        {
            $data = BursaryApplications::get();
            return view('backoffice.bursaries.index', compact('data'));
        }

        public function application_review($id){
            $application = StudentApplications::find($id);
            $student = $application->student;
            // $parent = StudentParents::where('application_id', $application->id)->first();
            return view('backoffice.bursaries.review', compact('application', 'student'));
        }
        public function store_review(Request $request)
        {
            
           
        $request->validate([
            'dully_filled_and_signed' => 'required|',
            'supportive_documents_attached' => 'required|',
            'approval' => 'required|',
            'percentage' => 'required|integer|min:0|max:100',
            'remark' => 'nullable|string',
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
            $message = "Hello ".$application->student->user->first_name.", your  bursary application has been reviewed by the Laikipia CDF committe and has been ".$request->approval. " for Bursary allocation.LAIKIPIA CDF";

            $statusCode = $sendSms->sendSms($phoneNumber, $message);
    
        }
        


        CommitteeReview::create($request->all());

        return redirect()->back()->with('success', 'Committe review has been submitted successfully.');
    }

    
    public function create()
    {
        return view('backoffice.bursaries.create');
    }

    public function store(Request $request)
    {
        $obj = new BursaryApplications();
        $obj->name = $request->name;
        $obj->status = $request->status;
        $obj->deadline = $request->deadline;

        $obj->save();
        $obj->slug = sprintf("%04d",$obj->id)."-".str_replace(' ', '-', $request->name);

        $obj->save();
        return back()->with('success', 'Bursary Added Successfully');
    }

    public function show($id)
    {
        $data = BursaryApplications::find($id);
        return view('backoffice.bursaries.view', compact('data'));
    }
}
