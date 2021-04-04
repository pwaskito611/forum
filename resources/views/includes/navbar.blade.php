  <!--deskop-->
  <div class="hidden lg:block bg-red-600">
   <div class=" container flex mx-auto px-4 py-2 px-20">
       <a href="{{url('/')}}" class="text-white text-4xl font-bold">{{env('APP_NAME')}}</a>
        <form action="{{url('search')}}" method="get" class="flex px-2 ml-auto">
            <input type="text"  class="rounded-l h-10" size="40" name="search"
             placeholder="Search">
            <button type="submit" class="bg-gray-400 rounded-r w-10 h-10 text-white"><i class="fas fa-search"></i></button>
        </form>
       <div class="ml-auto">
            <ul class="flex">
                @auth
                <li class="mr-8 pt-2">
                    <a href="{{url('create/thread')}}" class="text-white"><i class="fas fa-pen"></i> Diskusi Baru</a>
                </li>
                <li class="mr-8 pt-2">
                    <a href="{{url('notification')}}" class="text-white"><i class="fas fa-bell"></i></a>
                </li>
                <li class="bg-white rounded-full">
                    @if (Auth::user()->photo_path != null)
                    <a href="#" onclick="return false;" class="dropdown-account-show">
                        <img src="{{url(Auth::user()->photo_path)}}" class="w-10 h-10 rounded-full">
                    </a>
                    <a href="#" onclick="return false;" class="dropdown-account-hide hidden">
                        <img src="{{url(Auth::user()->photo_path)}}" class="w-10 h-10 rounded-full">
                    </a>
                    @else
                    <a href="#" onclick="return false;" class="dropdown-account-show">
                        <img src="{{url('storage/asset/man.svg')}}" class="w-10 h-10 rounded-full">
                    </a>
                    <a href="#" onclick="return false;" class="dropdown-account-hide hidden">
                        <img src="{{url('storage/asset/man.svg')}}" class="w-10 h-10 rounded-full">
                    </a>
                    @endif
                    <div class="bg-white absolute rounded border pl-auto hidden mr-10" id="account-item-dropdown">
                        <ul>
                            <li class="hover:bg-gray-200">
                                <form action="{{url('user/'. Auth::user()->id)}}" method="get" >
                                    <button type="submit" class="py-1 pl-4 pr-7">
                                        <i class="fas fa-user-tie"></i> Profil
                                    </button>
                                </form>
                            </li>
                            @if (Auth::user()->role == 'admin')
                            <li class="hover:bg-gray-200">
                                <form action="{{url('admin')}}" method="get" >
                                    <button type="submit" class="py-1 pl-4 pr-7">
                                        <i class="fas fa-tools"></i> Admin
                                    </button>
                                </form>
                            </li>
                            @endif
                            <li class="hover:bg-gray-200">
                                <form action="{{url('logout')}}" method="post">
                                    @csrf
                                    <button type="submit" class="py-1 pl-4 pr-4">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                      </div>
                </li>
                @endauth
                @guest
                <li class="mr-8 pt-2">
                    <a href="{{url('/login')}}" class="text-white font-semibold">Login</a>
                </li>
                <li class="pt-2">
                    <a href="{{url('/register')}}" class="text-white font-semibold">Register</a>
                </li>
                @endguest
            </ul>
    </div>
   </div>
  </div>
  <!--mobile-->
  <div class="block lg:hidden bg-red-600">
   <div class="container flex mx-auto py-4 px-4">
       <button class="text-2xl text-white" id="dropdown-toggle-show">
           <i class="fas fa-bars"></i>
       </button>
       <button class="text-2xl text-white" id="dropdown-toggle-hide">
         <i class="fas fa-bars"></i>
        </button>
       <a href="{{url('/')}}" class="text-white text-4xl mx-auto">
           {{env('APP_NAME')}}
       </a>
       <button href="result.html" class="text-2xl text-white" id="search-toggle-show">
           <i class="fas fa-search"></i>
       </button>
       <button href="result.html" class="text-2xl text-white" id="search-toggle-hide">
        <i class="fas fa-search"></i>
        </button>
   </div>
   <!--navbar item-->
   <div class="bg-white pb-1 pt-1" id="navbar-item">
    <ul class="ml-4">
        @guest
        <li class="my-2">
            <a href="{{url('login')}}"><i class="fas fa-sign-in-alt mr-2 ml-1"></i>Login</a>
        </li>
        <li class="my-2">
            <a href="{{url('register')}}"><i class="fas fa-user-plus mr-1 ml-1"></i>Register</a>
        </li>
        @endguest
        @auth 
        <li class="my-2">
            <a href="{{url('create/thread')}}"><i class="fas fa-pen mr-2 ml-1"></i>Diskusi Baru</a>
          </li>
          <li class="my-2">
            <a href="{{url('user/'. Auth::user()->id)}}"><i class="fas fa-user-tie mr-2 ml-1"></i>Profil Saya</a>
        </li>
        <li class="my-2">
            <a href="{{url('notification')}}"><i class="fas fa-bell mr-2 ml-1"></i>Pemberitahuan</a>
        </li>
        <li class="my-2">
            <a href="{{url('followed-thread')}}"><i class="fas fa-bookmark mr-2 ml-1"></i>Diskusi Yang Diikuti</a>
        </li>
        @endauth
        <div class="border-2 border-solid mr-4"></div>
         <li class="my-2">
            <div class="flex">
                <a href="{{url('/')}}">
                    <img src="{{url('storage/asset/expand.png')}}" class="w-6 h-6 mr-1">
                </a>
                <a href="{{url('/')}}">
                    <p>Semuanya</p>
                </a>
            </div>    
        </li>
        <li class="my-2 ">
            <div class="flex">
                <a href="{{url('/topik/ide-bisnis')}}">
                    <img src="{{url('storage/asset/light-bulb.svg')}}" class="w-6 h-6 mr-1">
                </a>
                <a href="{{url('/topik/ide-bisnis')}}">
                    <p>Ide Bisnis</p>
                </a>
            </div>       
        </li>
        <li class="my-2">
            <div class="flex">
                <a href="{{url('topik/rencana-bisnis')}}">
                    <img src="{{url('storage/asset/pencil.svg')}}" class="w-6 h-6 mr-1">
                </a>
                <a href="{{url('topik/rencana-bisnis')}}">
                    <p>Rencana Bisnis</p>
                </a>
            </div>     
        </li>
        <li class="my-2">
            <div class="flex">
                <a href="{{url('topik/startup')}}">
                    <img src="{{url('storage/asset/startup.svg')}}" class="w-6 h-6 mr-1">
                </a>
                <a href="{{url('topik/startup')}}">
                    <p>Startup</p>
                </a>
            </div>     
        </li>
        <li class="my-2">
            <div class="flex">
                <a href="{{url('topik/umkm')}}">
                    <img src="{{url('storage/asset/store.svg')}}" class="w-6 h-6 mr-1">
                </a>
                <a href="{{url('topik/umkm')}}">
                    <p>UMKM</p>
                </a>
            </div>     
        </li>
        <li class="my-2">
            <div class="flex">
                <a href="{{url('topik/marketing')}}">
                    <img src="{{url('storage/asset/loudspeaker.svg')}}" class="w-6 h-6 mr-1">
                </a>
                <a href="{{url('topik/marketing')}}">
                    <p>Marketing</p>
                </a>
            </div>     
        </li>
        <li class="my-2">
            <div class="flex">
                <a href="{{url('topik/relasi-bisnis')}}">
                    <img src="{{url('storage/asset/relations.svg')}}" class="w-6 h-6 mr-1">
                </a>
                <a href="{{url('topik/relasi-bisnis')}}">
                    <p>Relasi Bisnis</p>
                </a>
            </div>     
        </li>
        <li class="my-2">
            <div class="flex">
                <a href="{{url('topik/hukum-terkait-bisnis')}}">
                    <img src="{{url('storage/asset/law-book.svg')}}" class="w-6 h-6 mr-2">
                </a>
                <a href="{{url('topik/hukum-terkait-bisnis')}}">
                    <p>Hukum Terkait Bisnis</p>
                </a>
            </div>     
        </li>
        <div class="border-2 border-solid mr-4"></div>
        <li class="my-2">
            <div class="flex">
                <form action="{{url('logout')}}" method="post">
                @csrf 
                <button type="submit"><i class="fas fa-sign-out-alt mr-1 ml-1 text-xl"></i>Logout</button>
                </form>
            </div>     
        </li>
    </ul>
   </div>
   <!--end navbar item -->
   
   <!--search mobile-->
   <div class="bg-gray-100 pt-10 pb-5 px-2" id="search-mobile">
    <form action="{{url('search')}}" method="get">
        <div class="container mx-auto">
            <form action="{{url('search')}}" method="get">
                <div class="flex flex-row">
                    <div class="flex-grow">
                        <input type="search" name="search" style="width: 100%;" class="rounded-l no-outline border-none flex-grow"
                        placeholder="Search">
                    </div>
                    <div class="ml-auto">
                        <button type="submit" class="bg-gray-400 rounded-r px-4 py-2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </form>
   </div>
   <!--end of search mobile-->
  </div>



<script>
$('#search-toggle-hide').hide();
$('#dropdown-toggle-hide').hide()
$('#search-mobile').hide();
$('#navbar-item').hide();

$('#dropdown-toggle-show').click(function () {
    $('#navbar-item').show();
    $('#search-mobile').hide();
    $('#dropdown-toggle-show').hide();
    $('#dropdown-toggle-hide').show();
    $('#search-toggle-show').show();
    $('#search-toggle-hide').hide();
});

$('#dropdown-toggle-hide').click(function () {
    $('#navbar-item').hide();
    $('#dropdown-toggle-show').show();
    $('#dropdown-toggle-hide').hide();
});

$('#search-toggle-show').click(function () {
    $('#navbar-item').hide();
    $('#search-mobile').show();
    $('#dropdown-toggle-show').show();
    $('#dropdown-toggle-hide').hide();
    $('#search-toggle-show').hide();
    $('#search-toggle-hide').show();
});

$('#search-toggle-hide').click(function () {
    $('#search-mobile').hide();
    $('#search-toggle-show').show();
    $('#search-toggle-hide').hide();
});

$('.dropdown-account-show').click(function () {
    $('#account-item-dropdown').show();
    $('.dropdown-account-show').hide();
    $('.dropdown-account-hide').show()
});

$('.dropdown-account-hide').click(function () {
    $('#account-item-dropdown').hide();
    $('.dropdown-account-show').show();
    $('.dropdown-account-hide').hide();
});


</script>
