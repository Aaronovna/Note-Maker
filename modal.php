<?php
function modal($title, $description, $componentId) {
    return "
    <!-- The Modal -->
    <div id=\"myModal_$componentId\" class=\"modal\">

    <!-- Modal content -->
    <div class=\"modal-content\">
        <div class=\"modal-header\">
            <h1>Edit Note</h1>
            </div>
            <div class=\"modal-body\">
                <form action=\"\">
                    <div class=\"lbl-tf\">
                        <label for=\"Title\">Title</label>
                        <input type=\"text\" id=\"Title\" value=\"$title\">
                    </div>
                    <div class=\"flex-container-col\">
                        <textarea name=\"\" id=\"\" cols=\"30\" rows=\"10\">$description</textarea>
                        <div class=\"act-container\">
                        <button class=\"action box-shad\" id=\"myBtn_$componentId\">
                            <svg height=\"24\" viewBox=\"0 -960 960 960\" width=\"24\">
                            <path d=\"M840-680v480q0 33-23.5 56.5T760-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h480l160 160Zm-80 34L646-760H200v560h560v-446ZM480-240q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35ZM240-560h360v-160H240v160Zm-40-86v446-560 114Z\"/>
                            </svg>
                        </button>
                        <button type='button' class=\"close button action box-shad\" id=\"closeBtn_$componentId\">
                            <svg height=\"24\" viewBox=\"0 -960 960 960\" width=\"24\">
                            <path d=\"m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z\"/>
                            </svg>
                        </button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    // Get the modal and button specific to this component
    var modal_$componentId = document.getElementById(\"myModal_$componentId\");
    var btn_$componentId = document.getElementById(\"myBtn_$componentId\");
    var closeBtn_$componentId = document.getElementById(\"closeBtn_$componentId\");

    // When the user clicks the button, open the modal 
    btn_$componentId.onclick = function() {
        modal_$componentId.style.display = \"flex\";
    }

    // When the user clicks on <span> (x), close the modal
    closeBtn_$componentId.onclick = function() {
        modal_$componentId.style.display = \"none\";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', function(event) {
        if (event.target == modal_$componentId) {
            modal_$componentId.style.display = \"none\";
        }
    });
    </script>
    ";
}?>