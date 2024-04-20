<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\Work;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkController extends Controller
{
    //
    public function create(){
        return Inertia::render('CvBuilder/Work');
    }

    public function store(WorkRequest $request)
    {
        $edu = new Work();
        
        $edu->fill($request->validated());
        $edu->user_id = Auth::id();
        if($edu->save()){
            return redirect()->route('certificate.create')->with('success', 'Work history saved successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on saving record!');
        }
    }
}
