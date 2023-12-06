<!-- Modal -->
<div class="modal fade" id="addScannerModal" tabindex="-1" aria-labelledby="addScannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addScannerModalLabel">Add Device</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('scanners.store') }}">
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
                                <label name="amount" label="Amount" class="form-label">Amount</label>
                                <div class="form-control-wrap">
                                    <input name="amount" type="text" class="form-control"
                                        placeholder="amount" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="mode" name="smode" class="form-label">Mode</label>
                                <div class="form-control-wrap">
                                    <select name="mode" class="js-select" data-search="true" data-sort="false"
                                        required>
                                        <option value="pay">Pay</option>
                                        <option value="setup">Setup</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="vendor_id" class="form-label">Vendor</label>
                                <div class="form-control-wrap">
                                    <select name="vendor_id" class="js-select" data-search="true" data-sort="false"
                                        required>
                                        <option value="">Select a vendor</option>
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
                                    <button class="btn btn-primary" type="submit">Add Device</button>
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