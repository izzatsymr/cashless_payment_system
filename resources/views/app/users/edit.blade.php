@extends('layouts.app')

@section('content')
<div class="container">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-between flex-wrap gap g-2 align-items-center">
                    <div class="nk-block-head-content">
                        <div class="d-flex flex-column flex-md-row align-items-md-center">
                            <div class="media media-huge media-circle">
                                <img src="{{ asset('images/avatar/a.jpg') }}" class="img-thumbnail" alt="">
                            </div>
                            <div class="mt-3 mt-md-0 ms-md-3">
                                <h3 class="title mb-1">{{ $user->name ?? '-' }}</h3>
                                <span class="small">@foreach($user->roles as $role)
                                    {{ $role->name }}<br>
                                    @endforeach</span>
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <ul class="d-flex gap g-2">
                            <li class="d-none d-md-block">
                                <a href="./html/user-manage/user-profile.html" class="btn btn-soft btn-primary"><em
                                        class="icon ni ni-user"></em><span>View
                                        Profile</span></a>
                            </li>
                            <li class="d-md-none">
                                <a href="./html/user-manage/user-profile.html"
                                    class="btn btn-soft btn-primary btn-icon"><em class="icon ni ni-user"></em></a>
                            </li>
                        </ul>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-head-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card card-gutter-md">
                    <div class="card-body">
                        <div class="bio-block">
                            <h4 class="bio-block-title mb-4">Edit Profile</h4>
                            <form method="POST" action="{{ route('users.update', $user) }}">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name</label>
                                            <div class="form-control-wrap">
                                                <input name="name" type="text" class="form-control" placeholder="Name"
                                                    value="{{ old('name', $user->name) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email Address</label>
                                            <div class="form-control-wrap">
                                                <input name="email" type="text" class="form-control"
                                                    placeholder="Email address" value="{{ old('email', $user->email) }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone_no" class="form-label">Phone Number</label>
                                            <div class="form-control-wrap">
                                                <input name="phone_no" type="text" class="form-control"
                                                    placeholder="Phone Number"
                                                    value="{{ old('phone_no', $user->phone_no) }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="gender" class="form-label">Gender</label>
                                            <div class="form-control-wrap">
                                                <select name="gender" class="js-select" data-search="true"
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
                                                    placeholder="Address" value="{{ old('address', $user->address) }}"
                                                    required>
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
                                                    value="{{ old('date_of_birth', optional($user->date_of_birth)->format('d/m/Y')) }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    @if(auth()->user()->hasRole('super-admin'))
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="role" class="form-label">Role</label>
                                            <div class="form-control-wrap">
                                                <select name="roles[]" class="js-select" data-search="true"
                                                    data-sort="false" required>
                                                    @foreach ($roles as $role)
                                                    @php
                                                    $selected = (old('roles.0', $user->roles->first()->id) == $role->id)
                                                    ? 'selected' : '';
                                                    @endphp
                                                    <option value="{{ $role->id }}" {{ $selected }}>{{ $role->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group mt-4">
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