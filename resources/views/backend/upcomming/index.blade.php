@push('css')
    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('/') }}backend/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('/') }}backend/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('/') }}backend/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    @section('title')
        Upcommings Management
    @endsection
@endpush
@extends('backend.master')
@section('content')
    <img class="centered" src="{{ asset('images/ajax-loader.gif') }}" alt="">
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
                                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-run'></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Upcomming</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="card  radius-15 border-lg-top-primary">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0">Upcomming<span> <a class="btn btn-primary"
                                        href="{{ route('admin.upcomming.create') }}">Add</a></span></h4>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Post Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($upcommings as $key => $upcomming)
                                        <tr>
                                            <td>
                                                @php
                                                    $img_path = $upcomming->image;
                                                @endphp
                                                @if (!empty($upcomming->image) && file_exists($upcomming->image))
                                                    <img src="{{ asset($upcomming->image) }}"
                                                        class="rounded ml-3 shadow" alt="" width="80" height="80">
                                                @else
                                                    <img src="{{ asset('images/no_image.png') }}"
                                                        class="rounded ml-3 shadow" alt="" width="80" height="80">
                                                @endif


                                            </td>
                                            <td>{{ $upcomming->title }}</td>
                                            <td>{{ $upcomming->categoryname->category_name }}</td>
                                            <td>

                                                @if ($upcomming->status)
                                                    <a class="badge-info updateUpcommingStatus"
                                                        id="upcomming-{{ $upcomming->id }}"
                                                        upcomming_id="{{ $upcomming->id }}" href="javascript:;">Active</a>
                                                @else
                                                    <a class="badge-warning updateUpcommingStatus"
                                                        id="upcomming-{{ $upcomming->id }}"
                                                        upcomming_id="{{ $upcomming->id }}" href="javascript:;">Inactive</a>
                                                @endif

                                            </td>
                                            <td>


                                                <a title="Edit" class="btn btn-sm btn-info"
                                                    href="{{ route('admin.upcomming.edit', $upcomming->id) }}"><i
                                                        class="fadeIn animated bx bx-edit"></i></a>

                                                <form action="{{ route('admin.upcomming.destroy', $upcomming->id) }}"
                                                    style="display: inline-block" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger "
                                                        onclick="return confirm('Are you sure want to delete')"
                                                        type="submit"> <i class="fadeIn animated bx bx-trash"></i></button>
                                                </form>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Post Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>
@endsection
@push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/') }}backend/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });

    </script>
    //Category Status
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@endpush
