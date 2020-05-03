<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MailController extends Controller
{

    public function mail()
    {
        $all = " ";
        $subject = 'testing';
        $content = 'testing';
        $emails = DB::table('users')->where('privilege', '1')->pluck('email');
        $all .= $emails;
        foreach ($emails as $email) {
            $all .= $email;
            $name = DB::table('users')->where('email', $email)->value('name');
            $all .= $name;
            \Mail::send('htmlemail', ['NAME' => $name, 'CONTENT' => $content], function($message) use($email, $name, $subject)
            {
                $message->to($email, $name)->subject($subject);
            });
        }
       return $all . 'Email was sent';
    }

    public function mailadmin($subject, $content)
    {
        $emails = DB::table('users')->where('privilege', '1')->pluck('email');
        foreach ($emails as $email) {
            $name = DB::table('users')->where('email', $email)->value('name');
            \Mail::send('htmlemail', ['NAME' => $name, 'CONTENT' => $content], function($message) use($email, $name, $subject)
            {
                $message->to($email, $name)->subject($subject);
            });
        }
    }

    public function mailhelpdesk($subject, $content)
    {
       $emails = DB::table('users')->where('privilege', '2')->pluck('email');
        foreach ($emails as $email) {
            $name = DB::table('users')->where('email', $email)->value('name');
            \Mail::send('htmlemail', ['NAME' => $name, 'CONTENT' => $content], function($message) use($email, $name, $subject)
            {
                $message->to($email, $name)->subject($subject);
            });
        }
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
