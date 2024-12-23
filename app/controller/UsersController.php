<?php
require_once __DIR__ . '/../model/UserModel.php';  

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function showUsers() {
        $users = $this->userModel->getAllUsers();
        $_SESSION['users'] = $users;
    }


    public function addUser($name, $email, $phone, $address, $gender) {
        if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($gender)) {
            $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin.";
            header('Location: ../view/home.php');
            exit();
        }
        if ($this->userModel->addUser($name, $email, $phone, $address, $gender)) {

            $_SESSION['message'] = "Thêm người dùng thành công";
        } else {
            $_SESSION['message'] = "Lỗi khi thêm người dùng";
        }
        header('Location: ../view/home.php');
        exit();
    }

    public function updateUser($id, $name, $email, $phone, $address, $gender) {
        if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($gender)) {
            $_SESSION['message'] = "Vui lòng điền đầy đủ thông tin.";
            header(header: 'Location: ../view/home.php');
            exit();
        }
        if ($this->userModel->updateUser($id, $name, $email, $phone, $address, $gender)) {
            $_SESSION['message'] = "Cập nhật người dùng thành công";
        } else {
            $_SESSION['message'] = "Lỗi khi cập nhật người dùng";
        }
        header('Location: ../view/home.php');
        exit();
    }

    public function deleteUser($id) {
        if ($this->userModel->deleteUser($id)) {
            $_SESSION['message'] = "Xóa người dùng thành công";
        } else {
            $_SESSION['message'] = "Lỗi khi xóa người dùng";
        }
        header('Location: ../view/home.php');
        exit();
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'addUser') {
        $userController = new UserController();
        $userController->addUser($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['gender']);
    } elseif ($action === 'updateUser') {
        $userController = new UserController();
        $userController->updateUser($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['gender']);
    } elseif ($action === 'deleteUser') {
        $userController = new UserController();
        $userController->deleteUser($_POST['id']);
    }
}

?>
