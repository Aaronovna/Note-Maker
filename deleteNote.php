<?php
    include 'connection.php';

    $id = $idErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["noteID"])) {
            $idErr = "Title is required!";
        }
        else {
            $id = $_POST["noteID"];
        }
    }

    if ($id)
    {
        $query = mysqli_query($connect, "DELETE FROM notes_tbl WHERE id = $id");

        echo "<script>window.location.href = 'index.php'</script>";
    }
?>