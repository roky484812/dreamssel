<div class="card box-widget widget-user">
    <div class="widget-user-image mx-auto mt-5 text-center"><img alt="User Avatar" class="rounded-circle" src="{{asset($user->profile_picture)}}"></div>
    <div class="card-body text-center">
        <div class="pro-user">
            <h3 class="pro-user-username text-dark mb-1">{{$user->name}}</h3>
            <h6 class="pro-user-desc text-muted text-capitalize">{{$user->role_name}}</h6>
            <a href="{{route('admin.profile.edit')}}" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    </div>
</div>