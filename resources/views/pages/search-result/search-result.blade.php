@extends('layouts.app')

@section('content')
<div class="container mx-auto lg:px-20 grid grid-cols-6">
    <div class="sidebar hidden lg:block">
        @include('includes.left-bar')
    </div>
    <div class="col-span-6  lg:col-span-3">
        @if ( isset($threads[0]->id) )
        <div class="mt-5 flex px-1">
            <img src="{{url('storage/asset/discussion.svg')}}" class="w-10 h-10">
            <h2 class="text-2xl ml-2 mt-1">Diskusi</h2>
            <a href="{{url('search/thread?search='. $search)}}" class="text-blue-600 mt-2 ml-auto">selengkapnya</a>
        </div>    
        @endif

         @foreach ($threads as $item)
         <div class="bg-white my-5 grid grid-cols-10 rounded border">
            <div class="grid-1">
                <center>
                @livewire('thread.vote', [
                    'vote' => sizeof($item['threadUpvote'])  - sizeof($item['threadDownVote']),  
                    'thread' => $item
                    ])
                </center>
            </div>
            <div class="col-span-9 px-2 py-2">
              <div class="flex">
                  @if ($item->user->photo_path == null)
                    <a href="{{url('user/'. $item->user->id)}}">
                        <img src="{{url('storage/asset/man.svg')}}" class="w-6 h-6 rounded-full">
                    </a>
                  @else 
                    <a href="{{url('user/'. $item->user->id)}}">
                        <img src="{{url($item->user->photo_path)}}" class="w-6 h-6 rounded-full">
                    </a>
                  @endif
                  <a href="{{url('user/'. $item->user->id)}}">
                    <p>{{$item->user->name}}</p>
                  </a>
                  <time class="timeago ml-1 font-light since-time text-gray-400" datetime="{{date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($item->created_at)))}}"></time>
                  @include('includes.thread-action', [
                      'userID' => $item->user->id,
                      'threadID' => $item->id
                      ])
                </div> 
              <a href="{{url('thread/' . $item->id)}}">
                <h1 class="text-xl mt-3 break-all">{{$item->title}}</h1>
              </a>
              @if($item->image_path != null) 
             <a href="{{url('thread/' . $item->id)}}">
                <img src="{{url($item->image_path)}}" style="max-width: 100%; max-height: 400px;">
             </a>
              @endif
            </div>
            <div class="grid-1"></div>
            <div class="col-span-9 flex">
                <a href="{{url('thread/' . $item->id)}}" class="ml-2 text-gray-400">{{sizeof($item['comment'])}} <i class="fas fa-comments"></i> Komentar</a>
                @livewire('thread.follow', ['threadID' => $item->id])
                @include('includes.share-thread', ['threadID' => $item->id])
            </div>
         </div>      
         @endforeach
         
        @if (isset($users[0]->id))
        <div class="mt-5 flex px-1">
            <img src="{{url('asset/hockey-player.svg')}}" class="w-10 h-10">
            <h2 class="text-2xl ml-2 mt-1">Pengguna</h2>
            <a href="{{url('search/user?search='. $search)}}" class="text-blue-600 mt-2 ml-auto">selengkapnya</a>
        </div>
        @endif

        @foreach ($users as $user)
        <div class="border rounded bg-white mt-5 flex px-1 py-2">
            @if ($user->photo_path != null)
                <a href="{{url('user/' . $user->id)}}">
                    <img src="{{url($user->photo_path)}}" class="w-10 h-10 rounded-full">
                </a>
             @else
                <a href="{{url('user/' . $user->id)}}">
                    <img src="{{url('/storage/asset/man.svg')}}" class="w-10 h-10 rounded-full">
                </a>
             @endif
            <div class="break-all">
                <a href="{{url('user/'. $user->id)}}">
                    <h2 class="text-xl ml-2 mt-1">{{$user->name}}</h2>
                </a>
            </div>
            <div class="ml-auto mt-2">
            @auth
              @if ($user->id != Auth::user()->id)
                @livewire('user.follow', ['userID' => $user->id])
              @endif  
            @endauth
            @guest
                @livewire('user.follow', ['userID' => $user->id])
            @endguest
            </div>
        </div>
        @endforeach

        @if (!isset($threads[0]->id) && !isset($users[0]->id))
            <center>
                <h2 class="text-2xl mt-20 center">Tidak ada hasil pencarian untuk "{{$search}}"</h2>
            </center>
        @endif

    </div>
    <div class="hidden lg:block col-span-2 mt-5 ml-5 container">
        <div class="bg-white border rounded px-4">
         <h1 class="text-2xl font-medium mt-3">Diskusi yang diikuti</h1>
         <div class="border mt-2"></div>
         @livewire('thread.followed')
        </div>
    </div>  
</div>

<script>
    $(document).ready(function(){
	$   ("time.timeago").timeago();
  });
</script>
@endsection