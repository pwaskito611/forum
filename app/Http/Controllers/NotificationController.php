<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function main() {
        $notification = Notification::where('viewer_id', \Auth::user()->id)
        ->with(['threadNotification', 'userNotification'])
        ->simplePaginate(20);
        
        return view('pages.notification', [
            'notification' => $notification
        ]);
    }
}
