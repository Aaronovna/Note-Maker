<?php
    include 'modal.php';
    include 'createNote.php';
    include 'updateNote.php';
    //include 'notecard.php';
    
    $titleErr = isset($_SESSION['titleErr']) ? $_SESSION['titleErr'] : "";
    $descriptionErr = isset($_SESSION['descriptionErr']) ? $_SESSION['descriptionErr'] : "";
    unset($_SESSION['titleErr']);
    unset($_SESSION['descriptionErr']);

    $status = checkcon();

    function noteCard($title, $description, $componentId) {
        return "
            <div class=\"note-card box-shad\">
                <p>$title</p>
                <hr />
                <p>$description</p>
                <form method=\"POST\" action=\"deleteNote.php\" class=\"hiddenform\">
                    <div class=\"act-container\">
                        <button type='button' class=\"action box-shad\" id=\"myBtn\">
                            <svg height=\"24\" viewBox=\"0 -960 960 960\" width=\"24\" id=\"myBtn_$componentId\">
                                <path d=\"M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z\"/>
                            </svg>

                        </button>
                        <input type=\"hidden\" name=\"noteID\" value=\"$componentId\">
                        <button class=\"action box-shad\">
                            <svg height=\"24\" viewBox=\"0 -960 960 960\" width=\"24\">
                                <path d=\"M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z\"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Note</title>
</head>
<body class="jc-center">
    <h1>Note Maker (CRUD)</h1>
    <div class="flex-container-row box-shad">
        <div class="flex-container-col w50">
            <div class="card">
                <h1 class="center">Editor</h1>
                <form method="POST" action="createNote.php">
                    <div class="lbl-tf">
                        <label for="t1">Title</label>
                        <input type="text" id="t1" name="title" value="<?php echo $title?>">
                    </div>
                    <div class="flex-container-col">
                        <span class="error center"><p><?php echo $titleErr;?></p></span>
                        <span class="error center"><p><?php echo $descriptionErr;?></p></span>
                        <textarea name="description" id="ta1" cols="30" rows="10" placeholder="Note description"><?php echo $description?></textarea>
                        <button class="box-shad">Add Note</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex-container-col w50">
            <div class="card">
                <h1 class="center">Notes</h1>
            </div>

            <div class="flex-container-row w50 center" style="padding: 10px; justify-content: center; flex-wrap: wrap;">
                <?php
                    $noteQuery = "SELECT * FROM notes_tbl";
                    $result= $connect->query($noteQuery);

                    if ($result->num_rows==0) {
                        echo '<p>No Notes Recorded</p>';
                    }
                    else{
                        for ( $x=0; $x<$result->num_rows;$x++) { 
                            $row = $result->fetch_assoc();
                            $noteID = $row["id"];
                            $noteTitle = $row["title"];
                            $noteDescription = $row["description"];

                            echo noteCard($noteTitle, $noteDescription, $noteID);
                        }
                    }
                    
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <p class="center">ITSP1-A CRUD OPERATION - ARON III, RICARDO BSIT3108 2023</p>
        <p class="center notif"> <?php echo $status ?></p>
    </div>

    <?php
        $noteQuery = "SELECT * FROM notes_tbl";
        $result= $connect->query($noteQuery);

        if (!($result->num_rows==0)) {
            for ( $x=0; $x<$result->num_rows;$x++) { 
                $row = $result->fetch_assoc();
                $noteID = $row["id"];
                $noteTitle = $row["title"];
                $noteDescription = $row["description"];

                echo modal($noteTitle, $noteDescription, $noteID);
            }
        }
    ?>

</body>
</html>

