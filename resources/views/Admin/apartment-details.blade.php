@extends('Admin.app')

@section('content')

    <style>
        .card-img-top {
            max-height: 400px;
            object-fit: cover;
        }

        @media (max-width: 576px) {
            /* Sizing adjustments for mobile devices */
            .card-img-top {
                max-height: 200px;
            }
        }
    </style>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">

                <!-- Apartment Details -->
                <div class="card mb-4">
                    <img src="{{ asset('imagename/' . $booking->mainImage) }}" class="card-img-top rounded-top img-fluid" alt="Apartment Image">
                    <div class="card-body">
                        <h3 class="card-title">{{ $booking->name }}</h3>
                        <p class="card-text">{{ $booking->description }}</p>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>County:</strong> {{ $booking->county }}</li>
                            <li class="list-group-item"><strong>Location:</strong> {{ $booking->location }}</li>
                            <li class="list-group-item"><strong>Bedrooms:</strong> {{ $booking->bedroom }}</li>
                            <li class="list-group-item"><strong>Bathroom:</strong> {{ $booking->bathroom }}</li>
                            <!-- Add more attributes as needed -->
                        </ul>
                        <div class="text-center">
                            <a href="" class="btn btn-info">
                                <i class="fa fa-edit"></i> Edit Apartment
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Add Rooms and Prices Section -->
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Manage Rooms and Prices</h3>

                        <!-- Room and Price Form -->
                        <form action="{{ route('ApartmentDetail', ['id'=>$booking->id]) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="room" class="form-label">Room</label>
                                <input type="text" class="form-control" id="room" name="room" required>
                            </div>
                            <div class="mb-3">
                                <label for="room_price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="room_price" name="price" required>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add Room</button>
                        </form>

                        <!-- Existing Rooms and Prices Table -->
                        <table class="table table-striped table-bordered mt-4">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Room Number</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rooms as $room)
                                <tr>
                                    <td>{{ $room->room }}</td>
                                    <td>Ksh.{{ $room->price }}</td>
                                    <td>
                                        @if($room->status == 'available')
                                            <span class="badge badge-success">{{ $room->status }}</span>
                                        @elseif($room->status == 'occupied')
                                            <span class="badge badge-danger">{{ $room->status }}</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $room->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- Manage Images Section -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title mb-4">Manage Images</h3>

                        <!-- Image Upload Form -->
                        <form action="{{route('ApartmentImages', ['id'=>  $booking->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="images" class="form-label">Upload Images</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple required>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> Upload Images</button>
                        </form>

                        <!-- Display Uploaded Images -->
{{--                        @if($booking->images->count() > 0)--}}
                        <!-- Fancy Image Carousel Section -->
                        <!-- Fancy Image Carousel Section -->
                        <h5 class="mt-4">Uploaded Images:</h5>

                        @if($images->count() > 0)
                            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('ApartmentImages/' . $image->image) }}" class="d-block w-100 img-fluid" style="max-height: 400px;" alt="Apartment Image">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @else
                            <div class="text-center bg-light p-3 mt-4">
                                <p class="mb-0">No images uploaded for this apartment.</p>
                            </div>
                        @endif

                        {{--                        @else--}}
{{--                            <p class="mt-4">No images uploaded for this apartment.</p>--}}
{{--                        @endif--}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        /* Existing styles... */
    </style>

@endsection
