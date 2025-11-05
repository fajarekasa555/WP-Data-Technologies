<table class="table table-striped">
    <thead>
        <tr>
            <th>Role</th>
            <th>Permissions</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ $role->permissions->pluck('name')->join(', ') }}</td>
            <td>
                <button class="btn btn-sm btn-primary">Edit</button>
                <form action="{{ route('dev.rbac.role.delete') }}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="id" value="{{ $role->id }}">
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
