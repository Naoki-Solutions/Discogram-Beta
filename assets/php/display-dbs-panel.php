
    <?php
    $sql = "SHOW TABLES";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . $row["Tables_in_discogram"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay tablas en la base de datos.";
    }

    mysqli_close($conn);
    ?>

