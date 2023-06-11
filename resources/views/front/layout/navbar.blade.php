<div class="navbar-area" id="stickymenu">

    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="index.html">
                    {{-- <img src="{{ asset('front/img/logo.png') }}" alt=""> --}}
                    <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                        </li>

                        @if($global_page_data->about_status == 1)
                            <li class="nav-item">
                                <a href="{{ route('about') }}" class="nav-link">{{ $global_page_data->about_heading }}</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Room & Suite</a>
                            <ul class="dropdown-menu">
                                @foreach($global_room_data as $item)
                                    <li class="nav-item">
                                        <a href="{{ route('room_detail',$item->id) }}" class="nav-link">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('photo') }}" class="nav-link">Photo Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('video') }}" class="nav-link">Video Gallery</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
