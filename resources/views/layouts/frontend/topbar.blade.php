<div class="top-bar">
    <div class="container">
        <span class="socials-list">
            <a href="#"><i class="fa fa-facebook-square fa-fw" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter-square fa-1x" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram fa-1x" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus-official fa-1x" aria-hidden="true"></i></a>
        </span>
        <span class="top-menu">
            <ul class="top-dropdown">
                <li>
                    <a href="#"><i class="fa fa-map-marker f-1x"></i> 62 Waione St, Petone, Lower Hutt, Wellington</a>
                    <a href="#"><i class="fa fa-phone fa-1x" aria-hidden="true"></i> 04 920 9991</a>
                    <span class="fa fa-angle-down"></span>
                </li>
                <li>
                    <a href="#"><i class="fa fa-map-marker f-1x"></i>178A Carlyle Street, Sydenham, Christchurch</a>
                    <a href="#"><i class="fa fa-phone fa-1x" aria-hidden="true"></i> 03 379 8889</a>
                </li>
            </ul>
            <a href="/selector/">
                <i class="fa fa-heart fa-1x" aria-hidden="true"></i>
                Selector
{{--                <span class="badge @if(Cart::count()>0) progress-bar-danger @endif" >{{Cart::count()}}</span>--}}
                <cart-count></cart-count>
            </a>

            @if(Auth::check())
                <a href="/backend/"> Hello, {{Auth::user()->name}} </a>
                <a href="/logout"><i class="fa fa-sign-in fa-1x" aria-hidden="true"></i> Logout </a>
            @else
                <a href="/login"><i class="fa fa-sign-in fa-1x" aria-hidden="true"></i> Login </a>
            @endif
        </span>
    </div>
</div>
<div class="container">
    <alert-message></alert-message>
</div>
