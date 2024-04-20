<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjectiveRequest;
use App\Models\Objective;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ObjectiveController extends Controller
{
    public function create(){
        $objective = Objective::where('user_id', Auth::id())->first();
        return Inertia::render('CvBuilder/Objective', compact('objective'));
    }

    public function store(ObjectiveRequest $request)
    {
        $objective = Objective::where('user_id', Auth::id())->firstOrNew();
        
        $objective->fill($request->validated());
        $objective->user_id = Auth::id();

        if ($objective->save()) {
            return redirect()->route('pdf_index')->with('success', 'Objective saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Error on saving record!');
        }
    }
}
