@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="card card-gutter-md">
                    <div class="card-body">
                        <div class="bio-block">
                            <h4 class="bio-block-title mb-4">Edit Scanner</h4>
                            <form method="POST" action="{{ route('scanners.update', $scanner) }}">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name</label>
                                            <div class="form-control-wrap">
                                                <input name="name" type="text" class="form-control" placeholder="Name"
                                                    value="{{ old('name', $scanner->name) }}" maxlength="255" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="amount" class="form-label">Amount</label>
                                            <div class="form-control-wrap">
                                                <input name="amount" type="text" class="form-control"
                                                    placeholder="Amount" value="{{ old('amount', $scanner->amount) }}"
                                                    max="255" step="0.01" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="mode" class="form-label">Mode</label>
                                            <div class="form-control-wrap">
                                                <select name="mode" class="form-select" data-search="true"
                                                    data-sort="false" required>
                                                    @php $selectedMode = old('mode', $scanner->mode) @endphp
                                                    <option value="pay" {{ $selectedMode=='pay' ? 'selected' : '' }}>Pay
                                                    </option>
                                                    <option value="setup" {{ $selectedMode=='setup' ? 'selected' : ''
                                                        }}>Setup</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="user_id" class="form-label">Vendor ID</label>
                                            <div class="form-control-wrap">
                                                <select name="user_id" class="form-select" label="Vendor ID" required>
                                                    @php $selectedUser = old('user_id', $scanner->user_id) @endphp
                                                    <option disabled {{ empty($selectedUser) ? 'selected' : '' }}>
                                                        Please select the Vendor</option>
                                                    @foreach($users as $value => $label)
                                                    <option value="{{ $value }}" {{ $selectedUser==$value ? 'selected'
                                                        : '' }}>
                                                        {{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <a href="{{ route('scanners.index') }}" class="btn btn-light">
                                        <i class="icon ion-md-return-left text-primary"></i>
                                        @lang('crud.common.back')
                                    </a>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div><!-- .bio-block -->
                    </div><!-- .card-body -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
@endsection