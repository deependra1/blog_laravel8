@extends('backend.layouts')

@section('main')
    <div class="row">


        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4 class="card-title">Ekko Lightbox</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(is_countable($images) && count($images) > 0)
                            @foreach($images as $img)
                            <div class="col-sm-2">
                                <a href="/images/{{$img->file}}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                    <img src="/images/thumbs/{{$img->file}}" class="img-fluid mb-2" alt="white sample"/>
                                </a>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('styles_stacked')
    <link rel="stylesheet" href="{{ asset('backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/ekko-lightbox/ekko-lightbox.css') }}">
@endpush
@push('scripts_stacked')
    <script src="{{ asset('backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('backend/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
    <script>
        $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({gutterPixels: 3});
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
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





