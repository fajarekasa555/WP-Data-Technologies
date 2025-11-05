@extends('layouts.mainDev')

@section('title', 'RBAC Dev Mode')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">RBAC Dev Mode</h2>

    {{-- Generate Permissions & Menus --}}
    <form action="{{ route('dev.rbac.generate') }}" method="POST" class="mb-4">
        @csrf
        <button class="btn btn-primary">Generate All Permissions & Menus</button>
    </form>

    {{-- Modules & Features --}}
    <div class="card mb-4">
        <div class="card-header">
            Modules & Features
        </div>
        <div class="card-body">
            @include('dev.partials.module_tree', ['modules' => $modules])
        </div>
    </div>

    {{-- Roles & Permissions --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            Roles & Permissions
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addRoleModal">Add Role</button>
        </div>
        <div class="card-body">
            @include('dev.partials.role_table', ['roles' => $roles])
        </div>
    </div>

    {{-- Menus --}}
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            Menus
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addMenuModal">Add Menu</button>
        </div>
        <div class="card-body">
            @include('dev.partials.menu_tree', ['menus' => $menus])
        </div>
    </div>
</div>

@include('dev.partials.modals')
<script>
document.addEventListener('DOMContentLoaded', function() {

    // 🔹 Collapse/Expand Menu Tree
    document.querySelectorAll('.list-group-item').forEach(li => {
        li.addEventListener('click', function(e) {
            if(e.target.tagName === 'LI') {
                let childUl = li.querySelector('ul');
                if(childUl) {
                    childUl.classList.toggle('d-none');
                }
            }
        });
    });

    // 🔹 Search Roles / Permissions
    const searchInput = document.createElement('input');
    searchInput.className = 'form-control mb-3';
    searchInput.placeholder = 'Search roles...';
    const roleTable = document.querySelector('.card:has(table) .card-body');
    roleTable.prepend(searchInput);

    searchInput.addEventListener('keyup', function() {
        let q = this.value;
        fetch(`{{ route('dev.rbac.search') }}?q=${q}`)
            .then(res => res.json())
            .then(data => {
                let tbody = roleTable.querySelector('tbody');
                tbody.innerHTML = '';
                data.forEach(role => {
                    let tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${role.name}</td>
                        <td>${role.permissions.map(p=>p.name).join(', ')}</td>
                        <td>
                            <button class="btn btn-sm btn-primary editRole" data-id="${role.id}">Edit</button>
                            <button class="btn btn-sm btn-danger deleteRole" data-id="${role.id}">Delete</button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            });
    });

    // 🔹 Edit / Delete Inline AJAX
    document.addEventListener('click', function(e){
        if(e.target.classList.contains('deleteRole')) {
            let id = e.target.dataset.id;
            fetch('{{ route("dev.rbac.role.delete") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({id: id})
            }).then(res=>res.json()).then(()=> location.reload());
        }
        if(e.target.classList.contains('editRole')) {
            let id = e.target.dataset.id;
            let newName = prompt("New role name:");
            if(newName) {
                fetch('{{ route("dev.rbac.role.update") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({id:id, name:newName})
                }).then(res=>res.json()).then(()=> location.reload());
            }
        }
    });

});
</script>

@endsection
