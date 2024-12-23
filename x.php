<?php
session_start(); 

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: app/view/home.php");
    exit();
}

$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    include('checklogin.php');
    $error_message = checkLogin($username, $password);

    if ($error_message == 'success') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username; 

        header("Location: app/view/home.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public\bootstrap\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
    <!-- Liên kết đến file CSS -->
    <link rel="stylesheet" href="index.css">
   
</head>
<body>
    <!-- Header và Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="public/imgae/logo1.png" alt="P-Cinema Logo">
                    <span class="logo-text ms-3">PTIT_CRM </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">Về Chúng Tôi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Dịch Vụ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Sản Phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Góp ý</a></li>

                    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                        <li class="nav-item">
                            <form method="POST" action="logout.php">
                                <button type="submit" class="btn btn-danger ms-2">Đăng xuất</button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <button class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng nhập</button>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- About Section-->
    <!-- About Section-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Về Quản Lý Khách Hàng</h2>
                    <hr class="divider divider-light"/>
                    <p class="text-white-75 mb-4">Quản lý khách hàng là một phần quan trọng trong việc xây dựng mối quan hệ lâu dài với khách hàng, giúp nâng cao hiệu quả kinh doanh và cải thiện dịch vụ.</p>
                    <a class="btn btn-light btn-xl" href="#services">Khám Phá Các Dịch Vụ Quản Lý Khách Hàng</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Dịch Vụ Quản Lý Khách Hàng</h2>
            <hr class="divider"/>
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-person-lines-fill fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Quản Lý Thông Tin Khách Hàng</h3>
                        <p class="text-muted mb-0">Lưu trữ và quản lý thông tin khách hàng một cách hiệu quả, dễ dàng truy xuất.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-file-earmark-check fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Lịch Sử Giao Dịch</h3>
                        <p class="text-muted mb-0">Theo dõi lịch sử giao dịch của khách hàng để đưa ra các chiến lược phù hợp.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-bar-chart-line fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Phân Tích Hành Vi Khách Hàng</h3>
                        <p class="text-muted mb-0">Cung cấp các báo cáo phân tích hành vi khách hàng để tối ưu hóa trải nghiệm người dùng.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-bell fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Thông Báo Tự Động</h3>
                        <p class="text-muted mb-0">Gửi thông báo tự động cho khách hàng về các chương trình ưu đãi, giảm giá hoặc thông tin quan trọng.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Thống kê -->
    <div class="container mt-5">
        <?php
        require_once 'app/controller/StatisticsController.php';
        $controller = new StatisticsController();
        $controller->getTopCustomers(); 
        ?>
    </div>


    <!-- Modal  -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="index.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên tài khoản</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên tài khoản" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </form>
                    <?php if (!empty($error_message) && $error_message !== 'success'): ?>
                        <div class="alert alert-danger mt-3"><?php echo $error_message; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php include 'app/view/layout/footer.php'; ?>


    <script>
        // JavaScript to prevent modal from closing on invalid login
        var errorMessage = "<?php echo addslashes($error_message); ?>";
        if (errorMessage && errorMessage != 'success') {
            var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
            myModal.show(); // Reopen modal if there's an error message
        }
    </script>
</body>
</html>
