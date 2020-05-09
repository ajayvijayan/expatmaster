@include('layouts.mainheader')
@include('layouts.navheader')
<div class="p-1">
         @yield('content')
</div>
@include('layouts.mainfooter')
@include('layouts.inlcudes_list')
@yield('customscripts')