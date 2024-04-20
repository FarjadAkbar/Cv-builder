<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CertificateController extends Controller
{
    //
    public function create(){
        return Inertia::render('CvBuilder/Certificate');
    }

    public function store(CertificateRequest $request)
    {
        $edu = new Certificate();
        
        $edu->fill($request->validated());
        $edu->user_id = Auth::id();
        if($edu->save()){
            return redirect()->route('work.create')->with('success', 'Education saved successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on saving record!');
        }
    }
}
