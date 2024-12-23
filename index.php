<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PCRM_Quản lý khách hàng</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="public\bootstrap\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css\styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="public\imgae\logo1.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Chuyển đổi điều hướng">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Dịch vụ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Liên hệ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
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


        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Chào mừng đến với cửa hàng của chúng tôi!</div>
                <div class="masthead-heading text-uppercase">Khám phá sản phẩm tuyệt vời ngay hôm nay</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#services">Các dịch vụ phổ biến</a>
            </div>
        </header>

         <!-- Thống kê -->
        <div class="container mt-5">
            <?php
            require_once 'app/controller/StatisticsController.php';
            $controller = new StatisticsController();
            $controller->getTopCustomers(); 
            ?>
        </div>


        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Sản Phẩm Của Chúng Tôi</h2>
                    <h3 class="section-subheading text-muted">Khám phá các sản phẩm chất lượng cao dành cho bạn.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Thiết bị công nghệ</h4>
                        <p class="text-muted">Cập nhật những sản phẩm công nghệ mới nhất, đáp ứng nhu cầu làm việc và giải trí.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-tshirt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Thời trang hiện đại</h4>
                        <p class="text-muted">Bộ sưu tập thời trang thời thượng, giúp bạn nổi bật trong mọi hoàn cảnh.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-gift fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Quà tặng ý nghĩa</h4>
                        <p class="text-muted">Những món quà độc đáo, mang lại niềm vui và sự bất ngờ cho người thân yêu.</p>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Liên Hệ Với Chúng Tôi</h2>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * Mẫu form liên hệ SB * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- Mẫu form này đã được tích hợp sẵn với SB Forms.-->
                <!-- Để làm cho form này hoạt động, đăng ký tại-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- để nhận token API!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Input tên-->
                                <input class="form-control" id="name" type="text" placeholder="Tên của bạn *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">Cần có tên.</div>
                            </div>
                            <div class="form-group">
                                <!-- Input email-->
                                <input class="form-control" id="email" type="email" placeholder="Email của bạn *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">Cần có email.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email không hợp lệ.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Input số điện thoại-->
                                <input class="form-control" id="phone" type="tel" placeholder="Số điện thoại của bạn *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Cần có số điện thoại.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Input tin nhắn-->
                                <textarea class="form-control" id="message" placeholder="Tin nhắn của bạn *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Cần có tin nhắn.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Tin nhắn thành công khi gửi-->
                    <!---->
                    <!-- Đây là thông báo mà người dùng sẽ thấy khi form-->
                    <!-- được gửi thành công-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Gửi form thành công!</div>
                            Để kích hoạt form này, hãy đăng ký tại
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Tin nhắn lỗi khi gửi-->
                    <!---->
                    <!-- Đây là thông báo mà người dùng sẽ thấy khi có lỗi-->
                    <!-- khi gửi form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Lỗi khi gửi tin nhắn!</div></div>
                    <!-- Nút gửi-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Gửi Tin Nhắn</button></div>
                </form>
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; PCRM</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Chính sách chung</a>
                        <a class="link-dark text-decoration-none" href="#!">Điều khoản sử dụng</a>
                    </div>
                </div>
            </div>
        </footer>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
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
