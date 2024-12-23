<?php
require_once __DIR__ . '/../../dbconnect.php';

class UserModel {
    private $conn;

    public function __construct() {
        $this->conn = dbConnect(); 
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM user Where role = 'user'"; 
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $users = [];
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
            return $users;
        } else {
            return [];
        }
    }

    // Thêm
    public function addUser($name, $email, $mobile, $address, $gender) {
        $sql = "INSERT INTO user (name, email, mobile, address, gender) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssss', $name, $email, $mobile, $address, $gender);
        $result = $stmt->execute();
        
        if ($result) {
            return true;  
        } else {
            return false;
        }
        $stmt->close();
    }

    // Cập nhật
    public function updateUser($Id, $name, $email, $mobile, $address, $gender) {
        $sql = "UPDATE user SET name = ?, email = ?, mobile = ?, address = ?, gender = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssssi', $name, $email, $mobile, $address, $gender, $Id);
        $result = $stmt->execute();
        
        if ($result) {
            return true;  
        } else {
            return false;
        }
        $stmt->close();
    }
    
    // Xóa
    public function deleteUser($Id) {
        $sql = "DELETE FROM user WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $Id);
        $result = $stmt->execute();
        
        if ($result) {
            return true;  
        } else {
            return false;
        }
        $stmt->close();
    }

}
?>
