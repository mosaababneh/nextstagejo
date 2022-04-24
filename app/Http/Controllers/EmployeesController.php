<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employe;
use App\Http\Requests\EmployeesRequest;

class EmployeesController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function  index($id=-1)
    {
        
        if ($id==-1){
            return redirect('/companies')->with('error', 'error');
        }
        $company=Company::find($id);
        if (!isset($company)){
            return redirect('/companies')->with('error', 'No company Found');
        }


        $employees=$company->Employees()->paginate(10);

        return view('employees.index')->with('employees',$employees)->with('company',$company);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $company=Company::find($id);
        if (!isset($company)){
            return redirect('/companies')->with('error', 'No company Found');
        }
        return view('employees.create')->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( $id,EmployeesRequest $request)
    {
        $company=Company::find($id);
        if (!isset($company)){
            return redirect('/companies')->with('error', 'No company Found');
        }


        $employe=new Employe;
        $employe->company_id=$id;
        $employe->First_name=$request->First_name;
        $employe->last_name=$request->last_name;
        $employe->email=$request->email;
        $employe->phone=$request->phone;
        $employe->save();
        
        return redirect('/companies/'.$id)->with('success', 'employe create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/companies/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($if,$id)
    {
        $employe=Employe::find($id);
        return view('employees.edit')->with('employe',$employe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,EmployeesRequest $request, $employe_id)
    {
         $employe=Employe::find($employe_id);
         if (!isset($employe)){
            return redirect('/companies')->with('error', 'No employe Found');
        }
        $employe->First_name=$request->First_name;
        $employe->last_name=$request->last_name;
        $employe->email=$request->email;
        $employe->phone=$request->phone;
        $employe->save();
        return redirect('/companies/'.$employe->company_id)->with('success', 'employe update');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hh,$id)
    {
        $employe=Employe::find($id);
        if (!isset($employe)){
            return redirect('/companies')->with('error', 'No employe Found');
        }
        $employe->delete();
    }
}
