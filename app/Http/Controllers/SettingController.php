<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('setting', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $settings = $request->input('setting');

        foreach ($settings as $id => $setting) {
            $s = Setting::findOrFail($id);
            $s->value = $setting;
            $s->save();
        }
        return back()->with('status', 'Settings Updated!');
    }
}
