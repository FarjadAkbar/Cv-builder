<?php

namespace App\Http\Controllers;

use App\Http\Requests\EducationRequest;
use App\Models\Education;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EducationController extends Controller
{
    //
    public function index()
    {        
        $education = Education::where('user_id', Auth::id())->get();
        return Inertia::render('CvBuilder/Education/Index', compact('education'));
    }

    public function create(){
        return Inertia::render('CvBuilder/Education/Create');
    }

    public function store(EducationRequest $request)
    {
        $edu = new Education();
        
        $edu->fill($request->validated());
        $edu->user_id = Auth::id();
        if($edu->save()){
            return redirect()->route('education.index')->with('success', 'Education saved successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on saving record!');
        }
    }

    public function edit($id)
    {
        $education = Education::find($id);
        return Inertia::render('CvBuilder/Education/Edit', compact('education'));
    }

    public function update(EducationRequest $request, $id)
    {
        $edu = Education::find($id);
        $edu->fill($request->validated());
        if($edu->save()){
            return redirect()->route('education.index')->with('success', 'Education updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on updating record!');
        }
    }

    public function destroy($id)
    {
        $edu = Education::find($id);
        if($edu->delete()){
            return redirect()->route('education.index')->with('success', 'Education deleted successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on deleting record!');
        }
    }
}
