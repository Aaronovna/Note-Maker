<?php
    include_once 'connection.php';
    session_start();

    $title = $description = "";
    $titleErr = $descriptionErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["title"])) {
            $titleErr = "Title is required!";
        }
        else {
            $title = $_POST["title"];
        }

        if (empty($_POST["description"])) {
            $descriptionErr = "Description is required!";
        }
        else {
            $description = $_POST["description"];
        }

    }

    if ($titleErr || $descriptionErr) {
        // Set error messages in session
        $_SESSION['titleErr'] = $titleErr;
        $_SESSION['descriptionErr'] = $descriptionErr;

        // Redirect back to index.php
        header("Location: index.php");
        exit;
    }

    if ($title && $description) {
        $query = mysqli_query($connect, "INSERT INTO notes_tbl(title, description) 
        VALUES('$title', '$description')");

        echo "<script>window.location.href = 'index.php'</script>";
    }
?>