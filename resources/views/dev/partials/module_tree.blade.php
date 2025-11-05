<ul class="list-group">
@foreach($modules as $module)
    <li class="list-group-item">
        <strong>{{ $module->name }}</strong>
        <ul class="list-group mt-1 ms-3">
            @foreach($module->features as $feature)
                <li class="list-group-item">
                    {{ $feature->name }}
                    <ul class="list-group mt-1 ms-3">
                        @foreach($feature->actionMethods as $action)
                            <li class="list-group-item">
                                {{ $action->action }} 
                                (Permissions: {{ $action->permissions->pluck('name')->join(', ') }})
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </li>
@endforeach
</ul>
