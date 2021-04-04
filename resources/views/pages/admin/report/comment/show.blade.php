@extends('layouts.app')

@section('content') 
    <div class="container mx-auto px-40">
        <div class="grid grid-cols-5">
            <div class="col-span-1">
                @include('includes.admin.left-bar')
            </div>
            <div class="col-span-4 rounded bg-white border  ml-5 mt-5 p-1">
                <table style="width: 100%;">
                    <tr>
                        <th class="border">Gambar</th>
                        <th class="border">Komentar</th>
                        <th class="border">Langkah lanjut</th>
                    </tr>
                    @foreach ($comments as $comment)
                        <tr class="border">
                            <td class="border">
                                {{$comment->image_path}}
                            </td>
                            <td class="border">
                                <a href="{{url('thread/'. $comment->thread_id)}}">
                                    {{$comment->comment}}
                                </a>
                            </td>
                            <td class="border">
                                <div class="flex">
                                    <form action="{{url('admin/report/comment/detail')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$comment->reported_comment_id}}">
                                        <button type="submit" class="py-2 px-4 bg-blue-400 rounded text-white mr-1"><i class="fas fa-info-circle"></i></button>
                                    </form>
                                    <form action="{{url('admin/report/comment/ignore')}}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{$comment->reported_comment_id}}">
                                        <button type="submit" class="py-2 px-4 bg-green-400 rounded text-white"><i class="fas fa-check-circle"></i></button>
                                    </form>
                                    <form action="{{url('admin/report/comment/delete')}}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{$comment->reported_comment_id}}">
                                        <button type="submit" class="py-2 px-4 bg-red-400 rounded text-white ml-1"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                @if (sizeof($comments) > 10)
                <div class="mt-5">
                    {{$comments->links()}}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection