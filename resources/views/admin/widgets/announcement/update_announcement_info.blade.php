<form class="card" action="{{route('admin.announcement.add')}}" method="POST">
    @csrf
    <div class="card-header">
        <div class="card-title">Update announcement</div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="title" class="form-label">Announcement Title</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid  @enderror" placeholder="Announcement Title" value="{{$announcement['title']}}">
            @error('title')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="short_description">Short Description</label>
            <textarea name="short_description" id="short_description" rows="3" placeholder="Short Description" class="form-control @error('short_description') is-invalid @enderror">{{$announcement['short_description']}}</textarea>
            @error('short_description')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="richeditor" class="form-label">Description</label>
            <textarea name="description" id="richeditor" placeholder="Description" class="form-control @error('description') is-invalid @enderror">{{$announcement['description']}}</textarea>
            @error('description')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="btn-list">
            <button type="submit" class="btn btn-primary">Post Announcement</button>
            <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
        </div>
    </div>
</form>