@extends('Users.app')

@section('content')

    <style>
        /* Additional CSS for enhanced visibility */
        .card-header-enhanced {
            padding: 10px;
            font-size: 1.2rem;
            color: #1cbb8c;
        }

        .card-title-enhanced {
            margin-bottom: 0;
        }

        .card-body-enhanced {
            padding: 15px;
        }

        .btn-enhanced {
            font-size: 1rem;
        }
        .text-white{
            color: white;
        }
    </style>


    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Tenants</strong> Dashboard</h1>

        <div class="row">
            <div class="col-md-6">
                <!-- Current Date and Time Card -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-dark text-white card-header-enhanced">
                        <h5 class="card-title card-title-enhanced" style="color: white;"><i class="fa fa-clock me-2"></i> {{ now()->format('F d, Y H:i A') }}</h5>
                    </div>
                </div>

                <!-- Rent Status Card -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-success text-white card-header-enhanced">
                        <h5 class="card-title card-title-enhanced" style="color: lightgoldenrodyellow;"><i class="fa fa-info-circle me-2"></i> Rent Status</h5>
                    </div>
                    <div class="card-body card-body-enhanced">
                        <p>Status: <span class="badge bg-success"><i class="fa fa-check me-2"></i> Cleared</span></p>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header bg-success text-white card-header-enhanced">
                        <h5 class="card-title card-title-enhanced" style="color: white;"><i class="fa fa-book-open me-2"></i> Read Rules</h5>
                    </div>
                    <div class="card-body text-center card-body-enhanced">
                        <a href="}" class="btn btn-warning btn-enhanced"><i class="fa fa-file-alt me-2"></i> Apartment Rules</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Rent Reminder Card -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-danger text-white card-header-enhanced">
                        <h5 class="card-title card-title-enhanced" style="color: white;"><i class="fa fa-bell me-2"></i> Rent Reminder</h5>
                    </div>
                    <div class="card-body card-body-enhanced">
                        <p>Due Date: January 31, 2024</p>
                    </div>
                </div>

                <!-- Download Receipts Card -->
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white card-header-enhanced">
                        <h5 class="card-title card-title-enhanced" style="color: white;"><i class="fa fa-download me-2" ></i> Download Receipts</h5>
                    </div>
                    <div class="card-body card-body-enhanced">
                        <!-- Receipt Search Form -->
                        <form>
                            <div class="mb-3">
                                <label for="paymentDate" class="form-label">Date of Payment</label>
                                <input type="date" class="form-control" id="paymentDate" name="paymentDate">
                            </div>
                            <button type="submit" class="btn btn-primary btn-enhanced"><i class="fa fa-search me-2"></i> Search Receipts</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Chart Card -->
    <div class="card shadow mb-4">
        <div class="card-header bg-info text-white card-header-enhanced">
            <h5 class="card-title card-title-enhanced" style="color: white;"><i class="fa fa-chart-bar me-2"></i> Monthly Overview</h5>
        </div>
        <div class="card-body card-body-enhanced">
            <!-- Chart Canvas -->
            <canvas id="monthlyOverviewChart" width="400" height="200"></canvas>
        </div>
    </div>
    </div>

    <!-- Add this in the head section -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- JavaScript for Chart.js -->
    <script>
        // Dummy Data for the Chart
        var chartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                type: 'line',
                label: 'Line Chart',
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 2,
                fill: false,
                data: [12, 19, 3, 5, 2, 3, 8, 7, 11, 15, 8, 10]
            }, {
                type: 'bar',
                label: 'Bar Chart',
                backgroundColor: 'rgb(255, 99, 132)',
                data: [10, 5, 20, 15, 25, 8, 12, 18, 6, 14, 10, 22]
            }]
        };

        // Chart Configuration
        var ctx = document.getElementById('monthlyOverviewChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
