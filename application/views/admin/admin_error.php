<div class="modal fade" id="feedbackModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content"
            style="background-color:#fefefe; color:black; padding:20px; border:8px solid #ff5500;">
            <div class="modal-body">
                <p style="color:black;">
                    <?php echo $message ?>
                </p>
            </div>
            <div class="modal-footer">
                <a href=<?php echo $return_url; ?>><button type="button" class="btn btn-primary" style="color: white;
    font-family: 'Play';
    font-weight: 700;
    border: 1px solid white;
    background-color: #ff5500;">Close</button></a>
            </div>
        </div>
    </div>
</div>

<script>
$('#feedbackModal').modal('toggle');
</script>