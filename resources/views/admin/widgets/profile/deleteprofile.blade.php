<form class="card" style="background: #ff000021;" method="POST" action="{{route('admin.profile.delete')}}">
    @csrf
    <div class="card-header">
        <div class="card-title">Delete Profile</div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password">
            @error('password')
                <p class="invalid-feedback">{{$errors->first('password')}}</p>
            @enderror
        </div>
    </div>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-danger">Delete Profile</button>
    </div>
</form>