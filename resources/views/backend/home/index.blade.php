@section('title')
    Dashboard
@endsection
@extends('backend.master')
@section('content')

    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="card radius-15 bg-primary">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 font-weight-bold text-white">{{ $total_banner }}</h4>
                                        <p class="mb-0 text-white">Total Banner</p>
                                    </div>
                                    <div class="font-35 text-white"><i class='bx bx-repeat'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card radius-15 bg-warning">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 font-weight-bold text-dark">{{ $total_category }}</h4>
                                        <p class="mb-0 text-dark">Total Category</p>
                                    </div>
                                    <div class="font-35 text-dark"><i class='bx bx-receipt'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card radius-15 bg-danger">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 font-weight-bold text-white">{{ $total_post }}</h4>
                                        <p class="mb-0 text-white">Total Post</p>
                                    </div>
                                      <div class="font-35 text-white"><i class='bx bx-task'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card radius-15 bg-success">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 font-weight-bold text-white">{{ $total_upcomming }}</h4>
                                        <p class="mb-0 text-white ">Upcomming</p>
                                    </div>
                                    <div class="font-35 text-white"><i class='bx bx-run'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="card radius-15 bg-red-light">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 font-weight-bold">{{ $total_achiement }}</h4>
                                        <p class="mb-0">Achiement</p>
                                    </div>
                                    <div class="widgets-icons bg-light-primary text-primary rounded-circle"><i
                                            class='bx bx-run'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card radius-15 bg-vimeo">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 font-weight-bold">{{ $total_testimonial }}</h4>
                                        <p class="mb-0">Testtimonial</p>
                                    </div>
                                    <div class="widgets-icons btn-light-secondary text-success rounded-circle"><i
                                            class='bx bx-star'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card radius-15 bg-linkedin">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 font-weight-bold">{{ $total_contact }}</h4>
                                        <p class="mb-0">Contact</p>
                                    </div>
                                    <div class="widgets-icons bg-light-danger text-danger rounded-circle"><i
                                            class='bx bx-user-plus'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card radius-15 bg-dribbble">
                            <div class="card-body">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h4 class="mb-0 font-weight-bold">{{ $total_subscriber }}</h4>
                                        <p class="mb-0">Subscriber</p>
                                    </div>
                                    <div class="widgets-icons bg-light-info text-info rounded-circle"><i
                                            class='bx bx-play-circle'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card radius-15">
                            <div class="card-body">
                                <div class="d-flex mb-2">
                                    <div>
                                        <p class="mb-0 font-weight-bold">Total Visitor</p>
                                        <h2 class="mb-0">8210</h2>
                                    </div>
                                    <div class="ml-auto align-self-end">
                                        <p class="mb-0 font-14 text-danger"><i class='bx bxs-down-arrow-circle'></i>
                                            <span>52% From Last Week</span>
                                        </p>
                                    </div>
                                </div>
                                <div id="chart7"></div>
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
    <script src="{{ asset('/') }}backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="{{ asset('/') }}backend/assets/js/widgets.js"></script>
@endpush
