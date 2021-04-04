<?php

namespace App\Http\Traits\Notifications;

use Illuminate\Http\Request;
use App\Models\UserFollower;
use App\Models\Notification;
use App\Models\UserNotification;

Trait FollowerUserNotificationTrait 
{
    public function sendFollowerUserNotification($followedID, $threadID, $object) {
        $userFollower = UserFollower::where('followed_id', $followedID)->get();

        foreach($userFollower as $uf) {
            $notif = new Notification;
            $notif->viewer_id = $uf->follower_id;
            $notif->object = $object;
            $notif->is_readed = 0;
            $notif->save();
        
            $userNotif = new UserNotification;
            $userNotif->notification_id = $notif->id;
            $userNotif->thread_id = $threadID;
            $userNotif->user_id = $followedID;
            $userNotif->save();
        }
    }
}
