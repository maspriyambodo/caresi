<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link href="<?= base_url('assets/css/dropzone.min.css'); ?>" rel=stylesheet type="text/css" />
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">tanggal ppu :</label>
            <p class="text-uppercase"><?= $value[0]->tgl_ppu ?></p>
        </div>
        <div class="form-group">
            <label class="text-uppercase">user input ppu :</label>
            <p class="text-uppercase"><?= $value[0]->uname ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">nama proyek :</label>
            <p class="text-uppercase"><?= $value[0]->nama_proyek ?></p>
        </div>
        <div class="form-group">
            <label class="text-uppercase">pemilik proyek :</label>
            <p class="text-uppercase"><?= $value[0]->pemilik_proyek ?></p>
        </div>
    </div>
    <div class="col-md-4">

    </div>
</div>
<table class="table table-bordered table-hover table-striped" style="width:100%;">
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
                    <?= $value->keterangan ?>
                    <input type="text" name="id[]" class="hide" value="<?= $value->id_ppu ?>">
                </td>
                <td class="text-center">
                    <?= $value->satuan ?>
                </td>
                <td class="text-center">
                    <?= $value->jumlah ?>
                </td>
                <td>
                    Rp. <?= number_format($value->harga); ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="text-uppercase text-center"><b>grand total</b></td>
            <td id="total">Rp. <?= number_format($value->total); ?></td>
        </tr>
    </tfoot>
</table>
<div style="clear:both;margin:20px 0px;border-bottom:1px solid black;"></div>
<form action="/file-upload"
      class="dropzone"
      id="my-awesome-dropzone"></form>
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