@php
  $i = 1;   
@endphp

@forelse ($followed as $f)
    @if ($i < sizeof($followed))
    <div class="border-b py-4">
        <a href="{{url('thread/'. $f->thread_id)}}" class="text-xl">{{$f->title}}</a>
    </div>

    @php
     $i++;   
    @endphp

    @else
        @if ($i == 10)
        <div class="py-4 border-b">
            <a href="{{url('thread/'. $f->thread_id)}}" class="text-xl">{{$f->title}}</a>
        </div> 
        <div class="py-2">
            <a href="{{url('followed-thread')}}" class="text-blue-600">selengkapnya</a>
        </div>

        @else 

        <div class="py-4">
            <a href="{{url('thread/'. $f->id)}}" class="text-xl">{{$f->title}}</a>
        </div> 

        @endif


    @endif

    
@empty
    @if(\Auth::check())
    <div class="py-4">
        <p>Anda belum mengikuti diskusi</p>
    </div>
    @else 
    <div class="py-4">
        <p>Anda belum <a href="{{url('login')}}" class="text-blue-600">masuk</a></p>
    </div>
    @endif
@endforelse