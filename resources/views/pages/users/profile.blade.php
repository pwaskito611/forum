@extends('layouts.app')

@section('content')
<div class="container mx-auto lg:px-20">
    <div class="grid grid-cols-6">
        <div class="grid-1 hidden lg:block">
            @include('includes.left-bar')
        </div>
        <div class="col-span-6 lg:col-span-3">
            <div class="mt-5 rounded border bg-white grid grid-cols-6 pb-5">
                <div class="col-span-3 sm:col-span-1">
                    @if ($user->photo_path != null)
                        <img src="{{url($user->photo_path)}}" class="lg:w-20 h-20 rounded-full mt-5 ml-5">
                    @else
                    <img src="{{url('asset/man.svg')}}" class="lg:w-20 h-20 rounded-full mt-5 ml-5">
                    @endif
                </div>
                <div class="block col-span-3 sm:hidden mt-10">
                    @livewire('user.follow', [ 'userID' => $user->id])
                </div>
                <div class="col-span-3  word-break ml-5 mt-5">
                    <h2 class="text-2xl font-semibold mt-5">{{$user->name}}</h2>
                </div>
                <div class="hidden sm:block col-span-2 py-10">
                   @livewire('user.follow', [ 'userID' => $user->id])
                </div> 
                <div class="col-span-5 px-5 text-break">
                    {{$user->description}}
                </div>
            </div>
            <div class="col-span-6  lg:col-span-3">
                @foreach ($items as $item)
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
                           <a href="{{url('user/'. $user->id)}}">
                               <img src="{{url('asset/man.svg')}}" class="w-6 h-6 rounded-full">
                           </a>
                         @else 
                           <a href="{{url('user/'. $user->id)}}">
                                <img src="{{url($item->user->photo_path)}}" class="w-6 h-6 rounded-full">
                           </a>
                         @endif
                         <a href="{{url('user/'. $user->id)}}">
                           <p>{{$user->name}}</p>
                         </a>
                         <time class="timeago ml-1 font-light since-time text-gray-400" datetime="{{date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($item->created_at)))}}"></time>
                         @include('includes.thread-action', [
                            'userID' => $user->id,
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
                        @include('includes.share-thread', ['threadID' => $item->id])
                   </div>
                </div>
                @endforeach
                <center>
                    {{$items->links()}}
                </center>
               </div>
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