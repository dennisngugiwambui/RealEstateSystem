@extends('admin.app')

@section('content')

    <style>
        /* styles.css */

        /* Responsive styling */
        @media (max-width: 768px) {
            .card-body {
                padding: 15px;
            }

            .card-body img {
                max-width: 100%;
                height: auto;
            }
        }

        /* Additional styling */
        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .card-header h2 {
            font-size: 24px;
        }

        .card-body {
            padding: 30px;
        }

        .card-body h4 {
            color: #333;
        }

        .card-body p {
            color: #777;
        }

        .card-body h5 {
            color: #333;
        }

        .list-inline-item i {
            margin-right: 10px;
        }

        /* Skills section */
        .skills-container {
            margin-top: 20px;
        }

        .skill-entry,
        .skill-details {
            display: inline-block;
            margin-bottom: 10px;
        }

        .skill-entry input,
        .skill-details textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }

    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2 class="text-center mb-0">User Profile</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="{{ asset('Users/static/img/avatars/avatar-4.jpg') }}" alt="User Avatar"
                                     class="img-fluid rounded-circle mb-3 profile-avatar">
                            </div>
                            <div class="col-md-8">
                                <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                                <p class="text-muted">{{ auth()->user()->email }}</p>

                                <div class="mt-4">
                                    <h5>About Me</h5>
                                    <p class="text-secondary">No information available.</p>
                                </div>

                                <div class="mt-4">
                                    <h5>Contact Information</h5>
                                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                                    <p><strong>Phone:</strong> {{ auth()->user()->phone ?? 'Not provided' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">

                            <ul class="list-inline">
                                <li class="list-inline-item badge badge-pill badge-success">I am</li>
                                <li class="list-inline-item badge badge-pill badge-success">the </li>
                                <li class="list-inline-item badge badge-pill badge-success">Admin</li>
                            </ul>
                        </div>

                        <div class="mt-4">
                            <h5>Social Media</h5>
                            <ul class="list-inline social-media-icons">
                                <li class="list-inline-item"><i class="fa fa-facebook"></i></li>
                                <li class="list-inline-item"><i class="fa fa-whatsapp"></i></li>
                                <li class="list-inline-item"><i class="fa fa-phone"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
