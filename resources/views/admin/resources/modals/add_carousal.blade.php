<div class="modal fade" id="add_carousal" tabindex="-1" aria-labelledby="add_carousalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.resource.carousal.add') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add_carousalLabel">Add Carousel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <label class="form-label text-dark" for="">Multiple Image</label>
                    <div id="multiple_image"></div>
                    @error('images.*')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary">Upload Carousel Images</button>
            </div>
        </form>
    </div>
</div>
