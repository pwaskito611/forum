@extends('layouts.app')

@section('content')
<div class="container mx-auto lg:px-20 grid grid-cols-6">
    <div class="grid-1 hidden lg:block">
        @include('includes.left-bar')
    </div>
    <div class="col-span-6  lg:col-span-3 word-break">
        @foreach ($users as $user)
        <div class="border rounded bg-white mt-5 flex px-4 py-2">
            @if ($user->photo_path != null)
                <a href="{{url('user/'. $user->id)}}">
                    <img src="{{url($user->photo_path)}}" class="w-10 h-10 rounded-full">
                </a>
            @else
                <a href="{{url('user/'. $user->id)}}">
                    <img src="{{url('asset/man.svg')}}" class="w-10 h-10 rounded-full">
                </a>
            @endif
            <a href="{{url('user/'. $user->id)}}">
                <div class="break-all">
                    <h2 class="text-xl ml-2 mt-1">{{$user->name}}</h2>
                </div>
            </a>
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
        <div class="mt-5">
                {{$users->links()}}
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
@endsection