@unless ($categories->isEmpty())
    <ul class="category-tree" >
        @foreach ($categories as $category)
            <li {!! Request::is('admin/categories/'.$category->id) ? 'class="active"' : '' !!}>

            <span class="actions">
                <a href="{{ route('admin.categories.edit', [ $category->getKey() ]) }}" title="Izmeni ovu kategoriju">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="{{ route('admin.categories.create', [ 'parent_id' => $category->getKey() ]) }}" title="Dodaj podkategoriju">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            </span>

                <a href="{{ route('admin.categories.show', $category->id ) }}"  class="title">
                    {{ $category->title }}
                </a>

                @include('admin.categories.partials.tree', [ 'categories' => $category->children ])

            </li>
        @endforeach
    </ul>
@endunless
