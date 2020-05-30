<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadmin');
    }
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
        $validator = $this->validate($request, [
            'setting.*' => "required|integer|min:1"
        ]);
        foreach ($settings as $id => $setting) {
            $s = Setting::findOrFail($id);
            $s->value = $setting;
            $s->save();
        }
        return back()->with('status', 'Settings Updated!');
    }
}
