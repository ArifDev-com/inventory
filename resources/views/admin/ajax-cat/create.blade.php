@extends('layouts.app')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Add Category</h4>
                    <h6>Create new product Category</h6>
                </div>
            </div>
            <!-- /add -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form id="categoryAddForm" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label id="saveTitle">Category Name</label>
                                    <input type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category Code</label>
                                    <input type="text" name="code" id="code">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" id="description"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label> Product Image</label>
                                    <div class="image-upload">
                                        <input type="file" name="image" id="image">
                                        <div class="image-uploads">
                                            <img src="{{ asset('backend') }}/img/icons/upload.svg" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <button type="submit" class="btn btn-submit me-2" id="saveBtn"
                                    value="add">Submit</button>
                                <a href="categorylist.html" class="btn btn-cancel">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /add -->
        </div>
    </div>
    </div>
    <!-- /Main Wrapper -->
@endsection


@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#categoryAddForm").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            //done

            $.ajax({
                url: "{{ route('category.store') }}",
                type: 'POST',
                data: formData,

                beforeSend: function() {
                    $('#saveBtn').html('loading...');
                },
                complete: function(response) {
                    $('#saveBtn').html('Submit');
                },


                success: function(data) {
                    $('#categoryAddForm').trigger('reset');
                    Swal.fire({
                        type: 'success',
                        title: 'Category Added Success',
                        showConfirmButton: false,
                        timer: 2000
                    })

                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
@endsection
