<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Objective;
use App\Models\Work;
use Auth;
use PDF;

class PdfController extends Controller
{
    public function index(){
        $usrId = Auth::user()->id;
        $data= array();

        $data['basicInfo'] = BasicInfo::where('user_id', $usrId)->first();
        $data['objective'] = Objective::where('user_id', $usrId)->first();
        $data['educations'] = Education::where('user_id', $usrId)->get();
        $data['works'] = Work::where('user_id', $usrId)->get();
        $data['certificates'] = Certificate::where('user_id', $usrId)->get();
        return view('pdf.index', compact('data'));
    }

    public function download()
    {
        $usrId = Auth::user()->id;
        $data= array();

        $data['basicInfo'] = BasicInfo::where('user_id', $usrId)->first();
        $data['objective'] = Objective::where('user_id', $usrId)->first();
        $data['educations'] = Education::where('user_id', $usrId)->get();
        $data['works'] = Work::where('user_id', $usrId)->get();
        $data['certificates'] = Certificate::where('user_id', $usrId)->get();
        
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('pdf.index',compact('data'));
        return $pdf->download('myresume.pdf');
    }
}
