<?php
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p style=\"padding-left:15px;margin:0\">" . $row['username'] . "</p>";
        }
    } else {
        echo "No users found.";
    }
    $conn->close();
?>
