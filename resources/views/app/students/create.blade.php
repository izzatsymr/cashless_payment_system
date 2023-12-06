<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addStudentModalLabel">Add Student</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('students.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label name="name" label="Name" class="form-label">Name</label>
                                <div class="form-control-wrap">
                                    <input name="name" type="text" class="form-control" placeholder="Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label name="date_of_birth" for="Date Of Birth" class="form-label">Date of Birth</label>
                                <div class="form-control-wrap">
                                    <input name="date_of_birth" placeholder="dd/mm/yyyy" type="text"
                                        class="form-control js-datepicker" data-title="Text" data-today-btn="true"
                                        data-clear-btn="true" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="Gender" name="gender" class="form-label">Gender</label>
                                <div class="form-control-wrap">
                                    <select name="gender" class="js-select" data-search="true" data-sort="false"
                                        required>
                                        <option value="">Select a gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label name="address" label="Address" class="form-label">Address</label>
                                <div class="form-control-wrap">
                                    <input name="address" type="text" class="form-control" placeholder="Address"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="user_id" class="form-label">Parent</label>
                                <div class="form-control-wrap">
                                    <select name="user_id" class="js-select" data-search="true" data-sort="false"
                                        required>
                                        <option value="">Select a parent</option>
                                        @foreach($users as $value => $label)
                                        <option value="{{ $value }}">{{ $label
                                            }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-flex gap g-2">
                                <div class="gap-col">
                                    <button class="btn btn-primary" type="submit">Add Student</button>
                                </div>
                                <div class="gap-col">
                                    <button type="button" class="btn border-0" data-bs-dismiss="modal">Discard</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- .modal -->