<ul class="ml-4">
    <li class="my-2 mt-5">
        <div class="flex  ">
            <a href="{{url('admin')}}" class="hover:bg-gray-200 py-2 px-4 flex w-40">
                Beranda
            </a>
        </div>    
    </li>
    <li class="my-2 ">
        <div class="flex">
            <a href="{{url('admin/report/thread')}}" class="hover:bg-gray-200 py-2 px-4 flex w-40">
                Laporan thread
            </a>
        </div>       
    </li>
    <li class="my-2">
        <div class="flex">
            <a href="{{url('admin/report/comment')}}" class="hover:bg-gray-200 py-2 px-4 flex w-40">
                Laporan komentar
            </a>
        </div>     
    </li>
    <li class="my-2">
        <a href="{{url('admin/report/reply-comment')}}" class="hover:bg-gray-200 py-2 px-4 flex w-40">
            Laporan balasan komentar
        </a>  
    </li>
</ul>