<div class="tab-pane" id="tab-2" tabindex="0">
    <div class="card col-sep card-gutter-md">
        <div class="card-body">
            <div class="bio-block">
                <h4 class="bio-block-title mb-4">Change Password</h4>
                <form wire:submit.prevent="updatePassword">
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="current_password" class="form-label">Current
                                    Password</label>
                                <div class="form-control-wrap">
                                    <a class="form-control-icon end password-toggle" title="Toggle show/hide password">
                                        <em class="on icon ni ni-eye-off"></em>
                                        <em class="off icon ni ni-eye"></em>
                                    </a>
                                    <input type="password" class="form-control" id="current_password"
                                        wire:model.defer="state.current_password" autocomplete="current-password">
                                </div>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="password" class="form-label">New Password</label>
                                <div class="form-control-wrap">
                                    <a class="form-control-icon end password-toggle" title="Toggle show/hide password">
                                        <em class="on icon ni ni-eye-off"></em>
                                        <em class="off icon ni ni-eye"></em>
                                    </a>
                                    <input type="password" class="form-control" id="password"
                                        wire:model.defer="state.password" autocomplete="new-password">
                                </div>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirm
                                    New
                                    Password</label>
                                <div class="form-control-wrap">
                                    <a class="form-control-icon end password-toggle" title="Toggle show/hide password">
                                        <em class="on icon ni ni-eye-off"></em>
                                        <em class="off icon ni ni-eye"></em>
                                    </a>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        wire:model.defer="state.password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </div><!-- .col -->
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center gap g-3">
                                <div class="gap-col">
                                    <button class="btn btn-primary" type="submit">Change
                                        Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- .bio-block -->
        </div><!-- .card-body -->
        <div class="card-body">
            <div class="bio-block">
                @livewire('profile.logout-other-browser-sessions-form')
            </div><!-- .bio-block -->
        </div><!-- .card-body -->
    </div><!-- .card -->
</div><!-- .tab-pane -->