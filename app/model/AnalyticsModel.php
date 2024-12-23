<?php
// app/model/AnalyticsModel.php
require_once 'dbconnect.php'; 

class AnalyticsModel {
    private $conn;

    public function __construct() {
        $this->conn = dbConnect(); 
    }

    public function getTopCustomers() {
        if ($this->conn === null) {
            die("Kết nối cơ sở dữ liệu thất bại.");
        }

        $current_month = date('Y-m'); 

        $sql = "
            SELECT 
                u.name, 
                u.gender, 
                u.avatar,
                u.address,
                IFNULL(lp.points, 0) AS total_points
            FROM 
                user u
            LEFT JOIN 
                monthly_loyalty_points lp ON u.id = lp.user_id AND lp.month_year = ?
            ORDER BY 
                total_points DESC
            LIMIT 10;
        ";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("s", $current_month);

            $stmt->execute();

            $result = $stmt->get_result();

            $topCustomers = [];
            while ($row = $result->fetch_assoc()) {
                $topCustomers[] = $row;
            }

            $stmt->close();

            return $topCustomers;

        } else {
            echo "Lỗi truy vấn: " . $this->conn->error;
            return [];
        }
    }
}
?>
