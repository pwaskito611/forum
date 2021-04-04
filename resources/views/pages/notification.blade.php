@extends('layouts.app')

@section('content')
    <div class="container mx-auto lg:px-20">
        <div class="grid grid-cols-6">
            <div class="hidden lg:block col-span-1">
                @include('includes.left-bar')
            </div>
            <div class="col-span-6 lg:col-span-3 bg-white rounded border mt-5">
                <div class="flex flex-col">
                    <div class="px-2">
                        <h3 class="font-medium mt-3 ml-3 text-2xl">Notification</h3>
                        <div class="border-b-2"></div>
                    </div>
                    @foreach ($notification as $n)
                        @livewire('notification', ['notif' => $n])
                    @endforeach
                    <div class="px-2 mt-5">
                        {{$notification->links()}}
                    </div>
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
@endsection