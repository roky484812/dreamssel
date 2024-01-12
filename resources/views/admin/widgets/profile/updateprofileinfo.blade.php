<form method="POST" action="{{route('admin.update_user_meta')}}" class="card">
    @csrf
    <div class="card-header">
        <div class="card-title">Edit Profile</div>
    </div>
    <div class="card-body">
        <div class="card-title font-weight-bold">Basic info:</div>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" value="{{$user->name}}" name="fullname" placeholder="Enter your name">
                    @error('fullname')
                        <p class="invalid-feedback">{{$errors->first('fullname')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" value="{{$user_meta['phone']}}" name="phone" placeholder="Enter your phone number">
                    @error('phone')
                        <p class="invalid-feedback">{{$errors->first('phone')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{$user_meta['address']}}" name="address" placeholder="Enter your address">
                    @error('address')
                        <p class="invalid-feedback">{{$errors->first('address')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{$user_meta['city']}}" name="city" placeholder="Enter your city name">
                    @error('city')
                        <p class="invalid-feedback">{{$errors->first('city')}}</p>
                    @enderror
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="mb-3">
                    <label class="form-label">Postal Code</label>
                    <input type="number" class="form-control @error('post_code') is-invalid @enderror" value="{{$user_meta['post_code']}}" name="post_code" placeholder="Enter your postal code.">
                    @error('post_code')
                        <p class="invalid-feedback">{{$errors->first('post_code')}}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="btn-list">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
        </div>
    </div>
</form>