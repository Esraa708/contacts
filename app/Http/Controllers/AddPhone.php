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
        // echo 'hello from esraa';
        //    dd ($request -> all());
        // dd(Auth::user());
        $mob = new mobilephone;
        $mob->mobilenumber = $request->phone;
        $mob->user_id = Auth::id();
        $mob->save();
        return Redirect::to('phones');
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
    public function edit($id)
    {
        // dd(intval($id));
        // $phone = mobilephone::where('id', $id)->first();
        //
        // dd($phone->mobilenumber);

        $phone = mobilephone::find($id);
        return View::make('phones.edit')->with('phone', $phone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phone = mobilephone::find($id);
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
    public function destroy($id)
    {
        $phone = mobilephone::find($id);
        $phone->delete();
        Session::flash('message', 'Successfully deleted phone!');
        return Redirect::to('phones');
    }
}
