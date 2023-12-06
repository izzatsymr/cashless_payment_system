@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">Card List</h1>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cards
                                    </li>
                                </ol>
                            </nav>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="d-flex">
                            @can('create', App\Models\Card::class)
                            <li>
                                <a href="{{ route('cards.create') }}" class="btn btn-md d-md-none btn-primary"
                                    data-bs-toggle="modal" data-bs-target="#addCardModal">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cards.create') }}" class="btn btn-primary d-none d-md-inline-flex"
                                    data-bs-toggle="modal" data-bs-target="#addCardModal">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Add Card</span>
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
                                    <span class="overline-title">UID RFID</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Security Key</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Balance</span>
                                </th>
                                <th class="tb-col tb-col-xl">
                                    <span class="overline-title">Student</span>
                                </th>
                                <th class="tb-col tb-col-xxl">
                                    <span class="overline-title">Status</span>
                                </th>
                                <th class="tb-col tb-col-end" data-sortable="false">
                                    <span class="overline-title">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cards as $card)
                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->id == $card->student->user_id)
                            <tr>
                                <td class="tb-col">{{ $card->rfid ?? '-' }}</td>
                                <td class="tb-col">{{ $card->security_key ?? '-' }}</td>
                                <td class="tb-col">{{ $card->balance ?? '-' }}</td>
                                <td class="tb-col">{{ optional($card->student)->name ?? '-' }}</td>
                                <td class="tb-col">{{ $card->status ?? '-' }}</td>

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
                                                        @can('update', $card)
                                                        <a href="{{ route('cards.edit', $card) }}"><em
                                                                class="icon ni ni-edit"></em><span>Edit</span></a>
                                                        @endcan
                                                    </li>
                                                    <li>
                                                        @can('delete', $card)
                                                        <form id="deleteForm{{ $card->id }}"
                                                            action="{{ route('cards.destroy', $card) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a onclick="confirmDelete({{ $card->id }})">
                                                                <em class="icon ni ni-trash"></em><span>Delete</span>
                                                            </a>
                                                        </form>
                                                        @endcan
                                                    </li>
                                                    <li>
                                                        @can('view', $card)
                                                        <a href="{{ route('cards.show', $card) }}"><em
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
@include('app.cards.create')
@endsection