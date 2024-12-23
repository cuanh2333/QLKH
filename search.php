<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['users'])) {
    echo json_encode([]); 
    exit();
}

$users = $_SESSION['users'];
$searchTerm = isset($_GET['term']) ? strtolower(trim($_GET['term'])) : '';

$filteredusers = array_filter($users, function ($user) use ($searchTerm) {
    return stripos($user['name'], $searchTerm) !== false
        || stripos($user['email'], $searchTerm) !== false
        || stripos($user['mobile'], $searchTerm) !== false
        || stripos($user['address'], $searchTerm) !== false;
});

// Trả về kết quả dạng JSON
echo json_encode(array_values($filteredusers));
exit();
?>
