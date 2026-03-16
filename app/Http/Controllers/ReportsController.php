<?php

namespace App\Http\Controllers;

use PDF;

use App\Models\Chief;
use App\Models\Cheque;
use App\Classes\SendSms;
use App\Models\Location;
use App\Exports\UsersExport;
use App\Models\ChiefsReview;
use Illuminate\Http\Request;
use App\Models\SchoolDetails;
use App\Models\StudentDetails;
use App\Models\StudentParents;
use App\Models\CommitteeReview;
use App\Models\BursaryApplications;
use App\Models\StudentApplications;
use Maatwebsite\Excel\Facades\Excel;


class ReportsController extends Controller
{
    public function index()
    {

        $data = BursaryApplications::get();
        return view('backoffice.reports.index', compact('data'));
    }

    public function approved_bursary_reports(Request $request)
    {

        $query = StudentApplications::query();

               
        $wards = StudentDetails::distinct()->pluck('ward')->filter()->sort()->all();



            

        $query->where('status', 'Cheque released');
    
        // Filter by ward if a ward is provided
        if ($request->has('ward') && !is_null($request->ward)) {
            $query->whereHas('student', function ($query) use ($request) {
                $query->where('ward', $request->ward);
            });
        }
        
        if ($request->has('educational_level') && !is_null($request->educational_level)) {
            $query->whereHas('schoolDetails', function ($query) use ($request) {
                $query->where('level_of_study', $request->educational_level);
            });
        }
    
        $data = $query->get();
        
        return view('backoffice.reports.approved', compact('data', 'wards', 'request'));
    }


    public function approved_bursary_pdf(Request $request)
    {

        $query = StudentApplications::where('status', 'Cheque released');

        if ($request->has('ward') && !is_null($request->ward)) {
            $query->whereHas('student', function ($query) use ($request) {
                $query->where('ward', $request->ward);
            });
        }

        if ($request->has('educational_level') && !is_null($request->educational_level)) {
            $query->whereHas('schoolDetails', function ($query) use ($request) {
                $query->where('level_of_study', $request->educational_level);
            });
        }

        $data = $query->get();




     
        $pdf = PDF::loadView('backoffice.reports.approved_pdf',compact('data'));

        // return $pdf->download('Approved Bursary Report - ' . date('Y-m-d') . '.pdf');
        
        return view('backoffice.reports.approved_pdf', compact('data'));
    }

    public function approved_bursary_excel(Request $request)
    {
        $query = StudentApplications::where('status', 'Cheque released');

        if ($request->has('ward') && !is_null($request->ward)) {
            $query->whereHas('student', function ($query) use ($request) {
                $query->where('ward', $request->ward);
            });
        }

        if ($request->has('educational_level') && !is_null($request->educational_level)) {
            $query->whereHas('schoolDetails', function ($query) use ($request) {
                $query->where('level_of_study', $request->educational_level);
            });
        }

        $data = $query->get();

        $exportData = [];
        foreach ($data as $item) {
            $location = Location::where('id', $item->student->location)->first();
            $exportData[] = [
                $item->student->user->first_name ?? 'null' . ' ' . $item->student->user->last_name ?? 'null',
                $item->schoolDetails->school_name ?? 'Blank',
                $location->name??'NULL',
                $item->student->ward,
                $item->student->sub_county,
                $item->cheques->amount ?? "Pending Allocation"
            ];
        }
        $exportData = array_merge([
            ['Name', 'Institution', 'Location', 'Ward', 'Sub County', 'Amount']
        ], $exportData);

        $date = date('Y-m-d');
        $filename = 'Approved Bursary Report - ' . $date . '.csv';

        return Excel::download(new UsersExport($exportData), $filename);
    }

    public function pending_bursary_reports( Request $request)
    {
        $query = StudentApplications::query();

               
        $wards = StudentDetails::distinct()->pluck('ward')->filter()->sort()->all();



            

        $query->where('status', 'pending');
    
        // Filter by ward if a ward is provided
        if ($request->has('ward') && !is_null($request->ward)) {
            $query->whereHas('student', function ($query) use ($request) {
                $query->where('ward', $request->ward);
            });
        }
        
        if ($request->has('educational_level') && !is_null($request->educational_level)) {
            $query->whereHas('schoolDetails', function ($query) use ($request) {
                $query->where('level_of_study', $request->educational_level);
            });
        }
    
        $data = $query->get();


        
        return view('backoffice.reports.pending', compact('data', 'wards', 'request'));
    }


    public function pending_bursary_pdf( Request $request)
    {
        $query = StudentApplications::where('status', 'pending');

        if ($request->has('ward') && !is_null($request->ward)) {
            $query->whereHas('student', function ($query) use ($request) {
                $query->where('ward', $request->ward);
            });
        }

        if ($request->has('educational_level') && !is_null($request->educational_level)) {
            $query->whereHas('schoolDetails', function ($query) use ($request) {
                $query->where('level_of_study', $request->educational_level);
            });
        }

        $data = $query->get();



        $data = StudentApplications::where('status', 'pending')->get();

     
        $pdf = PDF::loadView('backoffice.reports.pending_pdf',compact('data'));

        // return $pdf->download('Approved Bursary Report - ' . date('Y-m-d') . '.pdf');
        
        return view('backoffice.reports.pending_pdf', compact('data'));
    }

    public function pending_bursary_excel(Request $request)
    {

        $query = StudentApplications::where('status', 'pending');

        if ($request->has('ward') && !is_null($request->ward)) {
            $query->whereHas('student', function ($query) use ($request) {
                $query->where('ward', $request->ward);
            });
        }

        if ($request->has('educational_level') && !is_null($request->educational_level)) {
            $query->whereHas('schoolDetails', function ($query) use ($request) {
                $query->where('level_of_study', $request->educational_level);
            });
        }

        $data = $query->get();

        $exportData = [];
        foreach ($data as $item) {
            $location = Location::where('id', $item->student->location)->first();
            $exportData[] = [
                $item->student->user->first_name ?? 'null' . ' ' . $item->student->user->last_name ?? 'null',
                $item->schoolDetails->school_name ?? 'Blank',
                $location->name??'NULL',
                $item->student->ward,
                $item->student->sub_county,
                $item->cheques->amount ?? "Pending Allocation"
            ];
        }
        $exportData = array_merge([
            ['Name', 'Institution', 'Location', 'Ward', 'Sub County', 'Amount']
        ], $exportData);

        $date = date('Y-m-d');
        $filename = 'Pending Bursary Applications Report - ' . $date . '.csv';

        return Excel::download(new UsersExport($exportData), $filename);

       
    }

    public function rejected_bursary_reports(Request $request)
    {
        $query = StudentApplications::query();

               
        $wards = StudentDetails::distinct()->pluck('ward')->filter()->sort()->all();
        $query->where('status', 'rejected');
    
        // Filter by ward if a ward is provided
        if ($request->has('ward') && !is_null($request->ward)) {
            $query->whereHas('student', function ($query) use ($request) {
                $query->where('ward', $request->ward);
            });
        }
        
        if ($request->has('educational_level') && !is_null($request->educational_level)) {
            $query->whereHas('schoolDetails', function ($query) use ($request) {
                $query->where('level_of_study', $request->educational_level);
            });
        }
    
        $data = $query->get();


        
   
        return view('backoffice.reports.rejected',  compact('data', 'wards', 'request'));
    }


    public function rejected_bursary_pdf( Request $request)
    {
        $query = StudentApplications::where('status', 'rejected');

        if ($request->has('ward') && !is_null($request->ward)) {
            $query->whereHas('student', function ($query) use ($request) {
                $query->where('ward', $request->ward);
            });
        }

        if ($request->has('educational_level') && !is_null($request->educational_level)) {
            $query->whereHas('schoolDetails', function ($query) use ($request) {
                $query->where('level_of_study', $request->educational_level);
            });
        }

        $data = $query->get();



    

     
        $pdf = PDF::loadView('backoffice.reports.approved_pdf',compact('data'));

        // return $pdf->download('Rejected Bursary Report - ' . date('Y-m-d') . '.pdf');
        
        return view('backoffice.reports.rejected_pdf', compact('data'));
    }

    public function rejected_bursary_excel(Request $request)
    {

        $query = StudentApplications::where('status', 'rejected');

        if ($request->has('ward') && !is_null($request->ward)) {
            $query->whereHas('student', function ($query) use ($request) {
                $query->where('ward', $request->ward);
            });
        }

        if ($request->has('educational_level') && !is_null($request->educational_level)) {
            $query->whereHas('schoolDetails', function ($query) use ($request) {
                $query->where('level_of_study', $request->educational_level);
            });
        }

        $data = $query->get();

        $exportData = [];
        foreach ($data as $item) {
            $location = Location::where('id', $item->student->location)->first();
            $exportData[] = [
                $item->student->user->first_name ?? 'null' . ' ' . $item->student->user->last_name ?? 'null',
                $item->schoolDetails->school_name ?? 'Blank',
                $location->name??'NULL',
                $item->student->ward,
                $item->student->sub_county,
                $item->cheques->amount ?? "Pending Allocation"
            ];
        }
        $exportData = array_merge([
            ['Name', 'Institution', 'Location', 'Ward', 'Sub County', 'Amount']
        ], $exportData);

        $date = date('Y-m-d');
        $filename = 'Rejected Bursary Applications Report - ' . $date . '.csv';

        return Excel::download(new UsersExport($exportData), $filename);
        
    
    }



    public function bursary_reports($id)
    {
        $data = BursaryApplications::find($id);

        $all_data = BursaryApplications::with( 'studentApplications.student')->get();

        $levelCounts = $all_data->pluck('studentApplications')
        ->flatten()
        ->pluck('schoolDetails.level_of_study')
        ->countBy();


        $ward_counts = $all_data->pluck('studentApplications')
            ->flatten()
            ->pluck('student.ward')
            ->countBy();
        $wardCountArray = $ward_counts->toArray();

        $cheques = Cheque::all();

        $rejected_applications = StudentApplications::where('status', 'rejected')->get();
        $approved_applications = StudentApplications::where('status', 'Cheque released')->get();
        $pending_applications = StudentApplications::where('status', 'pending')->get();
        $all_applications = StudentApplications::all();
   

        $levelCountsArray = $levelCounts->toArray();

        return view('backoffice.reports.view', compact('data', 'levelCountsArray', 'wardCountArray', 'cheques', 'rejected_applications', 'approved_applications', 'pending_applications', 'all_applications'));
    }

    public function chief_rejected_reports()
    {
        $data = StudentApplications::whereHas('chiefsReviews', function ($query) {
            $query->where('status', 'not_recommended');
        })->get();

        
        return view('backoffice.reports.other-reports.chief_rejected', compact('data'));
    }
    public function chief_rejected_bursary_pdf()
    {
        $data = StudentApplications::whereHas('chiefsReviews', function ($query) {
            $query->where('status', 'not_recommended');
        })->get();

        $pdf = PDF::loadView('backoffice.reports.other-reports.chief_rejected_pdf',compact('data'));

        return view('backoffice.reports.other-reports.chief_rejected_pdf', compact('data'));
      
    

        // return $pdf->download('Chief Rejected Bursary Report - ' . date('Y-m-d') . '.pdf');
        
    }

    public function cdf_rejected_reports()
    {
        $data = StudentApplications::whereHas('committeeReviews', function ($query) {
            $query->where('approval', 'declined');
        })->get();
    

        
        return view('backoffice.reports.other-reports.cdf_rejected', compact('data'));
    }
    public function cdf_rejected_bursary_pdf()
    {
        $data = StudentApplications::whereHas('committeeReviews', function ($query) {
            $query->where('approval', 'declined');
        })->get();

        $pdf = PDF::loadView('backoffice.reports.other-reports.cdf_rejected_pdf',compact('data'));

        return view('backoffice.reports.other-reports.cdf_rejected_pdf', compact('data'));
    

        // return $pdf->download('CDF Rejected Bursary Report - ' . date('Y-m-d') . '.pdf');
        
    }

    public function all_students_reports()
    {
        $data = StudentDetails::all();
        
        return view('backoffice.reports.other-reports.all_students', compact('data'));
    }
    public function registered_students_pdf()
    {
        $data = StudentDetails::all();

        $pdf = PDF::loadView('backoffice.reports.other-reports.all_students_pdf',compact('data'));

     
        return view('backoffice.reports.other-reports.all_students_pdf', compact('data'));

        

        // return $pdf->download('Registered Students Report - ' . date('Y-m-d') . '.pdf');
        
    }

    public function all_chiefs_reports()
    {
        $data = Chief::all();
        
        return view('backoffice.reports.other-reports.all_chiefs', compact('data'));
    }

    public function registered_chiefs_pdf()
    {
        $data = Chief::all();

     
        $pdf = PDF::loadView('backoffice.reports.other-reports.all_chiefs_pdf',compact('data'));

        // return $pdf->download('Regestered Chiefs Report - ' . date('Y-m-d') . '.pdf');
        
        return view('backoffice.reports.other-reports.all_chiefs_pdf', compact('data'));
    }

    public function registered_chiefs_excel(Request $request)
    {

        $data = [];
        array_push($data, [
            'Laikipia CDF',
                 " Registered Chiefs Report" ,
               'Date: ' 
        ]);

        array_push($data, [
            'Name',
            'Phone',
            'Location',
            'Ward',
            'Sub County',
        ]);

        foreach(Chief::all() as $item) {
            array_push($data, [
                $item->user->first_name??"null" . ' ' . $item->user->last_name??'null',
                $item->phone,
                $item->location,
                $item->ward,
                $item->sub_county,
            ]);
        }
        $date = date('Y-m-d');

        return Excel::download(new UsersExport($data), 'Registered Chiefs Report' . ' : ' . $date.'.csv');



    
    }

    



    
}
