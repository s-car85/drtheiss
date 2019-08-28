
{{--@foreach(array_chunk($vaucers->all(), 3) as $rows)--}}

        {{--<li>--}}
            {{--<div class="l_g">--}}

            @foreach($vaucers as $vaucer)

                <div class="grid-item ">
                    <div class="l_g_r">
                        <div class="post">
                            @if($vaucer->vaucer_image != null)
                                <a href="{{ url('vaucer/'.$vaucer->slug) }}">
                                    <div class="post-image" style="background: url('{{ asset($vaucer->vaucer_banner) }}');background-size: auto 300px ;	background-repeat: no-repeat;     background-position: center;"></div>
                                </a>
                            @endif
                            <div class="post-sub">
                                <h3 class="post-title"><a href="{{ url('vaucer/'.$vaucer->slug) }}">{{ $vaucer->vaucer_title }}</a></h3>
                                <div class="post-read-more">
                                    <a href="{{ url('vaucer/'.$vaucer->slug) }}" class="button-button-xsmall">Saznaj više &raquo;</a>

                                    <a href="{{ url('vaucer-download/'.$vaucer->slug) }}" data-slug="{{$vaucer->slug}}" id="download-va"  class="button-button-xsmall x2"><i class="fa fa-download"></i> Preuzmi vaučer</a>
                                </div>
                                <div class="post-bottom">
                                    <div class="socials2">
                                        <span class="share">Podelite sa prijateljima</span>
                                        @include('front.partials._socials2', ['url' => \Request::url().'/'.$vaucer->slug])
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

             @endforeach

            {{--</div>--}}
        {{--</li>--}}

{{--@endforeach--}}

