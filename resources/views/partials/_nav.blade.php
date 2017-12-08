  {{-- nav baar   --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Laravel Blog</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto ">
  <li class="nav-item ">
    <a class="nav-link {{Request::is('/')? "active":""}} " href="/">Home </a>
  </li>
  <li class="nav-item ">
    <a class="nav-link  {{Request::is('about')? "active":""}} " href="about">about </a>
  </li>
  <li class="nav-item ">
    <a class="nav-link {{Request::is('contact')? "active":""}} " href="contact">Contact </a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{Request::is('link')? "active":""}} " href="#">Link</a>
  </li>

</ul>
<ul class="navbar-nav  mr-5" >
    @guest
  <li ass="nav-item">
    <a class="nav-link " href="{{ route('login') }}"><i class="fa fa-user-o " ></i> Login</a>
  </li>
  <li ass="nav-item">
    <a class="nav-link " href="{{ route('register') }}"><i class="fa fa-registered" aria-hidden="true"></i>Register</a>
  </li>
  @else
<li class="nav-item dropdown ">

      <a class="nav-link dropdown-toggle mr-5" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-o " ></i>
          {{ Auth::user()->name }}
      </a>
      <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{route('posts.index')}}">Profile</a>
          <a class="dropdown-item" href="{{url('posts')}}">Posts</a>
            <a class="dropdown-item" href="{{route('blogs.index')}}">Blog</a>
            
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
      <i class="fa fa-sign-out" aria-hidden="true"></i>
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>

      @endguest

    </li>

</ul>


</div>

</nav>
<div style="padding-top:20px">

</div>
  {{-- ./nav baar   --}}
