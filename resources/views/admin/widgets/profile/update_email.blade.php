<form action="" class="card">
    <div class="card-header">
        <div class="card-title">
            Update Email
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" value="{{$user->email}}">
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <button class="btn btn-primary">Update Email</button>
    </div>
</form>