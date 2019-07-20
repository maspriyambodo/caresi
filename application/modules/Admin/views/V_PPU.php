<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="form-group">
    <div class="text-right">
        <a href="<?= base_url('Admin/PPU/Tambah'); ?>" class="text-uppercase btn btn-default btn-primary">
            <i class="glyphicon glyphicon-plus"></i> tambah
        </a>
    </div>
</div>
<table class="table table-bordered table-hover table-striped" style="width:100%;">
    <thead>
        <tr>
            <th class="text-uppercase text-center">
                no ppu
            </th>
            <th class="text-uppercase text-center">
                terbit ppu
            </th>
            <th class="text-uppercase text-center">
                vendor
            </th>
            <th class="text-uppercase text-center">
                tgl bayar
            </th>
            <th class="text-uppercase text-center">
                status
            </th>
            <th class="text-uppercase text-center">
                action
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($value as $value) { ?>
            <tr>
                <td>
                    <?= $value->no_ppu ?>
                </td>
                <td>
                    <?= $value->tgl_ppu ?>
                </td>
                <td>
                    <?= $value->vendor ?>
                </td>
                <td>
                    <?= $value->tgl_pembayaran ?>
                </td>
                <td class="text-center text-uppercase">
                    <?php
                    if ($value->stat == 1) {
                        echo '<p class="text-danger">belum di proses</p>';
                    } else {
                        echo '<p class="text-success">sudah di proses</p>';
                    }
                    ?>
                </td>
                <td class="text-center text-uppercase">
                    <a href="<?= base_url('Admin/PPU/Detail/' . $value->no_ppu . ''); ?>" class="btn btn-default btn-xs">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
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