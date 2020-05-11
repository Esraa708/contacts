<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Database\Eloquent\Collection;
use App\User;
use Auth;
use View;
use Session;
use Redirect;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = User::find(Auth::id())->contacts;
        // // dd($phones);
        // foreach ($phones as $phone) {
        //     dd($phone->mobilenumber);
        // }
        return view('contacts.list', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = \Auth::user();
        $users = User::whereNotIn('id', $user->contacts->pluck('id'))
            ->where('id', '<>', $user->id)
            ->pluck('name','id');
        return view('contacts.create', ['users' => $users]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $user->contacts()->attach(intval($request->user));
        return Redirect::to('contacts')->with('success', 'contact has created successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(Auth::id());
        $user->contacts()->detach(intval($id));
        return Redirect::to('contacts');

    }
}
