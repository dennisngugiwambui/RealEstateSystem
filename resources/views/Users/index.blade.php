@extends('Users.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-fluid {
            padding: 20px;
        }

        .card {
            border: 1px solid #ddd;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card-text {
            color: #555;
            margin-bottom: 15px;
        }

        .card-text strong {
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Tenants</strong> Dashboard</h1>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <!-- Example property card -->
            <div class="col">
                <div class="card">
                    
                    <img src="{{ asset('Homepage/images/img_4.jpg') }}" class="card-img-top" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">Property Title</h5>
                        <p class="card-text">Property Details Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p class="card-text"><strong>Contact:</strong> Property Contact Info</p>
                        <a href="/book-property" class="btn btn-primary">Book</a>
                    </div>
                </div>
            </div>
            <!-- End of example property card -->

            <!-- Add more cards as needed -->

            <div class="col">
                <div class="card">
                    <img src="path/to/property-image.jpg" class="card-img-top" alt="Property Image">
                    <div class="card-body">
                        <h5 class="card-title">Property Title</h5>
                        <p class="card-text">Property Details Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p class="card-text"><strong>Contact:</strong> Property Contact Info</p>
                        <a href="#" class="btn btn-primary">Book</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
