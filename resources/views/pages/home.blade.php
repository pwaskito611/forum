@extends('layouts.app')
  
@section('content')
<div class="container mx-auto lg:px-20 ">
    <div class="grid grid-cols-6">
        <div class="sidebar hidden lg:block">
            @include('includes.left-bar')
        </div>
        <div class="col-span-6  lg:col-span-3">
             @forelse ($threads as $item)
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
                            <img src="{{url('asset/man.svg')}}" class="w-6 h-6 rounded-full">
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
             @empty
             <center>
                <h1 class="text-2xl mt-20">
                    Oops Tidak Ada diskusi
                </h1>
             </center>
             @endforelse
             <center>
                 {{$threads->links()}}
             </center>
            </div>
            <div class="hidden lg:block col-span-2 mt-5 ml-5 container">
               <div class="bg-white border rounded px-4">
                <h1 class="text-2xl font-medium mt-3">Diskusi yang diikuti</h1>
                <div class="border mt-2"></div>
                @livewire('thread.followed')
               </div>
            </div>         
    </div>
</div>

<script>
$(document).ready(function(){
	$("time.timeago").timeago();
});
</script>
@endsection