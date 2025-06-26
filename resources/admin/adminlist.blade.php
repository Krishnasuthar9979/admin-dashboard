<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .profile-card {
            max-width: 500px;
            margin: 0 auto;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            max-width: 400px;
            margin: 0 auto;
        }

        .info-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item:last-child {
            border-bottom: none;
        }

        .info-item i {
            font-size: 1.2rem;
            color:rgb(8, 26, 54);
            width: 24px;
        }

        .info-item label {
            min-width: 80px;
            margin-bottom: 0;
        }

        .info-item span {
            color: #666;
            flex-grow: 1;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .profile-card {
                margin: 10px;
            }

            .info-item {
                flex-wrap: wrap;
            }

            .info-item label {
                min-width: 60px;
            }
        }
    </style>
</head>

<body class="bg-light">
    <!-- Bootstrap Icons -->
     
    <div class="container py-5">
        <div class="card shadow mx-auto profile-card">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="mb-0">Admin Profile</h4>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?w=100&h=100&fit=crop"
                alt="Admin Profile" class="profile-image rounded-circle mb-3">
                    <h5 class="card-title">{{ $admin->a_name }}</h5>
                </div>

                <div class="profile-info">
                    <div class="info-item">
                        <i class="bi bi-envelope"></i>
                        <label class="fw-bold">Email:</label>
                        <span>{{ $admin->a_email }}</span>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-lock"></i>
                        <label class="fw-bold">Password:</label>
                        <span>••••••••</span>
                        <button class="btn btn-sm btn-outline-secondary ms-2" onclick="togglePassword()">
                            Show/Hide
                        </button>
                    </div>

                    <div class="info-item">
                        <i class="bi bi-phone"></i>
                        <label class="fw-bold">Mobile:</label>
                        <span>+{{ $admin->a_mobileno }}</span>
                    </div>
                    <button class="btn btn-sm btn-primary me-1" style="text-align:center; padding:10px; width:30%; margin-left :78%;">
                       <i class="bi bi-pencil">  
                       <a href="/admin/adminedit/{{$admin->a_id}}" style="color:white;">
                                edit
                        </a>
                        </i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        function togglePassword() {
            const passwordSpan = document.querySelector('.info-item:nth-child(2) span');
            if (passwordSpan.textContent === '••••••••') {
                passwordSpan.textContent = '{{ $admin->a_password }}'; // This would normally come from your database
            } else {
                passwordSpan.textContent = '••••••••';
            }
        }
    </script>
</body>
</html>