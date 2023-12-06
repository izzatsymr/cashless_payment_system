<!-- Modal -->
<div class="modal fade" id="addCardModal" tabindex="-1" aria-labelledby="addCardModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addCardModalLabel">Add Card</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('cards.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label name="rfid" label="rfid" class="form-label">UID RFID</label>
                                <div class="form-control-wrap">
                                    <input name="rfid" type="text" class="form-control" placeholder="Uid RFID" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label name="security_key" label="Security Key" class="form-label">Security Key</label>
                                <div class="form-control-wrap">
                                    <input name="security_key" type="text" class="form-control" placeholder="Security key" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label name="balance" label="Balance" class="form-label">Balance</label>
                                <div class="form-control-wrap">
                                    <input name="balance" type="text" class="form-control" placeholder="Balance" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="status" name="status" class="form-label">Status</label>
                                <div class="form-control-wrap">
                                    <select name="status" class="js-select" data-search="true" data-sort="false"
                                        required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="student_id" class="form-label">Student</label>
                                <div class="form-control-wrap">
                                    <select name="student_id" class="js-select" data-search="true" data-sort="false"
                                        required>
                                        <option value="">Select a student</option>
                                        @foreach($students as $value => $label)
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
                                    <button class="btn btn-primary" type="submit">Add Card</button>
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