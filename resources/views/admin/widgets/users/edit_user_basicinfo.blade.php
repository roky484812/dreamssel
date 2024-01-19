<form method="POST" action="{{route('admin.user.update')}}" class="card">
    @method('PUT')
    @csrf
    <input type="hidden" name="user_id" value="{{$user_data['id']}}">
    <div class="card-header">
        <div class="card-title">Update Profile Information</div>
    </div>
    <div class="card-body">
        <div class="card-title font-weight-bold">Basic info:</div>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="fullname">FullName</label>
                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" value="{{$user_data['name']}}" id="fullname" placeholder="FullName" name="fullname">
                    @error('fullname')
                        <p class="invalid-feedback">{{$errors->first('fullname')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user_data['email']}}" name="email" placeholder="Email" required>
                    @error('email')
                        <p class="invalid-feedback">{{$errors->first('email')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input type="number" class="form-control  @error('phone') is-invalid @enderror" id="phone" value="{{$user_data['user_meta.phone']}}" name="phone" placeholder="Number">
                    @error('phone')
                        <p class="invalid-feedback">{{$errors->first('phone')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" value="{{$user_data['user_meta.address']}}" name="address" placeholder="Home Address">
                    @error('address')
                        <p class="invalid-feedback">{{$errors->first('address')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                    @error('password')
                        <p class="invalid-feedback">{{$errors->first('password')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="c_password">Confirm Password</label>
                    <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" id="c_password" name="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                        <p class="invalid-feedback">{{$errors->first('password_confirmation')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="city">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" value="{{$user_data['user_meta.city']}}" name="city" placeholder="City">
                    @error('city')
                        <p class="invalid-feedback">{{$errors->first('city')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="post_code">Postal Code</label>
                    <input type="number" class="form-control @error('post_code') is-invalid @enderror" id="post_code" value="{{$user_data['user_meta.post_code']}}" name="post_code" placeholder="00000">
                    @error('post_code')
                        <p class="invalid-feedback">{{$errors->first('post_code')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="mb-3">
                    <label class="form-label" for="role">Role</label>
                    <select class="form-control nice-select select2 select2-hidden-accessible @error('role') is-invalid @enderror" tabindex="-1" name="role" id="role" aria-hidden="true">
                        <option value="3" @if ($user_data['role'] == 3) selected @endif>Distributor</option>
                        <option value="2" @if ($user_data['role'] == 2) selected @endif>Editor</option>
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
                        <option value="1" @if ($user_data['is_active']) selected @endif>Active</option>
                        <option value="0" @if (!$user_data['is_active']) selected @endif>Block</option>
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
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
        </div>
    </div>
</form>