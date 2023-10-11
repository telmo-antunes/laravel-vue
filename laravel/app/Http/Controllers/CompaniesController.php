<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public function index() {
        $companies = Company::all();

        return view('companies.index', ['companies' => $companies]);
    }

    public function create() {
        return view('companies.create');
    }

    public function store(Request $request) {
        //dd($request);
        

        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'file|image',
        ]);

        
        if($request->file()) {
            $company = new Company;
            $fileName = $request->logo->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');
            $company->logo = $filePath;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        return redirect(route('companies.index'));
    }

    public function edit(Company $company) {
        return view('companies.edit', ['company'=>$company]);
    }

    public function update(Company $company, Request $request) {
        //dd($request);

        $request->validate([
            'name' => 'required',
            'email' => 'email',
            'logo' => 'file|image',
        ]);
        
        if($request->file()) {
            $fileName = $request->logo->getClientOriginalName();
            $filePath = $request->file('logo')->storeAs('uploads', $fileName, 'public');
            $company->logo = $filePath;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        return redirect(route('companies.index'))->with('success', 'Company updated successfully!');
    }

    public function delete(Company $company) {
        $company->delete();
        return redirect(route('companies.index'))->with('success', 'Company deleted successfully!');
    }

    public function getAll() {
        $companies = Company::all();

        return response()->json($companies);

    }
}
