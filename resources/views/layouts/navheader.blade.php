<nav class="navbar navbar-expand-lg navbar-dark navpanel ">
  <img src="{{ asset('main/gok.png') }}" class="innerlogo py-2">
  <span class="mal_xxxxl">  </span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto pr-5">
                         @guest
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                         @else


    </ul>
    <a class="text-white no_link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       {{ Auth::user()->personname }} &nbsp;<i class="fas fa-power-off"></i><br/>@if( Auth::user()->usertype=='Lsg official'){{ Auth::user()->localbody }} LSG  - {{ Auth::user()->districtname }}@elseif( Auth::user()->usertype=='phcmo'){{ Auth::user()->localbody }} PHC - {{ Auth::user()->districtname }} @elseif( Auth::user()->usertype=='Data entry operator'){{ Auth::user()->localbody }} HW - {{ Auth::user()->districtname }} @endif
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
            </form>
            @endguest
  </div>
</nav>
