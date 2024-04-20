<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasicInfoRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\BasicInfo;
use Inertia\Inertia;

class BasicInfoController extends Controller
{
    public function create(){
        $basicInfo = BasicInfo::where('user_id', Auth::id())->first();
        return Inertia::render('CvBuilder/BasicInfo', compact('basicInfo'));
    }

    public function store(BasicInfoRequest $request)
    {
        $basicInfo = BasicInfo::where('user_id', Auth::id())->firstOrNew();
        
        $basicInfo->fill($request->validated());
        $basicInfo->user_id = Auth::id();

        if ($basicInfo->save()) {
            return redirect()->route('education.index')->with('success', 'Info saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Error on saving record!');
        }
    }
}
