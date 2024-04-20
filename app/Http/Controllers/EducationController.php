<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EducationController extends Controller
{
    //
    public function create(){
        return Inertia::render('CvBuilder/Education');
    }

    public function store(EducationRequest $request)
    {
        $edu = new Education();
        
        $edu->fill($request->validated());
        $edu->user_id = Auth::id();
        if($edu->save()){
            return redirect()->route('work.create')->with('success', 'Education saved successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on saving record!');
        }
    }
}
