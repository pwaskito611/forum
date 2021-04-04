<div class="px-2">
    @if ($notif->userNotification != null)
        @if($isReaded == false)
        <div class="bg-blue-100 py-2 mt-1 px-1">
            <div class="flex flex-row">
                <div class="flex-grow break-all">
                    <a  href="{{url('thread/'. $notif->userNotification->thread_id)}}">
                        <b>{{$user->name}}</b> {{$notif->object}}
                    </a>
                </div>
                <div class="ml-auto pl-2">
                    <a href="#" onclick="return false;" id="btn-notif-action-{{$notif->id}}"><i class="fas fa-ellipsis-h"></i></a>
                    <div id="notif-action-{{$notif->id}}" class="border rounded bg-white absolute hidden" style="margin-left: -100px;">
                        <button class="py-2 px-4 hover:bg-gray-100" wire:click="markAsRead">
                            Mark as read
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @else 
        <div class="bg-white py-2 mt-1 px-1">
            <div class="flex flex-row">
                <div class="flex-grow break-all">
                    <a  href="{{url('thread/'. $notif->userNotification->thread_id)}}">
                        <b>{{$user->name}}</b> {{$notif->object}}
                    </a>
                </div>
                <div class="ml-auto pl-2">
                    <a href="#" onclick="return false;" id="btn-notif-action-{{$notif->id}}"><i class="fas fa-ellipsis-h"></i></a>
                    <div id="notif-action-{{$notif->id}}" class="border rounded bg-white absolute hidden" style="margin-left: -100px;">
                        <button class="py-2 px-4 hover:bg-gray-100" wire:click="markAsRead">
                            Mark as read
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @elseif($notif->threadNotification != null)
        @if($isReaded == false)
        <div class="bg-blue-100 py-2 mt-1 px-1">
            <div class="flex flex-row">
                <div class="flex-grow break-all">
                    <a href="{{url('thread/'. $notif->threadNotification->thread_id)}}">
                        <b>{{$user->name}}</b> {{$notif->object}}
                    </a>
                </div>
                <div class="ml-auto">
                    <div class="ml-auto pl-2">
                        <a href="#" onclick="return false;" id="btn-notif-action-{{$notif->id}}"><i class="fas fa-ellipsis-h"></i></a>
                        <div id="notif-action-{{$notif->id}}" class="border rounded bg-white absolute hidden" style="margin-left: -100px;">
                            <button class="py-2 px-4 hover:bg-gray-100" wire:click="markAsRead">
                                Mark as read
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        @else
        <div class="bg-white py-2 mt-1 px-1">
            <div class="flex flex-row">
                <div class="flex-grow break-all">
                    <a href="{{url('thread/'. $notif->threadNotification->thread_id)}}">
                        <b>{{$user->name}}</b> {{$notif->object}}
                    </a>
                </div>
                <div class="ml-auto">
                    <div class="ml-auto pl-2">
                        <a href="#" onclick="return false;" id="btn-notif-action-{{$notif->id}}"><i class="fas fa-ellipsis-h"></i></a>
                        <div id="notif-action-{{$notif->id}}" class="border rounded bg-white absolute hidden" style="margin-left: -100px;">
                            <button class="py-2 px-4 hover:bg-gray-100" wire:click="markAsRead">
                                Mark as read
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif

    @if ($notif->userNotification != null || $notif->threadNotification != null)
        <div class="border-b"></div>
    @endif
</div>
 
<script>
    var showNotifAction = false;

    $('#btn-notif-action-{{$notif->id}}').click(function() {
        if (showNotifAction == false) {
            $('#notif-action-{{$notif->id}}').show();
            showNotifAction = true;
        }else{
            $('#notif-action-{{$notif->id}}').hide();
            showNotifAction = false;
        }
    });

</script>