@extends('front.layout.app')


@section('main_content')

<style>
    #loader {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        background: rgba(0,0,0,0.75) url(loading.gif) no-repeat center center;
        z-index: 10000;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>
                    {{-- de vazut varianta cu serviceProvider global de ce nu merge  --}}
                    {{ $global_page_data->contact_heading }}

                    @foreach ($contact_data as $item)
                        {{ $item->contact_heading }}
                    @endforeach
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            @foreach ($contact_data as $item)
                <div class="col-lg-6 col-md-12">
                    <form action="{{ route('contact_send_email') }}" method="POST" class="form_contact_ajax">
                        @csrf
                        <div class="contact-form">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control" name="email">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea class="form-control" rows="3" name="message"></textarea>
                                <span class="text-danger error-text message_error"></span>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="map">
                        {!! $item->contact_map !!}
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</div>

<script>
    (function($){
        $(".form_contact_ajax").on('submit', function(e){
            e.preventDefault();
            $('#loader').show();
            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data)
                {
                    $('#loader').hide();
                    if(data.code == 0)
                    {
                        $.each(data.error_message, function(prefix, val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                    else if(data.code == 1)
                    {
                        $(form)[0].reset();
                        iziToast.success({
                            title: '',
                            position: 'topRight',
                            message: data.success_message,
                        });
                    }

                }
            });
        });
    })(jQuery);
</script>
<div id="loader"></div>

@endsection
