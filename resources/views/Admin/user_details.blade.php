@extends('Admin.app')

@section('content')

    <!-- Your existing styles and HTML -->

    <div class="main-content">
        <div class="main-content-inner">
            <!-- Your existing content -->

            <div class="user-details-container">
                <div class="user-avatar">
                    <img src="path_to_avatar_image" alt="User Avatar">
                </div>
                <div class="user-profile">
                    <h2>{{ $name }}</h2>
                    <p>Email: {{ $email }}</p>
                    <p>User Type: {{ $usertype }}</p>
                    <p>Status: {{ $status }}</p>
                    <div class="user-actions">
                        <div class="change-usertype">
                            <label for="usertypeDropdown">Change User Type:</label>
                            <select id="usertypeDropdown">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            <button id="changeUsertypeBtn">Change</button>
                        </div>
                        <div class="change-status">
                            <label>Change Status:</label>
                            <label class="switch">
                                <input type="checkbox" id="statusSwitch">
                                <span class="slider round"></span>
                            </label>
                            <button id="changeStatusBtn">Change</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Your existing scripts -->

    <script>
        // Add your JavaScript code for handling user actions
        $(document).ready(function() {
            // Example event listener for changing usertype
            $("#changeUsertypeBtn").on("click", function() {
                var selectedUsertype = $("#usertypeDropdown").val();
                // Implement logic to update usertype
                // You can use AJAX to send a request to update the database
            });

            // Example event listener for changing status
            $("#changeStatusBtn").on("click", function() {
                var isActive = $("#statusSwitch").prop("checked");
                // Implement logic to update status
                // You can use AJAX to send a request to update the database
            });
        });
    </script>

@endsection
