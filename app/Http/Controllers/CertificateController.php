<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use Auth;
use Inertia\Inertia;

class CertificateController extends Controller
{
    //
    public function index()
    {        
        $certificate = Certificate::where('user_id', Auth::id())->get();
        return Inertia::render('CvBuilder/Certificate/Index', compact('certificate'));
    }

    public function create(){
        return Inertia::render('CvBuilder/Certificate/Create');
    }

    public function store(CertificateRequest $request)
    {
        $cert = new Certificate();
        
        $cert->fill($request->validated());
        $cert->user_id = Auth::id();
        if($cert->save()){
            return redirect()->route('certificate.index')->with('success', 'Certificate saved successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on saving record!');
        }
    }

    public function edit($id)
    {
        $certificate = Certificate::find($id);
        return Inertia::render('CvBuilder/Certificate/Edit', compact('certificate'));
    }

    public function update(CertificateRequest $request, $id)
    {
        $cert = Certificate::find($id);
        $cert->fill($request->validated());
        if($cert->save()){
            return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on updating record!');
        }
    }

    public function destroy($id)
    {
        $cert = Certificate::find($id);
        if($cert->delete()){
            return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully!');
        }else{
            return redirect()->back()->with('error', 'Error on deleting record!');
        }
    }
}
