@extends('Admin.app')

@section('content')

    <style>
        .card {
            border: none; /* Remove border */
            transition: transform 0.2s; /* Add a smooth transition effect on hover */
        }

        .card:hover {
            transform: scale(1.05); /* Enlarge the card slightly on hover */
        }

        .card-body {
            background: #1cbb8c;
            color: #fff; /* Set text color to white */
        }

        .card-title {
            color: #fff; /* Set title color to white */
        }

        .card-text {
            color: #fff; /* Set text color to white */
        }

        .btn-primary {
            background-color: #155d42; /* Set button background color */
            border-color: #155d42; /* Set button border color */
        }

        .btn-primary:hover {
            background-color: #155d42; /* Set button background color on hover */
            border-color: #155d42; /* Set button border color on hover */
        }
    </style>

    <div class="main-content">
        <!-- Page title area end -->
        <div class="main-content-inner">
            <div class="card-area">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="card card-bordered">
                            <div class="card-body">
                                <h5 class="card-title">Users</h5>
                                <p class="card-text"><i class="fa fa-users"></i></p>
                                <a href="{{route('users')}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Repeat the structure for other cards with different titles, icons, and links -->

                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="card card-bordered">
                            <div class="card-body">
                                <h5 class="card-title">Bookings</h5>
                                <p class="card-text"><i class="fa fa-calendar-check"></i></p>
                                <a href="{{route('PropertyBook')}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Repeat the structure for other cards with different titles, icons, and links -->

                    <div class="col-lg-4 col-md-6 mt-5">
                        <div class="card card-bordered">
                            <div class="card-body">
                                <h5 class="card-title">Permissions</h5>
                                <p class="card-text"><i class="fa fa-key"></i></p>
                                <a href="{{route('permissions')}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Repeat the structure for other cards with different titles, icons, and links -->
                </div>
            </div>
        </div>
    </div>
@endsection
