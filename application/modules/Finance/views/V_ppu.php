<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center text-uppercase">
                    user input
                </th>
                <th class="text-center text-uppercase">
                    tgl ppu
                </th>
                <th class="text-center text-uppercase">
                    nama proyek
                </th>
                <th class="text-center text-uppercase">
                    owner
                </th>
                <th class="text-center text-uppercase">
                    tmt
                </th>
                <th class="text-center text-uppercase">
                    tmt stop
                </th>
                <th class="text-center text-uppercase">
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($value as $value) { ?>
                <tr>
                    <td class="text-uppercase">
                        <?= $value->uname ?>
                    </td>
                    <td>
                        <?= $value->tgl_ppu ?>
                    </td>
                    <td>
                        <?= $value->nama_proyek ?>
                    </td>
                    <td>
                        <?= $value->pemilik_proyek ?>
                    </td>
                    <td>
                        <?= $value->tmt ?>
                    </td>
                    <td>
                        <?= $value->tmt_stop ?>
                    </td>
                    <td class="text-center">
                        <a href="<?= base_url('Finance/PPU/Detail/' . $value->no_ppu . ''); ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
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