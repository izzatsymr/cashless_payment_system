@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">Users List</h1>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users
                                    </li>
                                </ol>
                            </nav>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="d-flex">
                            @can('create', App\Models\User::class)
                            <li>
                                <a href="{{ route('users.create') }}" class="btn btn-md d-md-none btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.create') }}" class="btn btn-primary d-none d-md-inline-flex"
                                    data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add User</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </div>
                </div><!-- .nk-block-head-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card">
                    <table class="datatable-init table" data-nk-container="table-responsive">
                        <thead class="table-light">
                            <tr>
                                <th class="tb-col">
                                    <span class="overline-title">Users</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Role
                                    </span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Date Of Birth</span>
                                </th>
                                <th class="tb-col tb-col-xl">
                                    <span class="overline-title">Gender</span>
                                </th>
                                <th class="tb-col tb-col-xxl">
                                    <span class="overline-title">Address</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Phone Number</span>
                                </th>
                                <th class="tb-col tb-col-end" data-sortable="false">
                                    <span class="overline-title">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td class="tb-col">
                                    <div class="media-group">
                                        <div class="media media-md media-middle media-circle">
                                            <img src="./images/avatar/a.jpg" alt="user">
                                        </div>
                                        <div class="media-text">
                                            <a class="title">{{ $user->name ?? '-' }}</a>
                                            <span class="small text">{{ $user->email ?? '-' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="tb-col">
                                    @foreach($user->roles as $role)
                                    {{ $role->name }}<br>
                                    @endforeach
                                </td>
                                <td class="tb-col">{{ optional($user->date_of_birth)->format('Y-m-d') ?? '-' }}
                                </td>
                                <td class="tb-col">{{ $user->gender ?? '-' }}</td>
                                <td class="tb-col">{{ $user->address ?? '-' }}</td>
                                <td class="tb-col">{{ $user->phone_no ?? '-' }}</td>

                                <td class="tb-col tb-col-end">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-sm btn-icon btn-zoom me-n1"
                                            data-bs-toggle="dropdown">
                                            <em class="icon ni ni-more-v"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                            <div class="dropdown-content py-1">
                                                <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                    <li>
                                                        @can('update', $user)
                                                        <a href="{{ route('users.edit', $user) }}"><em
                                                                class="icon ni ni-edit"></em><span>Edit</span></a>
                                                        @endcan
                                                    </li>
                                                    <li>
                                                        @can('delete', $user)
                                                        <form id="deleteForm{{ $user->id }}"
                                                            action="{{ route('users.destroy', $user) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="confirmDelete({{ $user->id }})">
                                                                <em class="icon ni ni-trash"></em><span>Delete</span>
                                                            </a>
                                                        </form>
                                                        @endcan
                                                    </li>
                                                    <li>
                                                        @can('view', $user)
                                                        <a href="{{ route('users.show', $user) }}"><em
                                                                class="icon ni ni-eye"></em><span>View
                                                                Details</span></a>
                                                        @endcan
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- dropdown -->
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">No users found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@include('app.users.create')
@endsection