@foreach($cats as $key => $val)
    @if($val->id == $product->category_id)
    <a target="_blank" href="{{ url('/proizvodi/'.$val->slug.'/'.$val->id  ) }}">{{$val->title}}</a>
    @endif
@endforeach