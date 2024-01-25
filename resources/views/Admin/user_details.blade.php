@extends('Admin.app')

@section('content')

    <style>
        /* Add your custom styles here */

        .main-content {
            background-color: #f0f0f0;
            padding: 20px;
            min-height: calc(100vh - 90px);
        }

        .main-content-inner {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .user-details-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 800px;
            margin: auto;
        }

        .user-avatar img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #e74c3c;
        }

        .user-pro {
            margin-left: 20px;
            text-align: left;
        }

        .user-pro h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .user-pro p {
            margin: 5px 0;
            color: #555;
            font-size: 16px;
        }

        .user-actions {
            margin-top: 20px;
        }

        .change-usertype label,
        .change-status label {
            display: block;
            margin-bottom: 5px;
            color: #777;
            font-size: 14px;
        }

        #usertypeDropdown,
        #statusSwitch {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            font-size: 14px;
            color: #555;
        }

        #changeUsertypeBtn,
        #changeStatusBtn {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
            width: 100%;
        }

        #changeUsertypeBtn:hover,
        #changeStatusBtn:hover {
            background-color: #c0392b;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #e74c3c;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
    </style>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="user-details-container">
                <div class="user-avatar">
                    <img src="https://cdn1.vectorstock.com/i/1000x1000/51/05/male-profile-avatar-with-brown-hair-vector-12055105.jpg" alt="User Avatar">
                </div>
                <div class="user-pro">
                    <h2>{{ $users->name }}</h2>
                    <p>Email: {{ $users->email }}</p>
                    <p>User Type: {{ $users->usertype }}</p>
                    <p>Status: {{ $users->status }}</p>
                    <div class="user-actions">
                        <div class="change-usertype">
                            <form action="{{ route('usertype_change', ['id' => $users->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="usertypeDropdown">Change User Type:</label>
                                <select id="usertypeDropdown" name="newUsertype">
                                    @foreach(['admin', 'user'] as $role)
                                        <option value="{{ $role }}" {{ $users->usertype == $role ? 'selected' : '' }}>
                                            {{ ucfirst($role) }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" id="changeUsertypeBtn">Change</button>
                            </form>

                        </div>
                        <div class="change-status">
                            <form action="{{ route('status_change', ['id' => $users->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label>Change Status:</label>
                                <select id="usertypeDropdown" name="isActive">
                                    @foreach(['pending', 'active', 'suspended'] as $role)
                                        <option value="{{ $role }}" {{ $users->status == $role ? 'selected' : '' }}>
                                            {{ ucfirst($role) }}
                                        </option>
                                    @endforeach
                                </select>

                                <button type="submit" id="changeStatusBtn"> Change </button>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Your existing scripts -->

    <script>
        // Add your JavaScript code for handling user actions
        $(document).ready(function () {
            // Example event listener for changing usertype
            $("#changeUsertypeBtn").on("click", function () {
                var selectedUsertype = $("#usertypeDropdown").val();
                // Implement logic to update usertype
                // You can use AJAX to send a request to update the database
            });

            // Example event listener for changing status
            $("#changeStatusBtn").on("click", function () {
                var isActive = $("#statusSwitch").prop("checked");
                // Implement logic to update status
                // You can use AJAX to send a request to update the database
            });
        });
    </script>

@endsection
