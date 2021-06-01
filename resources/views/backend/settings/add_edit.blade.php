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
                                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i
                                            class='bx bx-home-alt'></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.setting.index') }}"><i
                                            class='bx bx-home-alt'></i> Banner</a>
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
                                                href="{{ route('admin.setting.index') }}">Setting Manage</a></span></h4>
                                </div>
                                <hr />
                                <form @if (!empty($setting->id)) action="{{ route('admin.setting.update', $setting->id) }}"
                                            @else
                                                action="{{ route('admin.setting.store') }}" @endif method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (!empty($setting->id))
                                        @method('PUT')
                                    @endif
                                    <div class="form-body">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Site Title</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control  @error('title') is-invalid @enderror" name="title"
                                                    value="{{ $setting->title ?? old('title') }}" placeholder="Site title"
                                                    required>
                                                @error('title')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-4">
                                                <input type="email"
                                                    class="form-control  @error('email') is-invalid @enderror" name="email"
                                                    value="{{ $setting->email ?? old('email') }}" placeholder="Site email"
                                                    required>
                                                @error('email')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <label class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-4">
                                                <input type="phone" name="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="Enter phone"
                                                    value="{{ $setting->phone ?? old('phone') }}">
                                                @error('phone')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Logo</label>

                                            <div class="col-sm-10">
                                                <input type="file" name="logo"
                                                    class="dropify @error('logo') is-invalid @enderror"
                                                    data-max-file-size-preview="8M" @if (isset($setting->logo) && file_exists($setting->logo)) data-default-file="/{{ $setting->logo }}" @endif {{ !isset($setting->id) ? 'required' : '' }} />
                                                @error('logo')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control  @error('address') is-invalid @enderror" name="address"
                                                    value="{{ $setting->address ?? old('address') }}" placeholder="Site address"
                                                    required>
                                                @error('address')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">About</label>
                                            <div class="col-sm-10">
                                                <textarea id="about" name="about" class="form-control"
                                                    placeholder="about">{{ $setting->about ?? old('about') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary px-4">
                                                    @if (isset($setting->id))
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
