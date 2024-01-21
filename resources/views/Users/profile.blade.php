@extends('Users.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<div class="container-fluid">

    <h1 class="h3 mb-3"><strong>User Profile</strong></h1>

    <div class="row">
        <!-- Profile Card -->
        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    @if ($userImage = auth()->user()->profileImage)
                    <img src="{{ asset('imagename/' . Auth::user()->profileImage->image) }}" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                    @else
                    <img src="{{ asset('Users/static/img/avatars/avatar-4.jpg') }}" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                    @endif
                    
                    <h4 class="card-title">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </h4>
                    <p class="card-text">
                        <i class="fas fa-phone"></i> {{ Auth::user()->phone }}<br>
                        <i class="fas fa-envelope"></i> {{ Auth::user()->email }}
                    </p>
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeProfileImageModal">
                        Change Profile Image
                    </button> --}}
                </div>
            </div>
        </div>

<!-- Add your existing HTML content -->

<div class="col-md-8">
    <div class="card shadow">
        <div class="card-header">
            <h5 class="card-title">Additional Information</h5>
        </div>
        <div class="card-body">

            <!-- Display existing entries -->
            @foreach ($userDetails as $detail)
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ ucfirst($detail->entry) }}</h5>
                            <p class="card-text">{{ $detail->detail }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-primary">Update</a>
                                
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Form to add new entries -->
            <form action="{{ route('UserDetails') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="entry" class="form-label">Entry</label>
                    <select class="form-select" id="entry" name="entry">
                        <option value="about">About</option>
                        <option value="bio">Bio</option>
                        <option value="professionalism">Professionalism</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">Detail</label>
                    <textarea class="form-control" id="detail" name="detail" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>




<!-- Change Profile Image Modal -->
<div class="modal fade" id="changeProfileImageModal" tabindex="-1" role="dialog" aria-labelledby="changeProfileImageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeProfileImageModalLabel">Change Profile Image</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('upload.profile.image') }}" method="post" enctype="multipart/form-data">
                    @csrf
                
                    <div class="mb-3">
                        <label for="newProfileImage" class="form-label">Choose New Profile Image</label>
                        <input type="file" class="form-control-file" id="newProfileImage" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
                

            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
