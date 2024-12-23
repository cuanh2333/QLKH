<div class="container mt-5">
    <h2 class="text-center mb-4">Top 10 Khách Hàng Nổi Bật Nhất Tháng <?php echo date('m/Y'); ?> </h2>

    <!-- Carousel -->
    <div id="topCustomersCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
        <div class="carousel-inner">
            <?php if (!empty($topCustomers)): ?>
                <?php 
                    $chunks = array_chunk($topCustomers, 3);
                    foreach ($chunks as $index => $customersGroup): 
                ?>
                    <div class="carousel-item <?php echo $index == 0 ? 'active' : ''; ?>">
                        <div class="row">
                            <?php foreach ($customersGroup as $customerIndex => $customer): ?>
                                <?php 
                                    $globalIndex = $index * 3 + $customerIndex + 1;

                                    $badgeColor = '';
                                    if ($globalIndex == 1) {
                                        $badgeColor = 'gold';
                                    } elseif ($globalIndex == 2) {
                                        $badgeColor = '#808080';
                                    } elseif ($globalIndex == 3) {
                                        $badgeColor = '#CD7F32';
                                    } else {
                                        $badgeColor = 'lightgray';
                                    }
                                ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card shadow-sm" style="border: 3px solid <?php echo $badgeColor; ?>;">
                                        <div class="card-body">
                                            <div class="mb-3 text-center">
                                            <?php 
                                                $avatar_path = !empty($customer['avatar']) 
                                                    ? 'app/uploads/' . htmlspecialchars($customer['avatar']) 
                                                    : ($customer['gender'] === 'male' 
                                                        ? 'public/uploads/default_male.jpg' 
                                                        : 'public/uploads/default_female.jpg');
                                            ?>
                                            <img src="<?php echo $avatar_path; ?>" alt="Avatar" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                                            
                                        </div>
                                            <h5 class="card-title text-center">
                                                <?php echo htmlspecialchars($customer['name']); ?><br>
                                                <span style="font-size: 18px; color: gray;"><?php echo htmlspecialchars($customer['address']); ?></span>
                                            </h5>

                                            <p class="card-text text-center">Điểm tích lũy tháng: <strong><?php echo number_format($customer['total_points'], 2); ?></strong></p>
                                            <p class="text-center">Hạng: <strong>#<?php echo $globalIndex; ?></strong></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        Không có dữ liệu thống kê.
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <a class="carousel-control-prev" href="#topCustomersCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Trước</span>
        </a>
        <a class="carousel-control-next" href="#topCustomersCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sau</span>
        </a>
    </div>
</div>
