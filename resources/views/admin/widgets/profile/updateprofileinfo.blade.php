<div class="card">
    <div class="card-header">
        <div class="card-title">Edit Profile</div>
    </div>
    <div class="card-body">
        <div class="card-title font-weight-bold">Basic info:</div>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" value="First Name" name="fullname">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control" value="01700000000">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" value="Home Address">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" value="City">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="mb-3">
                    <label class="form-label">Postal Code</label>
                    <input type="number" class="form-control" value="00000">
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="btn-list">
            <a href="javascript:void(0)" class="btn btn-primary">Update</a>
            <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</div>