@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">Pricing</h1>
                            <nav>
                                <ol class="breadcrumb breadcrumb-arrow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pricing
                                    </li>
                                </ol>
                            </nav>
                    </div>
                </div><!-- .nk-block-head-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row g-gs">
                    @forelse($scanners as $scanner)
                    <div class="col-sm-6 col-xl-4 col-xxl-3">
                        <div class="card text-center h-100">
                            <div class="card-body">
                                <div class="media media-xxl media-middle media-circle">
                                    <img src="./images/avatar/a.jpg" alt="user">
                                </div>
                                <div class="mt-1 mb-4">
                                    <div class="big">{{ $scanner->name ?? '-' }}</div>
                                    <div class="small">RM {{ $scanner->amount ?? '-' }}</div>
                                </div>
                            </div><!-- .card-body -->
                            @can('update', $scanner)
                            <div class="dropdown position-absolute top-0 end-0 p-3">
                                <a href="#" class="btn btn-sm btn-icon btn-zoom" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-more-v"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                    <div class="dropdown-content py-1">
                                        <ul class="link-list link-list-hover-bg-primary link-list-md">
                                            <li>
                                                <a href="{{ route('scanners.edit', $scanner) }}"><em
                                                        class="icon ni ni-edit"></em><span>Edit</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- dropdown -->
                            @endcan
                        </div><!-- .card -->
                    </div><!-- .col -->
                    @empty
                    <tr>
                        <td colspan="5">
                            @lang('crud.common.no_items_found')
                        </td>
                    </tr>
                    @endforelse
                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection