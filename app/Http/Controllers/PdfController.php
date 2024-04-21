<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Objective;
use App\Models\Work;
use Auth;
use Inertia\Inertia;
use PDF;
use Faker\Factory as Faker;

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
        
        // Apply dummy data if actual data is not available
        $data = $this->dummyData($data);
        return Inertia::render('CvBuilder/Resume', compact('data'));
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
        
        // Apply dummy data if actual data is not available
        $data = $this->dummyData($data);
        
        // Set paper size and orientation
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('pdf.index', compact('data'))
                ->setPaper('a4', 'portrait'); // Set A4 size and portrait orientation
        return $pdf->download('myresume.pdf');
    }
    public function dummyData($data){
        $faker = Faker::create();
        if(!$data['basicInfo']){
            $data['basicInfo'] = new BasicInfo();
            $data['basicInfo']->first_name = $faker->firstName;
            $data['basicInfo']->last_name = $faker->lastName;
            $data['basicInfo']->profession = $faker->jobTitle;
            $data['basicInfo']->post_code = $faker->postcode;
            $data['basicInfo']->address = $faker->address;
            $data['basicInfo']->division = $faker->state;
            $data['basicInfo']->email = $faker->email;
            $data['basicInfo']->website = $faker->url;
            $data['basicInfo']->phone = $faker->phoneNumber;
        }
        if(!$data['objective']){
            $data['objective'] = new Objective();
            $data['objective']->career_object = $faker->sentence;
        }
        if($data['educations']->isEmpty()){
            $education = new Education();
            $education->degree = $faker->sentence;
            $education->institute = $faker->company;
            $education->year = $faker->year;

            $data['educations'][] = $education;
        }
        if($data['works']->isEmpty()){
            for ($i = 0; $i < 3; $i++) {
                $work = new Work();
                $work->company_name = $faker->company;
                $work->position = $faker->jobTitle;
                $work->year = $faker->year;

                $data['works'][] = $work;
            }
        }
        
        if($data['certificates']->isEmpty()){
            $certificate = new Certificate();
            $certificate->certificate_name = $faker->sentence;
            $certificate->about = $faker->sentence;
            $certificate->year = $faker->year;
            
            $data['certificates'][] = $certificate;
        }
    
        return $data;
    }
}
