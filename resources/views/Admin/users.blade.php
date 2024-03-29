@extends('Admin.app')

@section('content')

    <style>
        /* Add your custom styles here */

        .search-section {
            margin-bottom: 20px;
        }

        .user-table {
            width: 100%;
            margin-bottom: 20px;
            overflow-x: auto; /* Add this to enable horizontal scrolling on small screens */
        }

        .user-table thead tr {
            background-color: #1cbb8c;
            color: #fff;
            text-align: left;
        }

        .user-table th,
        .user-table td {
            padding: 10px; /* Adjust the padding to make cells smaller */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .user-table tbody tr:hover {
            background-color: rgba(28, 187, 140, 0.1);
        }

        .badge {
            display: inline-block;
            font-size: 12px;
            font-weight: normal;
            line-height: 1.2;
            padding: 3px 8px;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 3px;
        }

        .badge-primary {
            background-color: #1cbb8c;
            color: #fff;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .search-container {
            position: relative;
            margin-bottom: 20px;
        }

        #searchInput {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            font-size: 16px;
        }

        #searchIcon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

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

            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Permission</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Loop through your users data -->
                    @foreach($users as $user)
                        <tr data-id="{{ $user->id }}" class="user-row">
                            <td><a href="{{ route('user_details', ['id' => $user->id]) }}">{{ $user->id }}</a></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge badge-primary">{{ $user->usertype }}</span>
                            </td>
                            <td>
                                @if($user->status === 'active')
                                    <span class="badge badge-primary">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('user_details', ['id' => $user->id])}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

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



@endsection
