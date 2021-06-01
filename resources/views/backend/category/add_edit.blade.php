@push('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
    @section('title')
        Management
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">
                                        <i class="bx bx-receipt"></i>
                                        Category
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->


                <div class="row">
                    <div class="col-12 col-lg-11 mx-auto">
                        <div class="card radius-15  border-lg-top-primary">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4 class="mb-0">{{ $title }}</h4>
                                </div>
                                <hr />
                                <form method="POST" enctype="multipart/form-data" @if (empty($category['id'])) action="{{ route('admin.category.store') }}"
                                    @else
                                               action="{{ route('admin.category.update', $category) }}" @endif>
                                    @csrf
                                    @isset($category['id'])
                                        @method('PUT')
                                    @endisset
                                    <div class="form-body">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="category_name"
                                                    value="{{ $category['category_name'] ?? old('category_name') }}"
                                                    placeholder="Category Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Select Category Level</label>
                                            <div class="col-sm-10">
                                                <select class=" form-control single-select1" name="parent_id"
                                                    id="parent_id">
                                                    <option value="0" @if (isset($category['parent_id']) && $category['parent_id'] == 0) selected='' @endif>Main Category
                                                    </option>
                                                    @if (!empty($getCategories))
                                                        @foreach ($getCategories as $categoryvalue)
                                                            <option value="{{ $categoryvalue['id'] }}" @if (isset($category['parent_id']) && $category['parent_id'] == $categoryvalue['id']) selected="" @endif>
                                                                {{ $categoryvalue['category_name'] }}</option>

                                                            @if (!empty($categoryvalue['sub_categories']))
                                                                @foreach ($categoryvalue['sub_categories'] as $subcategory)
                                                                    <option value="{{ $subcategory['id'] }}" disabled>
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
                                            <label class="col-sm-2 col-form-label">Icon</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="icon"
                                                    value="{{ $category['icon'] ?? old('icon') }}" placeholder="Icon">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Category Image</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="category_image"
                                                    class="dropify @error('category_image') is-invalid @enderror"
                                                    data-max-file-size-preview="8M" @isset($category['id'])
                                                    data-default-file="/{{ $category['category_image'] }}" @endisset
                                                    {{ !isset($category['id']) ? 'required' : '' }} />
                                                @error('category_image')
                                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Category Description</label>
                                            <div class="col-sm-10">
                                                <textarea id="description" name="description" class="form-control"
                                                    placeholder="Category Description">{{ $category['description'] ?? old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Meta Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="meta_title" name="meta_title"
                                                    value="{{ $category['meta_title'] ?? old('meta_title') }}"
                                                    placeholder="Meta Title">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Meta Keywords</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="meta_keywords"
                                                    name="meta_keywords"
                                                    value="{{ $category['meta_keywords'] ?? old('meta_keywords') }}"
                                                    placeholder="Meta Keywords">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Meta Description</label>
                                            <div class="col-sm-10">
                                                <textarea id="meta_description" name="meta_description" class="form-control"
                                                    placeholder="Meta Description">{{ $category['meta_description'] ?? old('meta_description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit"
                                                    class="btn btn-primary px-4">{{ isset($category['id']) ? 'Update' : 'Add' }}</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end row-->

                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
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
        $('.single-select').select2({
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
    //Append Category

    <script>
        $('#section_id').change(function() {
            var section_id = $(this).val();
            $.ajax({
                type: 'post',
                url: '/admin/append-category-lavel',
                data: {
                    section_id: section_id
                },
                success: function(resp) {
                    $("#appendCategoriesLevel").html(resp);
                },
                error: function() {
                    alert('Error');
                }
            });
        });

    </script>


@endpush
