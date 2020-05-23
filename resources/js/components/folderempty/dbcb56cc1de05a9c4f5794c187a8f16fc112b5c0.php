<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">  <?php echo trans('user::client.names', ['client' => $type]); ?> [<?php echo trans('user::client.text.preview', ['client' => $type]); ?>]</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm"  data-action='NEW' data-load-to='#user-client-entry' data-href='<?php echo guard_url('user/' . $type . '/create'); ?>'><i class="fa fa-plus-circle"></i> <?php echo e(trans('app.new')); ?> </button>
        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\website\resources\views/vendor/user/admin/default/new.blade.php ENDPATH**/ ?>