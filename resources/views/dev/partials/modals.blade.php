{{-- Add Role Modal --}}
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('dev.rbac.role.store') }}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title">Add Role</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label>Role Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
  </div>
</div>

{{-- Add Menu Modal --}}
<div class="modal fade" id="addMenuModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('dev.rbac.menu.store') }}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title">Add Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label>Menu Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Parent Menu</label>
                <select name="parent_id" class="form-control">
                    <option value="">None</option>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Route / URL</label>
                <input type="text" name="route" class="form-control">
            </div>
            <div class="mb-3">
                <label>Order</label>
                <input type="number" name="order" class="form-control" value="0">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
  </div>
</div>
