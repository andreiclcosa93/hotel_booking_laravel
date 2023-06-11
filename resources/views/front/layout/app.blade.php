@include('front.layout.styles')

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}

        @include('front.layout.topbar')


        @include('front.layout.navbar')

        {{-- @include('admin.layout.message') --}}
            @yield('main_content')


        @include('front.layout.footer')

        <div class="copyright">
            Copyright <script>document.write(new Date().getFullYear())</script> . All Rights Reserved.
        </div>

        <div class="scroll-top">
            <i class="fa fa-angle-up"></i>
        </div>


        @if(session()->get('error'))
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif

        @if(session()->get('success'))
            <script>
                iziToast.success({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('success') }}',
                });
            </script>
        @endif




@include('front.layout.scripts')
