<center>
    @if (Auth::check())
        @if ($userID == Auth::user()->id)
        <a href="{{url('setting/user')}}"  class="px-4 py-2 bg-red-400 text-white rounded">
            Pengaturan
        </a>
        @elseif($isFollowed) 
        <a href="#" wire:click="unFollow"  onclick="return false;" class="px-4 py-2 bg-red-400 text-white rounded">
            Batal Ikuti
        </a>
        @else
        <a href="#" wire:click="follow"  onclick="return false;" class="px-4 py-2 bg-red-400 text-white rounded">
            Ikuti
        </a>
        @endif

    @else 
    <a href="{{url('login')}}" class="px-4 py-2 bg-red-400 text-white rounded">
        Follow
    </a>    
    @endif
</center>