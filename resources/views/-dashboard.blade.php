<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .stat-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .stat-card h3 {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Admin Dashboard</h1>

        <div class="row text-center">
            <div class="col-md-3">
                <div class="stat-card">
                    <h3>Total Users</h3>
                    <p><strong>{{ $totalUsers }}</strong></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h3>Total Courses</h3>
                    <p><strong>{{ $totalCourses }}</strong></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h3>Total Enrollments</h3>
                    <p><strong>{{ $totalEnrollments }}</strong></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <h3>Total Revenue</h3>
                    <p><strong>${{ number_format($totalRevenue, 2) }}</strong></p>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h2>Quick Links</h2>
            <div class="list-group">
                <a href="{{ route('dashboard.courses') }}" class="list-group-item list-group-item-action">Manage Courses</a>
                <a href="{{ route('dashboard.users') }}" class="list-group-item list-group-item-action">Manage Users</a>
                <a href="{{ route('dashboard.payments') }}" class="list-group-item list-group-item-action">View Payments</a>
                <a href="{{ route('dashboard.reviews') }}" class="list-group-item list-group-item-action">View Reviews</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
