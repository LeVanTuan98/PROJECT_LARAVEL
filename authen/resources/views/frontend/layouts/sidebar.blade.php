<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- head -->
    @include('frontend.partials.head')
    <!-- end head -->
</head>

<body>
<!-- header -->
@include('frontend.partials.header')
<!-- //header -->
<div class="sub-banner my-banner2">
</div>
<div class="content">
    <div class="container">
        @include('frontend.partials.sidebar')
        @yield('content')
    </div>
</div>

<!-- newsletter -->
@include('frontend.partials.newletter')
<!-- //newsletter -->
@include('frontend.partials.footer')
<!-- //cart-js -->
</body>
</html>
