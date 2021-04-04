@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-40">
        <div class="grid grid-cols-5">
            <div class="col-span-1">
                @include('includes.admin.left-bar')
            </div>
            <div class="col-span-4 rounded bg-white border ml-5 mt-5">
                <center>
                    <h2 class="text-xl mt-20">Hai Admin !!!!</h2>
                </center>
            </div>
        </div>
    </div>
@endsection