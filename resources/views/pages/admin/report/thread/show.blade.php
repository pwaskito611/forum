@extends('layouts.app')

@section('content') 
    <div class="container mx-auto px-40">
        <div class="grid grid-cols-5">
            <div class="col-span-1">
                @include('includes.admin.left-bar')
            </div>
            <div class="col-span-4 rounded bg-white border-x border-t ml-5 mt-5">
                @php $i = 0; @endphp
                @forelse ($threads as $thread)
                    @php $i++; @endphp
                    <div class="flex flex-row py-2 px-1">
                        <div class="title flex-grow break-all">
                            <a href="{{url('thread/'. $thread->reported_thread_id)}}">
                                {{$thread->title}}
                            </a>
                        </div>
                        <div class="action">
                            <div class="flex">
                                <form action="{{url('admin/report/thread/detail')}}" method="get">
                                    @csrf 
                                    <input type="hidden" name="id" value="{{$thread->reported_thread_id}}">
                                    <button type="submit" class="py-2 px-4 bg-blue-400 rounded text-white mr-1"><i class="fas fa-info-circle"></i></button>
                                </form>
                                <form action="{{url('admin/report/thread/ignore')}}" method="post">
                                    @csrf 
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{$thread->reported_thread_id}}">
                                    <button type="submit" class="py-2 px-4 bg-green-400 rounded text-white"><i class="fas fa-check-circle"></i></button>
                                </form>
                                <form action="{{url('admin/report/thread/delete')}}" method="post">
                                    @csrf 
                                    @method('delete')
                                    <input type="hidden" name="id" value="{{$thread->reported_thread_id}}">
                                    <button type="submit" class="py-2 px-4 bg-red-400 rounded text-white ml-1"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="border-b"></div>
                @empty
                    Tidak ada laporan
                @endforelse
                @if (sizeof($threads) > 10)
                <div class="mt-5">
                    {{$threads->links()}}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection