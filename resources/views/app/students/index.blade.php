@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">Student List</h1>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Students
                                    </li>
                                </ol>
                            </nav>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="d-flex">
                            @can('create', App\Models\User::class)
                            <li>
                                <a href="{{ route('students.create') }}" class="btn btn-md d-md-none btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('students.create') }}" class="btn btn-primary d-none d-md-inline-flex"
                                    data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add Student</span>
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
                                    <span class="overline-title">Students</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Parents</span>
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
                                <th class="tb-col tb-col-end" data-sortable="false">
                                    <span class="overline-title">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                            <tr>
                                <td class="tb-col">
                                    <div class="media-group">
                                        <div class="media media-md media-middle media-circle">
                                            <img src="./images/avatar/a.jpg" alt="user">
                                        </div>
                                        <div class="media-text">
                                            <a class="title">{{ $student->name ?? '-' }}</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="tb-col">{{ optional($student->user)->name ?? '-' }}</td>
                                <td class="tb-col">{{ optional($student->date_of_birth)->format('Y-m-d') ?? '-' }}
                                </td>
                                <td class="tb-col">{{ $student->gender ?? '-' }}</td>
                                <td class="tb-col">{{ $student->address ?? '-' }}</td>

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
                                                        @can('update', $student)
                                                        <a href="{{ route('students.edit', $student) }}"><em
                                                                class="icon ni ni-edit"></em><span>Edit</span></a>
                                                        @endcan
                                                    </li>
                                                    <li>
                                                        @can('delete', $student)
                                                        <form id="deleteForm{{ $student->id }}"
                                                            action="{{ route('students.destroy', $student) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="confirmDelete({{ $student->id }})">
                                                                <em class="icon ni ni-trash"></em><span>Delete</span>
                                                            </a>
                                                        </form>
                                                        @endcan
                                                    </li>
                                                    <li>
                                                        @can('view', $student)
                                                        <a href="{{ route('students.show', $student) }}"><em
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
                                <td colspan="8" class="text-center py-4">No students found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@include('app.students.create')
@endsection