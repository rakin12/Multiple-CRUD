<?php

namespace App\Http\Controllers;

use App\Finall;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\View;

class FinallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finalls = Finall::all();
        return view('final.show')
            ->with('finalls',$finalls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('final.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'email',
            'dateOfBirth'=>'required'
        ]);

        if($validator->fails()){
            return redirect(route('finalls.create'))
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $finall = new Finall();
            $finall -> name = $request -> name;
            $finall -> email = $request -> email;
            $finall -> address = $request -> address;
            $finall -> dateOfBirth = $request -> dateOfBirth;
            $finall -> phone = $request -> phone;
            $finall -> save();

            return redirect(route('finalls.index'))
                ->with('message','Successfully Added');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finall  $finall
     * @return \Illuminate\Http\Response
     */
    public function show(Finall $finall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finall  $finall
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finall = Finall::find(@$id);
        return view('final.update')
            ->with('finall',$finall);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finall  $finall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'email',
            'dateOfBirth'=>'required'
        ]);

        if($validator->fails()){
            return redirect(route('finalls.edit'))
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $finall = Finall::find(@$id);
            $finall -> name = $request -> name;
            $finall -> email = $request -> email;
            $finall -> address = $request -> address;
            $finall -> dateOfBirth = $request -> dateOfBirth;
            $finall -> phone = $request -> phone;
            $finall -> save();

            return redirect(route('finalls.index'))
                ->with('message','Successfully Updated');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finall  $finall
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finall = Finall::find(@$id);
        $finall -> delete();

        return redirect(route('finalls.index'))
            ->with('message','Successfully Deleted');
    }
}
