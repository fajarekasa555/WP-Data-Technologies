<ul class="list-group">
@foreach($menus as $menu)
    <li class="list-group-item">
        {{ $menu->name }}
        <div class="float-end">
            <button class="btn btn-sm btn-primary">Edit</button>
            <button class="btn btn-sm btn-danger">Delete</button>
        </div>
        @if($menu->children)
            <ul class="list-group mt-1 ms-3">
                @foreach($menu->children as $child)
                    <li class="list-group-item">
                        {{ $child->name }}
                        <div class="float-end">
                            <button class="btn btn-sm btn-primary">Edit</button>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach
</ul>
