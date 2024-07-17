<!-- Delete Admin Modal -->
<div class="modal fade" id="deleteModal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Delete
                </h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete
                    <b><?php echo $row['username']; ?></b>?
                </p>
            </div>
            <div class="modal-footer">
                <form method="post" action="<?php echo '?id=' . $row['id']; ?>">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="delete-admin" class="btn btn-info waves-effect">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>