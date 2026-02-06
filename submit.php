<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $conn->real_escape_string($_POST['category']);
    $message = $conn->real_escape_string($_POST['message']);
    // Check if anonymous checkbox is checked
    $is_anonymous = isset($_POST['is_anonymous']) ? 1 : 0;

    $sql = "INSERT INTO complaints (category, message, is_anonymous) VALUES ('$category', '$message', '$is_anonymous')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Complaint submitted successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>