<div class="form-group text-right">
    <a href="<?= base_url('Admin/PPU/Detail/' . $value[0]->no_ppu . ' ') ?>" class="btn btn-default btn-success">Back</a>
</div>
<?php foreach ($value as $value) { ?>
    <img src="<?= base_url($value->path) ?>" style="width:50%;height:50%;" class="img-thumbnail img-responsive">
<?php } ?>
