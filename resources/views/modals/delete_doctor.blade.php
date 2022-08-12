@if(isset($doctor))
    <div class="modal fade del_doctor_{{ $doctor->id }} del-doctor">--}}
        <div class="modal-dialog modal-md modal-centered">
            <div class="modal-content  ">
                <div class="modal-header">
                    <span class="text-danger fs-4" data-bs-dismiss="modal">&times;</span>
                    <h2>حذف دکتر</h2>
                </div>
                <div class="modal-body">
                    <form action="#" class="form_del_doctor" data-section="{{ route("del-doctor",$doctor->id) }}"
                          method="POST">
                        <p>آیا قصد پاک کردن دارید؟</p>
                        @csrf
                        @method("delete")
                        <div class="text-center">
                            <button class="btn btn-md btn-outline-success btn_del_submit">آری</button>
                            <span class="btn btn-md btn-outline-danger px-3 ms-4" data-bs-dismiss="modal">نه</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
