@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="card card-gutter-md">
                    <div class="card-body">
                        <div class="bio-block">
                            <h4 class="bio-block-title mb-4">Edit Student</h4>
                            <form method="POST" action="{{ route('students.update', $student) }}">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name</label>
                                            <div class="form-control-wrap">
                                                <input name="name" type="text" class="form-control" placeholder="Name"
                                                    value="{{ old('name', $student->name) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                                            <div class="form-control-wrap">
                                                <input name="date_of_birth" placeholder="dd/mm/yyyy" type="text"
                                                    class="form-control js-datepicker" data-title="Text"
                                                    data-today-btn="true" data-clear-btn="true" autocomplete="off"
                                                    value="{{ old('date_of_birth', optional($student->date_of_birth)->format('d/m/Y')) }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Gender</label>
                                            <div class="form-control-wrap">
                                                <select name="gender" class="form-select" data-search="true"
                                                    data-sort="false" required>
                                                    @php $selected = old('gender') @endphp
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="address" class="form-label">Address</label>
                                            <div class="form-control-wrap">
                                                <input name="address" type="text" class="form-control"
                                                    placeholder="Address"
                                                    value="{{ old('address', $student->address) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    @if(auth()->user()->hasRole('super-admin'))
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="parent" class="form-label">Parent</label>
                                            <select name="user_id" class="form-select" label="Parent ID" required>
                                                @foreach($users as $value => $label)
                                                <option value="{{ $value }}" {{ $selected==$value ? 'selected' : '' }}>
                                                    {{ $label }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mt-4">
                                    <a href="{{ route('students.index') }}" class="btn btn-light">
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