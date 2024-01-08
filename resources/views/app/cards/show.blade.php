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
                                <li class="breadcrumb-item active" aria-current="page">Cards</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nk-block-head-content">
                        <ul class="d-flex">
                            <li>
                                <button type="button" class="btn btn-md d-md-none btn-primary"
                                    onclick="openReloadCardModal()">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Reload</span>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-primary d-none d-md-inline-flex"
                                    onclick="openReloadCardModal()">
                                    <em class="icon ni ni-plus"></em>
                                    <span>Reload Card</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div><!-- .nk-block-head-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card">
                    <div class="bankcard">
                        <div class="ccontainer">
                            <div class="ccard-inner">
                                <div class="cfront">
                                    <img src="https://i.ibb.co/PYss3yv/map.png" class="cmap-img">
                                    <div class="crow">
                                        <img src="https://i.ibb.co/G9pDnYJ/chip.png" width="60px">
                                        <img src="https://i.ibb.co/WHZ3nRJ/visa.png" width="60px">
                                    </div>
                                    <div class="crow ccard-no">
                                        <p>RFID {{ $card->rfid ?? '-' }}</p>
                                    </div>
                                    <div class="crow ccard-holder">
                                        <p>STUDENT NAME</p>
                                        <p>BALANCE</p>
                                    </div>
                                    <div class="crow cname">
                                        <p>{{ optional($card->student)->name ?? '-' }}</p>
                                        <p>{{ $card->balance ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

<!-- Modal -->
<div class="modal fade" id="reloadCardModal" tabindex="-1" aria-labelledby="reloadCardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="reloadCardModalLabel">Reload Card</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('payments.createBill', ['card' => $card->id]) }}">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label name="amount" label="rfid" class="form-label">Amount</label>
                                <div class="form-control-wrap">
                                    <input name="amount" type="text" class="form-control" placeholder="Reload Amount"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Add hidden input fields for amount and card ID -->
                        <input type="hidden" name="card_id" value="{{ $card->id }}">

                        <div class="col-lg-12">
                            <div class="d-flex gap g-2">
                                <div class="gap-col">
                                    <button class="btn btn-primary" type="submit">Proceed</button>
                                </div>
                                <div class="gap-col">
                                    <button type="button" class="btn border-0" data-bs-dismiss="modal">Discard</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add CSRF token field -->
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<!-- .modal -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function openReloadCardModal() {
        $('#reloadCardModal').modal('show');
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=josefin+Sans:wght@400;500;600;700&display=swap');

    .bankcard .ccontainer {

        display: flex;
        align-items: center;
        justify-content: center;
        width: 450px;
        height: 280px;
        color: white ;
    }

    .bankcard .ccard {
        width: 500px;
        height: 300px;
        color: #fff;
        cursor: pointer;
        perspective: 1000px;
    }

    .bankcard .ccard-inner {
        width: 100%;
        height: 100%;
        position: relative;
        transition: transform 1s;
        transform-style: preserve-3d;
    }

    .bankcard .cfront,
    .bankcard .cback {
        width: 100%;
        height: 100%;
        background-image: linear-gradient(45deg, #0045c7, #ff2c7d);
        position: absolute;
        top: 0;
        left: 0;
        padding: 20px 30px;
        border-radius: 15px;
        overflow: hidden;
        z-index: 1;
        backface-visibility: hidden;
    }

    .bankcard .crow {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .bankcard .cmap-img {
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0.3;
        z-index: -1;
    }

    .bankcard .ccard-no {
        font-size: 35px;
        margin-top: 40px;
    }

    .bankcard .ccard-holder {
        font-size: 12px;
        margin-top: 10px;
    }

    .bankcard .cname {
        font-size: 22px;
        margin-top: 1px;
    }

    .bankcard .cbar {
        background: #222;
        margin-left: -30px;
        margin-right: -30px;
        height: 60px;
        margin-top: 10px;
    }

    .bankcard .ccard-cvv {
        margin-top: 20px;
    }

    .bankcard .ccard-cvv div {
        flex: 1;
    }

    .bankcard .ccard-cvv img {
        width: 100%;
        display: block;
        line-height: 0;
    }

    .bankcard .ccard-cvv p {
        background: #fff;
        color: #000;
        font-size: 22px;
        padding: 10px 20px;
    }

    .bankcard .ccard-text {
        margin-top: 30px;
        font-size: 14px;
    }

    .bankcard .csignature {
        margin-top: 30px;
    }

    .bankcard .cback {
        transform: rotateY(180deg);
    }

    .bankcard .ccard:hover .ccard-inner {
        transform: rotateY(-180deg);
    }
</style>

@endsection