<!-- reg modal -->
<div class="modal" id="feedbackModal">
    <div class="modal-content">
        <a href=<?php echo $return_url; ?>><button class="close" type="button">&times;</button></a>
        <!-- <span  class="close">&times;</span> -->
        <p><?php echo $message ?></p>
    </div>
    <script>
    // Get the modal
    var modal = document.getElementById("feedbackModal");

    // Get the button that opens the modal
    var btn = document.getElementById("register-button");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</div>