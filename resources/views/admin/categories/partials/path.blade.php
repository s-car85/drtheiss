<ol class="breadcrumb">
    @foreach ($categories->getAncestors() as $ancestor)
        <li>
            {{--@if($ancestor->getAncestors()->isEmpty())--}}
                {{--<a href="{{ url('/', [ $ancestor->slug ]) }}" class="title">--}}
                    {{--{{ $ancestor->title }}--}}
                {{--</a>--}}
            {{--@else--}}
                {{--<a href="{{ URL::to('/'.implode('/', $ancestor->getAncestors()->lists('slug')).'/'.$ancestor->slug ) }}" class="title">--}}
                    {{--{{ $ancestor->title }}--}}
                {{--</a>--}}
            {{--@endif--}}

            <a href="{{ route('admin.categories.show', $ancestor->id ) }}" class="title">
            {{ $ancestor->title }}
            </a>

        </li>
    @endforeach

    <li class="active">{{ $categories->title }}</li>
</ol>