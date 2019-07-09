<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form method="post" action="<?= base_url('Logistik/PPU/Update/'); ?>">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th class="text-uppercase text-center">
                    keterangan
                </th>
                <th class="text-uppercase text-center">
                    satuan
                </th>
                <th class="text-uppercase text-center">
                    qty
                </th>
                <th class="text-uppercase text-center">
                    harga
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($value as $value) { ?>
                <tr>
                    <td>
                        <p class="hidden">
                            <?= $value->keterangan ?>
                        </p>
                        <input type="text" name="keterangan[]" class="form-control" value="<?= $value->keterangan ?>" required="" autocomplete="off">
                        <input type="text" name="id[]" class="hide" value="<?= $value->id_ppu ?>">
                    </td>
                    <td class="text-center">
                        <p class="hidden">
                            <?= $value->satuan ?>
                        </p>
                        <input type="text" name="satuan[]" class="form-control" value="<?= $value->satuan ?>" required="" autocomplete="off">
                    </td>
                    <td class="text-center">
                        <p class="hidden">
                            <?= $value->jumlah ?>
                        </p>
                        <input type="text" name="jumlah[]" class="form-control" value="<?= $value->jumlah ?>" required="" autocomplete="off">
                    </td>
                    <td>
                        Rp. <input type="text" name="harga[]" class="form-control" value="<?= number_format($value->harga); ?>" required="" autocomplete="off">
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div style="clear:both;margin:20px 0px;border-bottom:1px solid black;"></div>
    <div class="btn-group text-uppercase" role="group">
        <button type="submit" class="btn btn-success btn-default"><i class="glyphicon glyphicon-ok"></i> save</button>
        <a href="<?= base_url('Logistik/PPU/index/'); ?>" class="btn btn-danger btn-default"><i class="glyphicon glyphicon-remove"></i> cancel</a>
    </div>
</form>
<script>
    window.onload = function () {
        $('table').dataTable({
            dom: 'lftipr',
            responsive: true,
            "paging": true,
            "ordering": true,
            "info": true
        });
    };
</script>