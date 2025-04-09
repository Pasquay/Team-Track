<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "test_user";
$password = "Pass!123";
$dbname = "test_db";

$conn = new mysqli($host, $username, $password, $dbname);
if($conn->connect_error){
	die("Connection failed: $conn->connect_error");
}
echo "CONNECTED SUCCESFULLY";

$table = "test_table";
$stmt = $conn->prepare("SELECT * FROM $table");
$stmt->execute();
$result = $stmt->get_result();

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Created At</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
    echo "<td>" . htmlspecialchars($row['password']) . "</td>";
    echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
    echo "</tr>";
}

echo "</table>";

$stmt->close();
$conn->close();
?>
