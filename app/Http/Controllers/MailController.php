<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class MailController extends Controller
{

    public function mail()
    {
       \Mail::send('htmlemail', ['NAME' => 'Ahmed test name', 'CONTENT' => 'Ahmed test content'], function($message)
        {
            $message->to('ahmed3madeldin@gmail.com', 'Ahmed Emad TESTING')->subject('Welcome!');
        });
       return 'Email was sent';
    }

    public function sendmail($name, $subject, $content)
    {
       \Mail::send('htmlemail', ['NAME' => $name, 'CONTENT' => $content], function($message)
        {
            $message->to('ahmed3madeldin@gmail.com', 'Ahmed Emad')->subject($subject);
        });
    }

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
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
        //
    }
}
