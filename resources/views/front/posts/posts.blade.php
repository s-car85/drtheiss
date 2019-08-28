
{{--@foreach(array_chunk($posts->all(), 3) as $rows)--}}

        {{--<li>--}}
            {{--<div class="l_g">--}}

            @foreach($posts as $post)

                <div class="grid-item ">
                    <div class="l_g_r">
                        <div class="post">
                            @if($post->post_image != null)
                                <a href="{{ url('blog/'.$post->slug) }}">
                                    <div class="post-image" style="background: url('{{ asset($post->post_image) }}');background-size: auto 200px ;	background-repeat: no-repeat;     background-position: center;"></div>
                                </a>
                            @endif
                            <div class="post-sub">
                                <h3 class="post-title"><a href="{{ url('blog/'.$post->slug) }}">{{ $post->post_title }}</a></h3>
                                <div class="post-short-desc">
                                    <p>{{ $post->post_desc }}</p>
                                </div>
                                <div class="post-read-more">
                                    <a href="{{ url('blog/'.$post->slug) }}" class="button-button-xsmall">Pročitaj više &raquo;</a>
                                </div>
                                <div class="post-bottom">
                                    <div class="socials2">
                                        <span class="share">Podelite sa prijateljima</span>
                                        @include('front.partials._socials2', ['url' => \Request::url().'/'.$post->slug])
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

