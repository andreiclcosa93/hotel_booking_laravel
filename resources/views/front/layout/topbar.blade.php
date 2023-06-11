<style>
    .cart-sup {
        background: #E75542;
        border-radius: 50%;
        color: #fff;
    }
</style>

<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text">{{ $global_setting_data->top_bar_phone }}</li>
                    <li class="email-text">{{ $global_setting_data->top_bar_email }}</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                <ul class="right">

                    @if($global_page_data_third->cart_status == 1)
                        <li class="menu"><a href="{{ route('cart') }}">{{ $global_page_data_third->cart_heading }} @if(session()->has('cart_room_id'))<sup class="cart-sup"> &nbsp; {{ count(session()->get('cart_room_id')) }} &nbsp; </sup>@endif</a></li>
                    @endif

                    @if($global_page_data_third->checkout_status == 1)
                        <li class="menu"><a href="{{ route('checkout') }}">{{ $global_page_data_third->checkout_heading }}</a></li>
                    @endif

                    @if(!Auth::guard('customer')->check())

                        <li class="menu"><a href="{{ route('register') }}">Sign Up</a></li>
                        <li class="menu"><a href="{{ route('login') }}">Login</a></li>

                    @else

                        <li class="menu"><a href="{{ route('customer_home') }}"><span style=" color: #E75542;">My Profile - Dashboard</span> </a></li>

                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
