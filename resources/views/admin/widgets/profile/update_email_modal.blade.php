<div class="modal fade effect-super-scaled" id="myModal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content modal-content-demo" action="{{route('admin.update_email')}}" method="POST">
            @csrf
            <div class="modal-header">
                <h6 class="modal-title">Update Email Address</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <h6 id="update_email_message" class="text-primary text-center"></h6>
                <div class="mb-3">
                    <label for="otp" class="form-label">Your OTP</label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter your OTP here">
                    <input type="hidden" name="email" id="otp_email">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Update Email</button> <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
            </div>
        </form>
    </div>
</div>