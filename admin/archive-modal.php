<?php $archive = $function->getData('products', 'id', $row['id']); ?>

<!-- Enable Archive Modal -->
<div class="modal fade" id="enableModal_<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form method="post" action="<?php echo '?id=' . $row['id']; ?>" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel"> Enable product?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    <button type="submit" name="enable-product" class="btn btn-info waves-effect">YES</button>
                </div>
            </form>
        </div>
    </div>
</div>