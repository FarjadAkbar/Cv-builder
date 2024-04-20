<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\Work;
use Auth;
use Inertia\Inertia;

class WorkController extends Controller
{
    //
    public function index()
    {        
        $work = Work::where('user_id', Auth::id())->get();
        return Inertia::render('CvBuilder/Work/Index', compact('work'));
    }

    public function create(){
        return Inertia::render('CvBuilder/Work/Create');
    }

    public function store(WorkRequest $request)
    {
        $wrk = new Work();
        
        $wrk->fill($request->validated());
        $wrk->user_id = Auth::id();
        if($wrk->save()){
            return redirect()->route('work.index')->with('success', 'Work saved successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on saving record!');
        }
    }

    public function edit($id)
    {
        $work = Work::find($id);
        return Inertia::render('CvBuilder/Work/Edit', compact('work'));
    }

    public function update(WorkRequest $request, $id)
    {
        $wrk = Work::find($id);
        $wrk->fill($request->validated());
        if($wrk->save()){
            return redirect()->route('work.index')->with('success', 'Work updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on updating record!');
        }
    }

    public function destroy($id)
    {
        $wrk = Work::find($id);
        if($wrk->delete()){
            return redirect()->route('work.index')->with('success', 'Work deleted successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on deleting record!');
        }
    }
}
