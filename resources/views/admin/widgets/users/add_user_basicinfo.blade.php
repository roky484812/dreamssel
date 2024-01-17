<form method="POST" action="{{route('admin.adduser')}}" class="card">
    @csrf
    <div class="card-header">
        <div class="card-title">Add Profile Information</div>
    </div>
    <div class="card-body">
        <div class="card-title font-weight-bold">Basic info:</div>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="fullname">FullName</label>
                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" placeholder="FullName" name="fullname">
                    @error('fullname')
                        <p class="invalid-feedback">{{$errors->first('fullname')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" required>
                    @error('username')
                        <p class="invalid-feedback">{{$errors->first('username')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" required>
                    @error('email')
                        <p class="invalid-feedback">{{$errors->first('email')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input type="number" class="form-control  @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Number">
                    @error('phone')
                        <p class="invalid-feedback">{{$errors->first('phone')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    @error('password')
                        <p class="invalid-feedback">{{$errors->first('password')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="c_password">Confirm Password</label>
                    <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="c_password" name="password_confirmation" placeholder="Confirm Password" required>
                    @error('password_confirmation')
                        <p class="invalid-feedback">{{$errors->first('password_confirmation')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address" placeholder="Home Address">
                    @error('address')
                        <p class="invalid-feedback">{{$errors->first('address')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="city">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="City">
                    @error('city')
                        <p class="invalid-feedback">{{$errors->first('city')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="post_code">Postal Code</label>
                    <input type="number" class="form-control @error('post_code') is-invalid @enderror" id="post_code" name="post_code" placeholder="00000">
                    @error('post_code')
                        <p class="invalid-feedback">{{$errors->first('post_code')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-control nice-select select2 select2-hidden-accessible @error('role') is-invalid @enderror" tabindex="-1" name="role" id="role" aria-hidden="true">
                        <option value="3" selected>Distributor</option>
                        <option value="2">Editor</option>
                    </select>
                    @error('role')
                        <p class="invalid-feedback">
                           {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="status">Status</label>
                    <select class="form-control nice-select select2 select2-hidden-accessible @error('is_active') is-invalid @enderror" tabindex="-1" name="is_active" id="status" aria-hidden="true">
                        <option value="1" selected>Active</option>
                        <option value="2">Block</option>
                    </select>
                    @error('is_active')
                        <p class="invalid-feedback">
                           {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="btn-list">
            <button type="submit" class="btn btn-primary">Add User</button>
            <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
        </div>
    </div>
</form>