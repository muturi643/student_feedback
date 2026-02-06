<?php
session_start();
include 'db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle Status Update
if (isset($_GET['resolve'])) {
    $id = $_GET['resolve'];
    $conn->query("UPDATE complaints SET status='Resolved' WHERE id=$id");
    header("Location: dashboard.php");
}

// Fetch Complaints
$sql = "SELECT * FROM complaints ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: sans-serif; padding: 20px; background: #f4f4f9; }
        table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #007bff; color: white; }
        tr:hover { background-color: #f1f1f1; }
        .status-pending { color: orange; font-weight: bold; }
        .status-resolved { color: green; font-weight: bold; }
        .btn { padding: 5px 10px; text-decoration: none; color: white; border-radius: 4px; font-size: 14px; }
        .btn-resolve { background-color: #28a745; }
        .btn-logout { float: right; background-color: #dc3545; margin-bottom: 20px; }
    </style>
</head>
<body>
    <a href="logout.php" class="btn btn-logout">Logout</a>
    <h2>Complaint Dashboard</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Message</th>
                <th>User</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['category']); ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
                <td><?php echo $row['is_anonymous'] ? '<span style="color:gray; font-style:italic;">Anonymous</span>' : 'Student'; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <span class="<?php echo ($row['status'] == 'Resolved') ? 'status-resolved' : 'status-pending'; ?>">
                        <?php echo $row['status']; ?>
                    </span>
                </td>
                <td>
                    <?php if($row['status'] == 'Pending'): ?>
                        <a href="dashboard.php?resolve=<?php echo $row['id']; ?>" class="btn btn-resolve">Mark Resolved</a>
                    <?php else: ?>
                        Done
                    <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>