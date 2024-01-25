@extends('Users.app')

@section('content')




    <div class="container-fluid">

        <h1 class="h3 mb-3"><strong>Tenants</strong> Dashboard</h1>

        <!-- Tenant Booking Form -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title"><i class="fa fa-plus-circle me-2"></i> Book Apartment</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <div class="input-group">
                                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}" readonly>
                                    <button type="button" class="btn btn-secondary" id="editPhoneBtn">Edit</button>
                                    <button type="button" class="btn btn-success" id="updatePhoneBtn" style="display: none;">Update</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                            </div>

                            <!-- Responsive Layout Adjustments -->
                            <div class="d-md-flex">
                                <div class="mb-3 me-md-3">
                                    <label for="apartmentName" class="form-label">Apartment Name</label>
                                    <select class="form-select apartment" id="apartment" name="apartment" onchange="updateRoomOptions(this.value)">
                                        <option value="" selected>Select Apartment</option>
                                        <option value="apartment1">Apartment 1</option>
                                        <option value="apartment2">Apartment 2</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>

                                <div class="mb-3 me-md-3">
                                    <label for="room" class="form-label">Room</label>
                                    <select class="form-select" id="room" name="room">
                                        <option value="" selected>Select Room</option>
                                        <!-- Options will be dynamically updated using JavaScript -->
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" value="$1500" readonly>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="from" class="form-label">From</label>
                                <input type="date" class="form-control" id="from" name="from" required>
                            </div>






                            <!-- Add more fields as needed -->

                            <button type="submit" class="btn btn-success"><i class="fa fa-check me-2"></i> Book Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



        <!-- Booked Apartments Card -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h5 class="card-title"><i class="fa fa-list-alt me-2"></i> Booked Apartments</h5>
                    </div>
                    <div class="card-body">
                        <!-- Individual Apartment Cards -->

                        <div class="card shadow mb-3" style="border-left: 5px solid #28a745;">
                            <div class="card-header bg-dark text-white">
                                <h5 class="card-title"><i class="fa fa-home me-2"></i> Apartment 1</h5>
                            </div>
                            <div class="card-body">
                                <p>Status: <span class="badge bg-success"><i class="fa fa-check me-2"></i> Active</span></p>
                                <p>Booked Date: January 1, 2024</p>
                                <p>Room: A101</p>
                                <p>Price: $1500</p>
                            </div>
                        </div>

                        <div class="card shadow mb-3" style="border-left: 5px solid #dc3545;">
                            <div class="card-header bg-dark text-white">
                                <h5 class="card-title"><i class="fa fa-home me-2"></i> Apartment 2</h5>
                            </div>
                            <div class="card-body">
                                <p>Status: <span class="badge bg-danger"><i class="fa fa-times me-2"></i> Inactive</span></p>
                                <p>Booked Date: January 2, 2024</p>
                                <p>Room: B202</p>
                                <p>Price: $1800</p>
                            </div>
                        </div>
                        <!-- Add more cards as needed -->
            </div>
        </div>

    </div>



            <script>
                document.getElementById('editPhoneBtn').addEventListener('click', function() {
                    document.getElementById('phone').readOnly = false;
                    document.getElementById('phone').focus();
                    document.getElementById('editPhoneBtn').style.display = 'none';
                    document.getElementById('updatePhoneBtn').style.display = 'inline-block';
                });

                document.getElementById('updatePhoneBtn').addEventListener('click', function() {
                    document.getElementById('phone').readOnly = true;
                    document.getElementById('editPhoneBtn').style.display = 'inline-block';
                    document.getElementById('updatePhoneBtn').style.display = 'none';
                });
            </script>



            <script>
                window.onload = function() {
                    updateRoomOptions(document.getElementById('apartment').value);
                };

                function updateRoomOptions(selectedApartment) {
                    const vacantRooms = {
                        apartment1: ['A101', 'A102', 'A103'],
                        apartment2: ['B201', 'B202', 'B203'],
                        // Add more options as needed
                    };

                    const roomSelect = document.getElementById('room');
                    roomSelect.innerHTML = ''; // Clear existing options

                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.text = 'Select Room';
                    defaultOption.selected = true;
                    defaultOption.disabled = true;
                    roomSelect.appendChild(defaultOption);

                    if (selectedApartment && vacantRooms[selectedApartment]) {
                        vacantRooms[selectedApartment].forEach(room => {
                            const option = document.createElement('option');
                            option.value = room;
                            option.text = room;
                            roomSelect.appendChild(option);
                        });
                        roomSelect.disabled = false;
                    } else {
                        roomSelect.disabled = true;
                    }

                    // Debugging: Log selected apartment and vacant rooms to console
                    console.log('Selected Apartment:', selectedApartment);
                    console.log('Vacant Rooms:', vacantRooms[selectedApartment]);
                }







            </script>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>






            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

            <script type="text/javascript">

                $("#apartment").select2({
                    placeholder: "Select a Name",
                    allowClear: true
                });
                $("#room").select2({
                    placeholder: "Select a Name",
                    allowClear: true
                });
            </script>






@endsection
