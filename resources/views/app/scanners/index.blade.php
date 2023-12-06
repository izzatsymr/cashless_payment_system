@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">Device List</h1>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Devices
                                    </li>
                                </ol>
                            </nav>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="d-flex">
                            @can('create', App\Models\Scanner::class)
                            <li>
                                <a href="{{ route('scanners.create') }}" class="btn btn-md d-md-none btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#addScannerModal">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('scanners.create') }}" class="btn btn-primary d-none d-md-inline-flex"
                                    data-bs-toggle="modal" data-bs-target="#addScannerModal">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add Device</span>
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
                                    <span class="overline-title">ID</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Name</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Amount</span>
                                </th>
                                <th class="tb-col tb-col-xl">
                                    <span class="overline-title">Vendor</span>
                                </th>
                                <th class="tb-col tb-col-xxl">
                                    <span class="overline-title">Mode</span>
                                </th>
                                <th class="tb-col tb-col-end" data-sortable="false">
                                    <span class="overline-title">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($scanners as $scanner)
                        @if(auth()->user()->hasRole('super-admin') || auth()->user()->id == $scanner->user_id)
                            <tr>
                                <td class="tb-col">{{ $scanner->id ?? '-' }}</td>
                                <td class="tb-col">{{ $scanner->name ?? '-' }}</td>
                                <td class="tb-col">{{ $scanner->amount ?? '-' }}</td>
                                <td class="tb-col">{{ optional($scanner->user)->name ?? '-' }}</td>
                                <td class="tb-col">{{ $scanner->mode ?? '-' }}</td>

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
                                                        @can('update', $scanner)
                                                        <a href="{{ route('scanners.edit', $scanner) }}"><em
                                                                class="icon ni ni-edit"></em><span>Edit</span></a>
                                                        @endcan
                                                    </li>
                                                    <li>
                                                        @can('delete', $scanner)
                                                        <form id="deleteForm{{ $scanner->id }}"
                                                            action="{{ route('scanners.destroy', $scanner) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="confirmDelete({{ $scanner->id }})">
                                                                <em class="icon ni ni-trash"></em><span>Delete</span>
                                                            </a>
                                                        </form>
                                                        @endcan
                                                    </li>
                                                    <li>
                                                        @can('view', $scanner)
                                                        <a href="{{ route('scanners.show', $scanner) }}"><em
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
                            @endif
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">No cards found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@include('app.scanners.create')
@endsection
