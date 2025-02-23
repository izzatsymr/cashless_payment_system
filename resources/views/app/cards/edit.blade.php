@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="card card-gutter-md">
                    <div class="card-body">
                        <div class="bio-block">
                            <h4 class="bio-block-title mb-4">Edit Card</h4>
                            <form method="POST" action="{{ route('cards.update', $card) }}">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="rfid" class="form-label">UID RFID</label>
                                            <div class="form-control-wrap">
                                                <input name="rfid" type="text" class="form-control" placeholder="RFID"
                                                    value="{{ old('rfid', $card->rfid) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="security_key" class="form-label">Security Key</label>
                                            <div class="form-control-wrap">
                                                <input name="security_key" type="text" class="form-control"
                                                    placeholder="Security Key"
                                                    value="{{ old('security_key', $card->security_key) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="balance" class="form-label">Balance</label>
                                            <div class="form-control-wrap">
                                                <input name="balance" type="text" class="form-control"
                                                    placeholder="Balance" step="0.01" value="{{ old('balance', $card->balance) }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="status" class="form-label">Status</label>
                                            <div class="form-control-wrap">
                                                <select name="status" class="form-select" data-search="true"
                                                    data-sort="false" required>
                                                    @php $selected = old('status', $card->status) @endphp
                                                    <option value="active" {{ $selected=='active' ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ $selected=='inactive' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @if(auth()->user()->hasRole('super-admin'))
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="student_id" class="form-label">Student</label>
                                                <select name="student_id" class="form-select" label="Student ID" required>
                                                    @php $selectedStudent = old('student_id', $card->student_id) @endphp
                                                    @foreach($students as $value => $label)
                                                    <option value="{{ $value }}" {{ $selectedStudent==$value ? 'selected' : '' }}>
                                                        {{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mt-4">
                                    <a href="{{ route('cards.index') }}" class="btn btn-light">
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
