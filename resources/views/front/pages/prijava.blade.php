@extends('master')

@section('title', 'Prijava -')

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
    .pmob{
        padding-left: 0;
    }
    /* The container */
    .checkboxwrap {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .checkboxwrap input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 40px;
        width: 40px;
        background-color: #fdebcc;
        border: 3px solid #fff;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #fdebcc;
    }

    /* When the checkbox is checked, add a blue background */
    .checkboxwrap input:checked ~ .checkmark {
        background-color: #f39b00;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .checkboxwrap input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .checkboxwrap .checkmark:after {
        left: 11px;
        top: 0px;
        width: 12px;
        height: 30px;
        border: solid white;
        border-width: 0 5px 5px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
    .labeldesc{
        margin-left: 75px;
        display: block;
        font-size: 14px;
        font-family: 'SF Pro Display', sans-serif;
    }

    select{
        border-radius: 0;
        /* border: 2px solid #fff; */
        display: block;
        width: 100%;
        color: #333;
        height: 54px;
        font-size: 14px;
        line-height: 18;
        box-shadow: none;
        padding: 15px;
        border: 3px solid #fff;
        outline: none;
        background: #fdebcc;
    }


    @media (max-width: 991px){
        .pmob{
            padding: 0;
        }
        .labeldesc{
            font-size: 12px;
        }
    }
</style>
@stop

@section('content')

@include('front.partials._header')

<div class="container no-padding">
    <img src="{{ asset('images/prijava.jpg') }}" alt="Online prijava" class="img-responsive" />
</div>
<div class="row no-padding">
   <div class="container no-padding contact-wraper">
       @if(count($lectureEvents))
       <div class="col-md-8 col-md-offset-2 contact" style=" padding-bottom: 40px;">
               <h2>Prijavi se lako i sigruno</h2>
               <p>Prijavite se lako i jednostavno na predavanje koje vas interesuje.</p>
               <div class="contact-form">
                    {!! Form::model( $lecture = new \App\Contact, ['url'=>'prijava', 'id'=>'sign-form'] ) !!}
						<div style="padding-top: 5px;">
							<div class="control-group">
								{!! Form::text('name', null, ['class' => 'text', 'placeholder' => 'Ime i prezime*']) !!}
							</div>
                            <div class="row">
                                <div class="control-group col-md-8 pmob" >
                                    {{--{!! Form::text('calling', null, ['class' => 'text', 'placeholder' => 'Zvanje*']) !!}--}}
                                    <select name="calling" id="calling" >
                                        <option value="0">Zvanje*</option>
                                        <option value="Lekar">Lekar</option>
                                        <option value="Farmaceut">Farmaceut</option>
                                        <option value="Farmaceutski tehničar">Farmaceutski tehničar</option>
                                    </select>
                                </div>
                                <div class="control-group col-md-4 no-padding">
                                    {!! Form::text('licence', null, ['class' => 'text', 'placeholder' => 'Broj licence*']) !!}
                                </div>
                            </div>
                            <div class="control-group">
                                {!! Form::text('foundation', null, ['class' => 'text', 'placeholder' => 'Grad i ustanova u kojoj ste zaposleni']) !!}
                            </div>
							<div class="control-group">
								{!! Form::text('email', null, ['class' => 'text', 'placeholder' => 'Email*']) !!}
							</div>
						</div>
						<div class="control-group">
							{!! Form::text('phone', null, ['class' => 'text', 'placeholder' => 'Broj telefona:']) !!}
						</div>

                        <p style="color: #333;padding-bottom: 20px;">
                           Prijavljujem se za predavaje koje se održava*:
                        </p>

                        @foreach($lectureEvents as $event)
                       <div class="control-group">

                           <label class="checkboxwrap">
                               {{ Form::checkbox('lecture[]', $event->id, null) }}
                               <span class="checkmark"></span>
                           </label>

                           <span class="labeldesc">
                            {{ $event->title }} <br>
                            Tema predavanja: <strong>{{ $event->theme }}</strong> <br>
                            Predavači: {{ $event->lecturers }}
                           </span>

                       </div>
                        @endforeach


                       <p>
                           Polje označena sa * su obaveza polja za popunjavanje. <br>
                           Online prijava ne garantuje sertifikat.  Potvrđenim ličnim prisustvom na predavanju ostvarujete pravo na sertifikat.
                       </p>

                       {{--<div class="control-group">--}}
                            {{--{!! NoCaptcha::display() !!}--}}
                       {{--</div>--}}

						<div class="control-group">
						   {!! Form::submit('Prijavi se', [ 'class'=>'button-button-big', 'id'=>'submit-contact' ]) !!}
						</div>
					{!! Form::close() !!}
               </div>
           <div class="clearfix"></div>
       </div>
       @else
           <h3>Trenutno nemamo aktivnih predavanja, blagovremeno posetite opet ovu stranu i bićete  obavešteni o novim predavanjima.<br><br>
            Hvala na razumevanju, <br>DrTheiss stručni tim.
           </h3>
       @endif

   </div>
</div>




@include('front.partials._footer')

@stop


@section('scripts')
 {{--{!! NoCaptcha::renderJs() !!}--}}
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
    jQuery.validator.addMethod("notEqual", function(value, element, param) {
        return this.optional(element) || value != param;
    }, "Molimo izaberite drugu vrednost");

    var conval = $('#sign-form').validate({
        validClass: "pass",
        rules: {
            name: {
                minlength: 2,
                maxlength: 100,
                required: true
            },
            calling: {
                notEqual: 0
            },
            licence: {
                minlength: 2,
                maxlength: 50,
                required: true
            },
            email: {
                required: true,
                email: true
            },
            'lecture[]': {
                required: true,
                maxlength: 2
            }

        },
        messages:{
            name: {
                required: "Unesite Vaše ime i prezime. *",
                minlength: jQuery.format("Unesite bar {0} karaktera. *"),
                maxlength: jQuery.format("Maksimalan broj karaktera je {0}. *")
            },
            calling: {
                notEqual: jQuery.format("Izaberite Vaše zvanje. *")
            },
            licence: {
                required: "Unesite Vašu licencu. *",
                minlength: jQuery.format("Unesite bar {0} karaktera. *"),
                maxlength: jQuery.format("Maksimalan broj karaktera je {0}. *")
            },
            email: {
                required: "Unesite Vašu email adresu. *",
                email: "Unesite validnu email adresu. *"
            },
            'lecture[]': {
                required: "Morate da označite minimum jedno predavanje. *",
                maxlength: "Ne možete čekirati više od {0} predavanja. *"
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
