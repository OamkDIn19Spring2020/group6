<div class="modal fade" id="feedbackModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <?php echo $message ?>
                </p>
            </div>
            <div class="modal-footer">
                <a href=<?php echo $return_url; ?>><button type="button">Close</button></a>
            </div>
        </div>
    </div>
</div>

<script>
$('#feedbackModal').modal('toggle');
</script>