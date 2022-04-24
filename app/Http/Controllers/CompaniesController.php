<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Http\Controllers\EmployeesController;


class CompaniesController extends Controller
{
    use \App\Traits\TraitFunctions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::orderBy('created_at','desc')->paginate(10);
        return view('companies.index')->with('companies',$companies);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $nameLogo=$this->save_file($request->file('logo'),'/public/logo');
        $Company=new Company;
        $Company->Name=$request->Name;
        $Company->email=$request->email;
        $Company->website=$request->website;
        $Company->logo=$nameLogo;

        $Company->save();
        return redirect('/companies')->with('success', 'Company create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return EmployeesController::index($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=Company::find($id);
        return view('companies.edit')->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        if($request->file('logo')!=null)
            $nameLogo=$this->save_file($request->file('logo'),'/public/logo');
        $Company=Company::find($id);
        $Company->Name=$request->Name;
        $Company->email=$request->email;
        $Company->website=$request->website;

        if($request->file('logo')!=null)
            $Company->logo=$nameLogo;

        $Company->save();
        return redirect('/companies')->with('success', 'Company update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Company=Company::find($id);
        $Company->delete();
    }
}
