<?php
require_once 'app/model/AnalyticsModel.php';

class StatisticsController {
    public function getTopCustomers() {
        $analyticsModel = new AnalyticsModel();
        $topCustomers = $analyticsModel->getTopCustomers();

        include 'app/view/statistics/thongketop10.php';
    }
}
?>
