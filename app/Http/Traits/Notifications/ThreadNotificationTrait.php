<?php

namespace App\Http\Traits\Notifications;

use Illuminate\Http\Request;
use App\Models\ThreadFollower;
use App\Models\Notification;
use App\Models\ThreadNotification;

Trait ThreadNotificationTrait 
{
    public function sendThreadNotification($threadID, $userID, $object) {
        $threadFollower = ThreadFollower::where('thread_id', $threadID)->get();

        foreach($threadFollower as $th) {
            $notif = new Notification;
            $notif->viewer_id = $th->user_id;
            $notif->object = $object;
            $notif->is_readed = 0;
            $notif->save();
        
            $threadNotif = new ThreadNotification;
            $threadNotif->notification_id = $notif->id;
            $threadNotif->thread_id = $threadID;
            $threadNotif->answerer_id = $userID;
            $threadNotif->save();
        }
    }
}
