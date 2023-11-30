<?php
    include 'notecard.php';
    include 'modal.php';

    $num = 8;
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
                <form action="">
                    <div class="lbl-tf">
                        <label for="Title">Title</label>
                        <input type="text" id="Title">
                    </div>
                    <div class="flex-container-col">
                        <textarea name="" id="" cols="30" rows="10"></textarea>
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
                    if (false) {
                        echo '<p>No Notes Recorded</p>';
                    }
                    else{
                        for ($i=0; $i < $num; $i++) { 
                            echo noteCard("My Title ".$i+1, "Lorem ipsum description", $i);
                        }
                    }
                    
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <p class="center">ITSP1-A CRUD OPERATION - ARON III, RICARDO BSIT3108 2023</p>
    </div>

    <?php
        for ($i=0; $i < $num; $i++) { 
            echo modal("My Title ".$i+1, "Lorem ipsum description", $i);
        }        
    ?>

</body>
</html>