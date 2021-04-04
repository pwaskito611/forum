@extends('layouts.app')

@section('content') 
    <div class="container mx-auto px-60">
        <div class="grid grid-cols-5">
            <div class="col-span-1">
                @include('includes.admin.left-bar')
            </div>
            <div class="col-span-4 rounded bg-white border-x border-t ml-5 mt-5 p-1">
                <table style="width: 100%">
                    <tr class="border">
                        <th class="border">Pelapor</th>
                        <th class="border">Alasan</th>
                        <th class="border">Keterangan</th>
                    </tr>
                    @foreach ($items as $item)
                    <tr class="border">
                        <td class="border">{{$item->name}}</td>
                        <td class="border">{{$item->reason}}</td>
                        <td class="border">{{$item->additional}}</td>
                    </tr>
                    @endforeach
                </table>
                <div class="mt-5">
                    {{$items->links()}}
                </div>
                <a href="{{ URL::previous() }}" class="bg-gray-400 text-white rounded py-2 px-4">Back</a>
            </div>
        </div>
    </div>
@endsection