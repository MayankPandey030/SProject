<?php
// Database connection
$host = 'localhost';
$dbname = 'online_voting';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check credentials
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voter_id = $_POST['voter_id'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM voters WHERE voter_id = :voter_id AND password = :password");
    $stmt->execute(['voter_id' => $voter_id, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        echo "Welcome, " . htmlspecialchars($voter_id) . "! Authentication successful.";
        // Redirect to voting module
        header("Location: modules/voter.php");
    } else {
        echo "Invalid credentials. Please try again.";
    }
}
?>
