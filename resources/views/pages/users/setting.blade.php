@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 lg:px-20">
        <div class="grid grid-cols-3">
            <div class="col-span-3 lg:col-span-1">
                @livewire('user.update-photo-profile')
            </div>
            <div class="col-span-3 lg:col-span-1">
                @livewire('user.update-personal-information')
            </div>
            <div class="col-span-3 lg:col-span-1">
                @livewire('user.update-password')
            </div>
        </div>
    </div>
@endsection