<div class="card">
    <div class="card-header">
        <div class="card-title">Profile Details</div>
    </div>
    <div class="card-body">
        <div class="card-title font-weight-bold">Basic info:</div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" disabled value="{{$user->name}}">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" disabled value="{{$user->email}}">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control" disabled
                        value="{{$user_meta['phone']}}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" disabled
                        value="{{$user_meta['address']}}">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" disabled value="{{$user_meta['city']}}">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mb-3">
                    <label class="form-label">Postal Code</label>
                    <input type="number" class="form-control" disabled value="{{$user_meta['post_code']}}">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" class="form-control text-capitalize" disabled value="{{$user->role_name}}">
                </div>
            </div>
        </div>
    </div>
</div>