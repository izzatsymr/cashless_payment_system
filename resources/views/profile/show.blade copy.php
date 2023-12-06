@extends('layouts.app')

@section('content')
<div class="nk-content">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2 align-items-start">
                            <div class="nk-block-head-content">
                                <div class="d-flex flex-column flex-md-row align-items-md-center">
                                    <div class="media media-huge media-circle">
                                        <img src="./images/avatar/a.jpg" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="mt-3 mt-md-0 ms-md-3">
                                        <h3 class="title mb-1">{{ __('Name') }}</h3>
                                        <span class="small">Owner & Founder</span>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-head-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block-head-between gap g-2">
                        <div class="gap-col">
                            <ul class="nav nav-pills nav-pills-border gap g-3">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-1"
                                        type="button"> Account </button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2" type="button">
                                        Security </button>
                                </li>
                            </ul>
                        </div>
                        <div class="gap-col">
                            <ul class="d-flex gap g-2">
                                <li class="d-none d-md-block">
                                    <a href="./html/user-manage/user-profile.html" class="btn btn-soft btn-primary"><em
                                            class="icon ni ni-user"></em><span>View Profile</span></a>
                                </li>
                                <li class="d-md-none">
                                    <a href="./html/user-manage/user-profile.html"
                                        class="btn btn-soft btn-primary btn-icon"><em class="icon ni ni-user"></em></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-block-head-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="tab-content" id="myTabContent">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation() &&
                        Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        @livewire('profile.update-profile-information-form')
                        @livewire('profile.update-password-form')
                    </div><!-- .tab-content -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div> <!-- .nk-content -->

<!-- Move the scripts and stacks outside of the main content container -->
@stack('modals')
@livewireScripts
@stack('scripts')

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>
    /* Simple Alpine Image Viewer */
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageViewer', (src = '') => {
            return {
                imageUrl: src,

                refreshUrl() {
                    this.imageUrl = this.$el.getAttribute("image-url")
                },

                fileChosen(event) {
                    this.fileToDataUrl(event, src => this.imageUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (!event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },
            }
        })
    })
</script>
@endif
@endsection