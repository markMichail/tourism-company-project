<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('role:admin' or 'role:superadmin');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function unread()
    {
    	$user = auth()->user();
	    $notifications = $user->unreadNotifications;
	    if (!empty($notifications)) {
	    	return view('notifications', compact('notifications'));
	    }
	    return view('notifications');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function viewall()
    {
    	$user = auth()->user();
    	$notifications = $user->notifications;
        return view('notifications', compact('notifications'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function markallasread()
    {
    	$user = auth()->user();
    	$user->unreadNotifications->markAsRead();
        return redirect('notifications');
    }
}
