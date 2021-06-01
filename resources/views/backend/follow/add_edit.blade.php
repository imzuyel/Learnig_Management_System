@push('css')
    <link href="{{ asset('/') }}backend/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}backend/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
    @section('title')
        {{ $title }} Management
    @endsection
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: initial;
        }

    </style>
@endpush
@extends('backend.master')
@section('content')
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">Dashboard</div>
                    <div class="pl-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                  <li class="breadcrumb-item"><a href="{{ route('admin.follow.index') }}">
                                        <i class="bx bx-cog"></i>
                                        Follow
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->
                <div class="row">
                    <div class="col-12 col-lg-12 mx-auto">
                        <div class="card radius-15">
                            <div class="card-body">
                                <div class="card-title">

                                    <h4 class="mb-0">{{ $title }}<span> <a class="btn btn-primary"
                                                href="{{ route('admin.follow.index') }}">Follow Manage</a></span></h4>
                                </div>
                                <hr />
                                <form @if (!empty($follow->id)) action="{{ route('admin.follow.update', $follow->id) }}"
                                @else
                                                action="{{ route('admin.follow.store') }}" @endif
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (!empty($follow->id))
                                        @method('PUT')
                                    @endif
                                    <div class="form-body">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Icon(Fontawesome)</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control  @error('icon') is-invalid @enderror"
                                                    name="icon" value="{{ $follow->icon ?? old('icon') }}"
                                                    placeholder="Follow icon" required>
                                                @error('icon')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Link</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="link"
                                                    class="form-control @error('link') is-invalid @enderror"
                                                    placeholder="Enter link" value="{{ $follow->link ?? old('link') }}">
                                                @error('link')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary px-4">
                                                    @if (isset($follow->id))
                                                        Update
                                                    @else
                                                        Add
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->

            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>
@endsection
@push('js')
    <script src="{{ asset('/') }}backend/assets/plugins/select2/js/select2.min.js"></script>
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

    </script>
    <script>
        $('.single-select1').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous"></script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

    </script>

@endpush
