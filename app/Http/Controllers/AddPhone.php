<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mobilephone;
use Auth;
use View;
use Session;
use Redirect;

class AddPhone extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = mobilephone::all()->where('user_id', Auth::id());
        // // dd($phones);
        // foreach ($phones as $phone) {
        //     dd($phone->mobilenumber);
        // }
        return view('phones.list', ['phones' => $phones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
            'mobilenumber' =>
            array(
                'required',
                'unique:mobilephones,mobilenumber,NULL,id,deleted_at,NULL',
                'digits:11',
                'regex:/^(010|011|012)[0-9]{8}$/',

            )
        ]);
        $mob = new mobilephone;
        $mob->mobilenumber = $request->mobilenumber;
        $mob->user_id = Auth::id();
        $mob->save();
        // Session::flash('message', 'Successfully updated phone!');

        return Redirect::to('phones')->with('success','phone has created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(mobilephone $phone)
    {
        // dd(intval($id));
        // $phone = mobilephone::where('id', $id)->first();
        //
        // dd($phone->mobilenumber);

        // $phone = mobilephone::find($id);
        return View::make('phones.edit')->with('phone', $phone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mobilephone $phone)
    {
        $this->validate(request(), [
            'mobilenumber' =>
            array(
                'required',
                'unique:mobilephones,mobilenumber,NULL,id,deleted_at,NULL',
                'digits:11',
                'regex:/^(010|011|012)[0-9]{8}$/',

            )
        ]);
        // $phone = mobilephone::find($id);
        $phone->mobilenumber = $request->mobilenumber;
        $phone->save();
        Session::flash('message', 'Successfully updated phone!');
        return Redirect::to('phones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(mobilephone $phone)
    {
        // $phone = mobilephone::find($id);
        $phone->delete();
        Session::flash('message', 'Successfully deleted phone!');
        return Redirect::to('phones');
    }
}
