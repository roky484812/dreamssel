<form class="card" action="{{route('admin.change_password')}}" method="POST">
    @csrf
    <div class="card-header">
        <div class="card-title">Edit Password</div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Current Password" name="current_password">
            @error('current_password')
                <p class="invalid-feedback">{{$errors->first('current_password')}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Password" name="new_password">
            @error('new_password')
                <p class="invalid-feedback">{{$errors->first('new_password')}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" placeholder="Confirm Password" name="new_password_confirmation">
        </div>
    </div>
    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary">Update Password</button>
    </div>
</form>