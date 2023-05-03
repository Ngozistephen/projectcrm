<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;

        return view('dashboard.notifications.index', compact('notifications'));
    }

    public function update(Request $request, DatabaseNotification $notification)
    {
        $notification->markAsRead();

        return redirect()->route('dashboard.notifications.index');
    }

    public function destroy()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->route('dashboard.notifications.index');
    }
}
