<div class="tab-pane show active" id="tab-1" tabindex="0">
    <div class="card card-gutter-md">
        <div class="card-body">
            <div class="bio-block">
                <h4 class="bio-block-title mb-4">Edit Profile</h4>
                <form wire:submit.prevent="updateProfileInformation">
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name" class="form-label">Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" wire:model.defer="state.name"
                                        autocomplete="name">
                                </div>
                            </div>
                        </div>
                        <!--Email-->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <div class="form-control-wrap">
                                    <input id="email" type="email" class="form-control" wire:model.defer="state.email"
                                        autocomplete="email">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="date_of_birth" class="form-label">Date Of
                                    Birth</label>
                                <div class="form-control-wrap">
                                    <input id="date_of_birth" type="date" class="form-control"
                                        wire:model.defer="state.date_of_birth">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-control-wrap">
                                    <select class="js-select" id="gender" wire:model.defer="state.gender"
                                        data-search="true" data-sort="false">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="phone_no" class="form-label">Phone Number</label>
                                <div class="form-control-wrap">
                                    <input id="phone_no" type="tel" class="form-control"
                                        wire:model.defer="state.phone_no">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="address"
                                        wire:model.defer="state.address">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-flex gap g-2">
                                <div class="gap-col">
                                    <button class="btn btn-primary" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- .bio-block -->
        </div><!-- .card-body -->
    </div><!-- .card -->
</div><!-- .tab-pane -->
