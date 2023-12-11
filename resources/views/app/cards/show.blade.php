@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title">Card Records</h2>
                        <nav>
                            <ol class="breadcrumb breadcrumb-arrow mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cards
                                </li>
                            </ol>
                        </nav>
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
                                    <span class="overline-title">Item</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Amount</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Is Success</span>
                                </th>
                                <th class="tb-col">
                                    <span class="overline-title">Date & Time</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($card->scanners as $transaction)
                            @if(auth()->user()->hasRole('super-admin') || auth()->user()->id ==
                            $card->student->user_id)
                            <tr>
                                <td>{{ $card->rfid }}</td>
                                <td>{{ $transaction->name }}</td>
                                <td>{{ $transaction->pivot->transaction_amount }}</td>
                                <td>{{ $transaction->pivot->is_success }}</td>
                                <td>{{ $transaction->pivot->created_at }}</td>
                            </tr>
                            @endif
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">No records found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
</div>
</div>
@endsection