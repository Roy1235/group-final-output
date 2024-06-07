<?php
include 'db_connection.php';

// Fetch applications
$sql = "SELECT id, name, age, birthday, address, position, created_at FROM applications";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f9;
        }
    </style>
</head>
<body>
    <h1>Submitted Job Applications</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Birthday</th>
            <th>Address</th>
            <th>Position</th>
            <th>Submitted At</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['birthday']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['position']}</td>
                        <td>{$row['created_at']}</td>
</tr>";
}
} else {
echo "<tr><td colspan='7'>No applications submitted yet.</td></tr>";
}
?>
</table>

</body>
</html>

