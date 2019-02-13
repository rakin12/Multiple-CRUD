<?php

namespace App\Http\Controllers;

use App\Finalll;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\View;

class FinalllController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finallls = Finalll::all();
        return view('finall.show')
            ->with('finallls',$finallls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finall.add');
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
            return redirect(route('finallls.create'))
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $finalll = new Finalll();
            $finalll -> name = $request -> name;
            $finalll -> email = $request -> email;
            $finalll -> address = $request -> address;
            $finalll -> dateOfBirth = $request -> dateOfBirth;
            $finalll -> phone = $request -> phone;
            $finalll -> save();

            return redirect(route('finallls.index'))
                ->with('message','Successfully Added');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Finall  $finall
     * @return \Illuminate\Http\Response
     */
    public function show(Finalll $finalll)
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
        $finalll = Finalll::find(@$id);
        return view('finall.update')
            ->with('finalll',$finalll);
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
            return redirect(route('finallls.edit'))
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $finalll = Finalll::find(@$id);
            $finalll -> name = $request -> name;
            $finalll -> email = $request -> email;
            $finalll -> address = $request -> address;
            $finalll -> dateOfBirth = $request -> dateOfBirth;
            $finalll -> phone = $request -> phone;
            $finalll -> save();

            return redirect(route('finallls.index'))
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
        $finalll = Finalll::find(@$id);
        $finalll -> delete();

        return redirect(route('finallls.index'))
            ->with('message','Successfully Deleted');
    }
}
