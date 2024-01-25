@extends('Users.app')

@section('content')

    <div class="container-fluid p-4">

        <h1 class="h3 mb-3"><strong>Messaging</strong></h1>

        <div class="row">
            <div class="col-md-8 mx-auto"> <!-- Center the chat on larger screens -->
                <div class="card message-card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title">Admin</h5>
                    </div>
                    <div class="card-body">
                        <!-- Messages from Admin -->
                        <div class="message admin">
                            <div class="message-content">
                                <p class="admin-message">
                                    <i class="fa fa-user-circle admin-icon"></i>
                                    Hello! How can I assist you today?
                                </p>
                                <small class="message-info">Admin | January 22, 2024, 10:30 AM</small>
                            </div>
                        </div>

                        <!-- Example: Message from User -->
                        <div class="message user float-right">
                            <div class="message-content">
                                <p class="user-message">
                                    Hi Admin! I have a question regarding my rent payment
                                    <i class="fa fa-user user-icon"></i>.
                                </p>
                                <small class="message-info">User | January 22, 2024, 10:45 AM</small>
                            </div>
                        </div>

                        <!-- Add more messages as needed -->

                        <!-- Message Input Box -->
                        <div class="input-group mt-3">
                            <textarea class="form-control" placeholder="Type your message..."></textarea>
                            <button class="btn btn-primary" type="button">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        .message-card {
            height: 100%;
        }

        .message {
            margin-bottom: 10px; /* Add spacing between messages */
            clear: both; /* Clear float to prevent layout issues */
        }

        .admin-message,
        .user-message {
            position: relative; /* Relative positioning for absolute positioning of message info */
            background-color: #d1ecf1; /* Set the default background color for messages */
            color: #0c5460; /* Set the default text color for messages */
            padding: 10px;
            border-radius: 8px;
            display: flex;
            align-items: center; /* Align icon and text vertically */
            margin-bottom: 0.5px; /* Add spacing between main message and info */
        }

        .admin-message .message-info,
        .user-message .message-info {
            position: absolute;
            bottom: 0;
            font-size: 12px;
            color: #6c757d; /* Set the color for message info */
            margin-top: 0.5px; /* Add spacing between info and next message */
        }

        .user-message {
            background-color: #ffe6e6; /* Set the background color for user messages */
            color: #721c24; /* Set the text color for user messages */
        }

        .admin-icon {
            margin-right: 8px; /* Adjust margin to separate icon from text */
            font-size: 20px;
        }

        .user-icon {
            padding: 5px;
            margin-left: 5px; /* Adjust margin to separate icon from text */
            border-radius: 50%;
        }

        .float-right {
            float: right;
        }

        /* Additional styling for smaller text */
        .message-info {
            font-size: 10px;
            color: #868686;
        }
    </style>

@endsection
