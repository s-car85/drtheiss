@extends('master')

@section('title', 'Kontakt -')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.css" />
<style>
    .swal2-modal{
        border-radius: 0;
    }
    .swal2-modal .swal2-title{
        color: #333;
    }
    .swal2-modal .swal2-content{
      color: #333;
    }
</style>
@stop

@section('content')

@include('front.partials._header')

<div class="container no-padding">
    <img src="{{ asset('images/kontakt.jpg') }}" alt="kontakt" class="img-responsive" />
</div>
<div class="row no-padding">
   <div class="container no-padding contact-wraper">
       <div class="col-md-6 contact" style="padding-bottom: 40px;">
               <h2>kontaktiraj nas</h2>
               <p>Za sva pitanja obratite se našem stručnom timu na E-mail</p>
               <div class="contact-form">
                    {!! Form::model( $contact = new \App\Contact, ['url'=>'kontakt', 'id'=>'contact-form'] ) !!}
						<div style="padding-top: 5px;">
							<div class="control-group">
								{!! Form::text('name', null, ['class' => 'text', 'placeholder' => 'Ime*']) !!}
							</div>
							<div class="control-group">
								{!! Form::text('email', null, ['class' => 'text', 'placeholder' => 'Email*']) !!}
							</div>
						</div>
						<div class="control-group">
							{!! Form::text('theme', null, ['class' => 'text', 'placeholder' => 'Naslov*']) !!}
						</div>
						<div class="control-group">
							{!! Form::textarea('question', null, ['class' => 'textarea', 'placeholder' => 'Poruka*', 'rows' => 8]) !!}
						</div>
						<div class="control-group">
                            <div class="col-md-12  no-padding">
                                {!! NoCaptcha::display() !!}
                            </div>
                            <div class="col-md-12  no-padding">
                                <br>
                                {!! Form::submit('Pošalji', [ 'class'=>'button-button-big', 'id'=>'submit-contact' ]) !!}
                            </div>
						</div>
					{!! Form::close() !!}
               </div>
           <div class="clearfix"></div>
       </div>
       <div class="col-md-6 no-padding">
            <div class="contact-box">
                <h2>Adresa</h2>
                <p><i class="fa fa-map-marker"></i><span> Dr Theiss doo Beograd</span></p>
                <p class="pleft35">Van Goga 3, 11070 Beograd, Srbija</p>
            </div>
             <div class="contact-box">
                <h2>kontakt</h2>
                 <div class="col-md-5 no-padding">
                    <p><i class="fa fa fa-phone"></i>+381 11 31 70 769</p>
                    <p class="pleft35">+381 11 31 70 625</p>
                 </div>
                 <div class="col-md-7 no-padding">
                    <p><i class="fa fa fa-envelope"></i>Mail: <a href="mailto:nfo@drtheiss.rs" title="Pošaljite mail">info@drtheiss.rs</a></p>
                 </div>
                 <div class="clearfix"></div>
            </div>
             <div class="contact-box">
                <h2>Website</h2>
                <div class="col-md-5 no-padding">
                    <p><i class="fa fa fa-globe"></i><a href="https://www.drtheiss.rs" target="_blank" title="DrTheiss">www.drtheiss.rs</a></p>
                    <p class="pleft35"><a href="https://www.lacalut.rs" target="_blank" title="Lacalut">www.lacalut.rs</a></p>
                    <p class="pleft35"><a href="https://www.eyelashbooster.rs" target="_blank" title="Eyelash Booster">www.eyelashbooster.rs</a></p>
                    <p class="pleft35"><a href="https://www.lipbooster.rs" target="_blank" title="Lip Booster">www.lipbooster.rs</a></p>
                    <p class="pleft35"><a href="https://www.parasoftin.rs" target="_blank" title="Parasoftin">www.parasoftin.rs</a></p>
                 </div>
                 <div class="clearfix"></div>
            </div>
       </div>
   </div>
</div>




@include('front.partials._footer')

@stop


@section('scripts')
 {!! NoCaptcha::renderJs() !!}
<!-- Sweetalert2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js"></script>
@if(session()->has('flash_message'))
    <script>
        swal({
            title: "{{ session('flash_message.title') }}",
            text: "{{ session('flash_message.message') }}",
            type: "{{ session('flash_message.type') }}",
            timer: 2000,
            showConfirmButton: false,
        });
    </script>
@endif
@if(session()->has('flash_message_overlay'))
    <script>
        swal({
            title: "{{ session('flash_message_overlay.title') }}",
            html: "{!! session('flash_message_overlay.message') !!} ",
            type: "{{ session('flash_message_overlay.type') }}",
            confirmButtonText: 'Zatvori',
            buttonsStyling: false,
            confirmButtonClass: 'button-button-big',
        });
    </script>
@endif
<script>



    var conval = $('#contact-form').validate({
        validClass: "pass",
        rules: {
            name: {
                minlength: 2,
                maxlength:50,
                required: true
            },
            email: {
                required: true,
                email: true
            },
           theme: {
                minlength: 2,
                maxlength:50,
                required: true
            },
            question: {
                minlength: 2,
                required: true,
                maxlength:1500
            }

        },
        messages:{
            name: {
                required: "Unesite Vaše ime. *",
                minlength: jQuery.format("Unesite bar {0} karaktera. *"),
                maxlength: jQuery.format("Maksimalan broj karaktera je {0}. *")
            },
            email: {
                required: "Unesite Vašu email adresu. *",
                email: "Unesite validnu email adresu. *"
            },
            theme: {
                required: "Unesite naslov. *",
                minlength: jQuery.format("Unesite bar {0} karaktera. *"),
                maxlength: jQuery.format("Maksimalan broj karaktera je {0}. *")
            },
            question: {
                required: "Unesite Vašu poruku. *",
                minlength: jQuery.format("Unesite bar {0} karaktera. *"),
                maxlength: jQuery.format("Maksimalan broj karaktera je {0}. *")
            }
        },

        highlight: function (element) {
            $(element).removeClass('success').addClass('error');
            $(element).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function (element) {
            element.text('OK!').addClass('pass').closest('.contorl-group').removeClass('error').addClass('success');
        },
        submitHandler: function(form) {

            $("#submit-contact").prop('disabled', true);

            form.submit();
        }
    });
</script>
@stop
