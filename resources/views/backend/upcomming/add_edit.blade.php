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
                                <li class="breadcrumb-item"><a href="{{ route('admin.upcomming.index') }}">
                                        <i class="bx bx-run"></i>
                                        Upcomming
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
                                                href="{{ route('admin.upcomming.index') }}">Upcomming Manage</a></span></h4>
                                </div>
                                <hr />
                                <form @if (!empty($upcomming->id)) action="{{ route('admin.upcomming.update', $upcomming->id) }}"
                                @else
                                                            action="{{ route('admin.upcomming.store') }}" @endif method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (!empty($upcomming->id))
                                        @method('PUT')
                                    @endif
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select Category</label>
                                            <div class="col-sm-10">
                                                <select class=" form-control single-select1" name="category_id"
                                                    id="category_id">
                                                    <option value="0" @if (isset($upcomming['category_id']) && $upcomming['category_id'] == 0) selected='' @endif>Main Category
                                                    </option>
                                                    @if (!empty($getCategories))
                                                        @foreach ($getCategories as $categoryvalue)
                                                            <option value="{{ $categoryvalue['id'] }}" @if (isset($upcomming['category_id']) && $upcomming['category_id'] == $categoryvalue['id']) selected="" @endif>
                                                                {{ $categoryvalue['category_name'] }}</option>

                                                            @if (!empty($categoryvalue['sub_categories']))
                                                                @foreach ($categoryvalue['sub_categories'] as $subcategory)
                                                                    <option  value="{{ $subcategory['id'] }}" @if (isset($upcomming['category_id']) && $upcomming['category_id'] == $subcategory['id']) selected="" @endif>
                                                                        &nbsp;&raquo;&nbsp;{{ $subcategory['category_name'] }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Upcomming post Title</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control  @error('title') is-invalid @enderror" name="title"
                                                    value="{{ $upcomming->title ?? old('title') }}"
                                                    placeholder="Post title" required>
                                                @error('title')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Image</label>

                                            <div class="col-sm-10">
                                                <input type="file" name="image"
                                                    class="dropify @error('image') is-invalid @enderror"
                                                    data-max-file-size-preview="8M" @if (isset($upcomming->image) && file_exists($upcomming->image)) data-default-file="/{{ $upcomming->image }}" @endif {{ !isset($upcomming->id) ? 'required' : '' }} />
                                                @error('image')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Body</label>
                                            <div class="col-sm-10">
                                                <textarea id="body" name="body" class="form-control"
                                                    placeholder="body">{{ $upcomming->body ?? old('body') }}</textarea>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="status"
                                                        name="status" value="1" @if (!empty(old('status')) && old('status') == 1) checked
                                                @elseif(!empty($upcomming->status) && $upcomming->status===1)
                                                        checked @endif>
                                                    <label class="form-check-label" for="status">Status</label>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary px-4">
                                                    @if (isset($upcomming->id))
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
