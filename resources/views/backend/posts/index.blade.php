@extends('backend.layouts')

@section('main')


    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 100px;">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th class="project-actions text-right">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td class="project-actions text-right">
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                        <a class="btn btn-sm btn-info" href="{{ route('posts.show',$post->id) }}"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('posts.edit',$post->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="card-footer clearfix">

                    <ul class="pagination pagination-sm m-0 float-right">
                        {!! $posts->links() !!}
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@endsection

@push('styles_stacked')
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@push('scripts_stacked')
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@if ($message = Session::get('success'))
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
                    icon: 'success',
                    title: '{{ $message  }}',
                })
            });
        </script>
    @endpush
@endif





