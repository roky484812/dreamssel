<form method="POST" action="" class="card">
    <div class="card-header">
        <div class="card-title">Add Profile Information</div>
    </div>
    <div class="card-body">
        <div class="card-title font-weight-bold">Basic info:</div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="fullname">FullName</label>
                    <input type="text" class="form-control" id="fullname" placeholder="FullName" name="fullname">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Number">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="c_password">Confirm Password</label>
                    <input type="text" class="form-control" id="c_password" name="password_confirmation" placeholder="Confirm Password">
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Home Address">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="post_code">Postal Code</label>
                    <input type="number" class="form-control" id="post_code" name="post_code" placeholder="00000">
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mb-3">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-control nice-select select2 select2-hidden-accessible" tabindex="-1" name="role" id="role" aria-hidden="true">
                        <optgroup label="Categories">
                            <option data-select2-id="5">--Select--</option>
                            <option value="1">Distributor</option>
                            <option value="2">Editor</option>
                            <option value="3">Admin</option>
                        </optgroup>
                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 1009.98px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-20vp-container"><span class="select2-selection__rendered" id="select2-20vp-container" title="--Select--">--Select--</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="btn-list">
            <button type="submit" class="btn btn-primary">Add User</button>
            <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>