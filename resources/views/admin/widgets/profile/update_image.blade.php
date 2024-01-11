<form class="card box-widget widget-user" method="POST" enctype="multipart/form-data" action="{{route('admin.change_profile_picture')}}">
    @csrf
    @error('profile_picture')
        <p class="text-danger">{{$errors->first('profile_picture')}}</p>
    @enderror
    <div class="widget-user-image mx-auto mt-5 text-center">
        <label for="profile_picture">
            <img alt="User Avatar" class="rounded-circle border border-2" src="{{asset($user->profile_picture)}}">
        </label>
    </div>
    <input type="file" name="profile_picture" id="profile_picture" class="d-none" accept="image/*" onchange="this.form.submit()">
    <div class="card-body text-center">
        <div class="pro-user">
            <h3 class="pro-user-username text-dark mb-1">Jenna Side</h3>
            <h6 class="pro-user-desc text-muted">Web Designer</h6>
            <a href="{{route('admin.profile')}}" class="btn btn-primary mt-3">View Profile</a>
        </div>
    </div>
</form>