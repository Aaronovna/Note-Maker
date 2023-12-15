<?php
    include_once 'connection.php';
    
    $id = "";
    $eTitle = "";
    $eDescription = "";


    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST['mfhd'])) {
            //Modal form hidden field
        }
        else {
            $id = $_POST['mfhd'];
        }

        if (empty($_POST['mftext' . $id])) {
            //$eTitleErr = "Title is required!";
        }
        else {
            $eTitle = $_POST['mftext' . $id];
        }

        if (empty($_POST['mftextarea' . $id])) {
            //$eDescriptionErr = "Description is required!";
        }
        else {
            $eDescription = $_POST['mftextarea' . $id];
        }

        //echo "<script>alert(\"$id $eTitle $eDescription\")</script>";
        if ($eTitle && $eDescription) {
            $query = mysqli_query($connect, "UPDATE notes_tbl SET title = '$eTitle', description = '$eDescription' WHERE id = $id ");
    
            echo "<script>window.location.href = 'index.php'</script>";
        }
    }
?>