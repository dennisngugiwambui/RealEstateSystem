@extends('admin.app')

@section('content')

    <!-- Include the necessary CSS and JS files for Select2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
          integrity="sha512-WP/1aHxQq3s9RU4/FnHLNz6HnL60jqkB4NDLQA1v61fX3L+3sp91fYXoB2Pb8xXg8t3g5EIKBkso/g+EhBiHXwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-2EEIeAUCwTT2jQD3T5ytFz6/+nqFEx16L1LD5fj86xrke/yZVtWOrxJh+YtFQEZh12c2Vfo5T/FW8XaVj5+O8A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5%;
        }

        select.select2 {
            width: 300px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center mb-0">Apartment Information</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{route('UserAparments')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Apartment Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>




                            <div class="form-group">
                                <label for="county">County:</label>
                                <select class="select2" id="countySelect" name="county">
                                    <option value="" selected>Select County</option>
                                    <option value="Mombasa">Mombasa</option>
                                    <option value="Kwale">Kwale</option>
                                    <option value="Kilifi">Kilifi</option>
                                    <option value="Tana River">Tana River</option>
                                    <option value="Lamu">Lamu</option>
                                    <option value="Taita–Taveta">Taita–Taveta</option>
                                    <option value="Garissa">Garissa</option>
                                    <option value="Wajir">Wajir</option>
                                    <option value="Mandera">Mandera</option>
                                    <option value="Marsabit">Marsabit</option>
                                    <option value="Isiolo">Isiolo</option>
                                    <option value="Meru">Meru</option>
                                    <option value="Tharaka-Nithi">Tharaka-Nithi</option>
                                    <option value="Embu">Embu</option>
                                    <option value="Kitui">Kitui</option>
                                    <option value="Machakos">Machakos</option>
                                    <option value="Makueni">Makueni</option>
                                    <option value="Nyandarua">Nyandarua</option>
                                    <option value="Nyeri">Nyeri</option>
                                    <option value="Kirinyaga">Kirinyaga</option>
                                    <option value="Murang'a">Murang'a</option>
                                    <option value="Kiambu">Kiambu</option>
                                    <option value="Turkana">Turkana</option>
                                    <option value="West Pokot">West Pokot</option>
                                    <option value="Samburu">Samburu</option>
                                    <option value="Trans-Nzoia">Trans-Nzoia</option>
                                    <option value="Uasin Gishu">Uasin Gishu</option>
                                    <option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
                                    <option value="Nandi">Nandi</option>
                                    <option value="Baringo">Baringo</option>
                                    <option value="Laikipia">Laikipia</option>
                                    <option value="Nakuru">Nakuru</option>
                                    <option value="Narok">Narok</option>
                                    <option value="Kajiado">Kajiado</option>
                                    <option value="Kericho">Kericho</option>
                                    <option value="Bomet">Bomet</option>
                                    <option value="Kakamega">Kakamega</option>
                                    <option value="Vihiga">Vihiga</option>
                                    <option value="Bungoma">Bungoma</option>
                                    <option value="Busia">Busia</option>
                                    <option value="Siaya">Siaya</option>
                                    <option value="Kisumu">Kisumu</option>
                                    <option value="Homa Bay">Homa Bay</option>
                                    <option value="Migori">Migori</option>
                                    <option value="Kisii">Kisii</option>
                                    <option value="Nyamira">Nyamira</option>
                                    <option value="Nairobi">Nairobi</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>

                            <div class="form-group">
                                <label for="bedrooms">Bedrooms:</label>
                                <input type="text" class="form-control" id="bedroom" name="bedroom" required>
                            </div>

                            <div class="form-group">
                                <label for="bathroom">Bathroom:</label>
                                <input type="text" class="form-control" id="bathroom" name="bathroom" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="mainImage">Main Image:</label>
                                <input type="file" class="form-control-file" id="mainImage" name="mainImage" accept="image/*" required>
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="images">Additional Images (Hold Shift to select multiple):</label>--}}
{{--                                <input type="file" class="form-control-file" id="images" name="images[]" accept="image/*" multiple required>--}}
{{--                            </div>--}}


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="search-section">
                <!-- Add your search form here -->
                <div class="search-container" style="padding-top: 20px;">
                    <div class="input-group">
                        <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" name="search"
                               class="form-control" placeholder="Search by name or email">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="searchIcon">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fancy Table -->
            <div class="table-responsive">
                <table class="table user-table table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>County</th>
                        <th>Location</th>
                        <th></th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($booking as $booking)
                        <tr class="user-row">
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->county }}</td>
                            <td>
                                <span class="badge badge-info">{{ $booking->location }}</span>
                            </td>
                            <td>
                                <a href="{{ route('apartment_details', ['id' => $booking->id]) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Fancy Table -->


        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancytable/FancyTable/fancyTable.js"></script>

    <script>
        // All Table search script
        function FilterkeyWord_all_table() {
            // Count td if you want to search on all table instead of specific column
            var count = $('.table').children('tbody').children('tr:first-child').children('td').length;

            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("search_input_all");
            var input_value = document.getElementById("search_input_all").value;
            filter = input.value.toLowerCase();
            if (input_value != '') {
                table = document.querySelector(".table"); // Change to querySelector
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 1; i < tr.length; i++) {
                    var flag = 0;
                    for (j = 0; j < count; j++) {
                        td = tr[i].getElementsByTagName("td")[j];
                        if (td) {
                            var td_text = td.innerHTML;
                            if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
                                flag = 1;
                            } else {
                                // DO NOTHING
                            }
                        }
                    }
                    if (flag == 1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            } else {
                // RESET TABLE
                $('#maxRows').trigger('change');
            }
        }
    </script>


    <script>
        $(document).ready(function () {
            $("#countySelect").select2({
                placeholder: "Select County",
                allowClear: true
            });
        });
    </script>


@endsection
