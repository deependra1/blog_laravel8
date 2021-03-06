@extends('backend.layouts')

@section('main')
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Add New Post</h5>
                </div>
                <div class="card-body">
                    <form action="{{ Route::currentRouteName() === 'posts.edit' ? route('posts.update', $post->id) : route('posts.store') }}" method="post">

                        @if(Route::currentRouteName() === 'posts.edit')
                            @method('PUT')
                        @endif
                        @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">General</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title">Post Title</label>
                                                <input type="text" id="title" class="form-control" name="title" value="{{ isset($post)?$post->title: old('title') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" id="slug" class="form-control" name="slug" value="{{ isset($post)?$post->slug: old('slug') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="excerpt">Post Excerpt</label>
                                                <textarea id="excerpt" class="form-control" rows="4" name="excerpt">
                                                    {!! isset($post)?$post->excerpt: old('excerpt') !!}
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <textarea id="my-editor" name="body" class="form-control">
                                                    {!! isset($post)?$post->body: old('body') !!}
                                                </textarea>

                                            </div>


                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Secondary</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select id="category" class="form-control custom-select" name="category_id">
                                                    <option {{ isset($post)?'':'selected' }} disabled>Select one</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ isset($post)&&$post->category_id==$category->id?'selected':'' }}>{{ $category->title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Tags</label>
                                                <select class="select2" multiple="multiple" name="tags[]"  style="width: 100%;">
                                                    @foreach($tags as $tag)
                                                        @if(isset($post))
                                                            @foreach($post->tags as $tag2)
                                                                <option value="{{ $tag->id }}" {{ $tag2->id==$tag->id?'selected':'' }}>{{ $tag->name }}</option>
                                                            @endforeach
                                                        @else
                                                        <option value="{{ $tag->id }}" >{{ $tag->name }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <div class="input-group">
                                                   <span class="input-group-btn">
                                                     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                       <i class="fa fa-picture-o"></i> Choose
                                                     </a>
                                                   </span>
                                                    <input id="thumbnail" class="form-control" type="text" name="image">
                                                </div>
                                                <img id="holder" style="margin-top:15px;max-height:100px;">
                                            </div>



                                            <div class="form-group">
                                                <label for="meta_description">Meta Description</label>
                                                <textarea id="meta_description" class="form-control" rows="4" name="meta_description">
                                                    {{ isset($post)?$post->meta_description: old('meta_description') }}
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="meta_keywords">Meta Keywords</label>
                                                <textarea id="meta_keywords" class="form-control" rows="4" name="meta_keywords">
                                                    {{ isset($post)?$post->meta_keywords: old('meta_keywords') }}
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="active" checked>
                                                    <label class="custom-control-label" for="customSwitch1">Publish</label>
                                                </div>
                                            </div>


                                        </div>


                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="#" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Create new Porject" class="btn btn-success float-right">
                                </div>
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
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

@endpush
@push('scripts_stacked')
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script type="text/javascript">
        CKEDITOR.replace('my-editor', options);
    </script>

    <script type="text/javascript">
        $('#lfm').filemanager('image');
    </script>

    <script type="text/javascript">
        $("#title").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#slug").val(Text);
        });
    </script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        }
        );
    </script>



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
