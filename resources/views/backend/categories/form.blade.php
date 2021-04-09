@extends('backend.layouts')

@section('main')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Add New Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ Route::currentRouteName() === 'categories.edit' ? route('categories.update', $category->id) : route('categories.store') }}" method="post">

                        @if(Route::currentRouteName() === 'categories.edit')
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ isset($category)?$category->title:'' }}">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" placeholder="Enter title" name="slug" value="{{ isset($category)?$category->slug:'' }}">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <!-- /.col-md-6 -->
    </div>
@endsection

@push('styles_stacked')
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@push('scripts_stacked')
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush



@if($errors->any())
    @foreach ($errors->all() as $error)
        @push('scripts_stacked')
            <script type="text/javascript">
                $(function() {
                    {{-- Toast Example --}}
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    Toast.fire({
                        icon: 'error',
                        title: '{{ $error  }}',
                    })

                    {{-- Regular SWAL2 Example --}}
                    Swal.fire({
                        title: 'Error!',
                        text: '{{ $error }}',
                        icon: 'error',
                        confirmButtonText: 'Okay'
                    })


                });
            </script>
        @endpush
    @endforeach
@endif
