<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link href="<?= base_url('assets/css/dropzone.min.css'); ?>" rel=stylesheet type="text/css" />
<div class="form-group text-right">
    <button type="button" class="btn btn-default btn-success" data-toggle="modal" data-target="#Lunas">LUNAS</button>
</div>
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
            <th class="text-uppercase text-center">
                total
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
                <td>
                    <?= number_format($value->jumlah * $value->harga); ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="text-uppercase text-center"><b>grand total</b></td>
            <td><b>Rp. <?= number_format($value->total); ?></b></td>
        </tr>
        <tr>
            <td class="text-uppercase text-center"><b>terbilang</b></td>
            <td colspan="4">
                <?= ucwords(number_to_words($value->total)) ?> Rupiah
            </td>
        </tr>
    </tfoot>
</table>
<div style="clear:both;margin:20px 0px;border-bottom:1px solid black;"></div>
<form action="<?= base_url('Finance/PPU/Uploadpoto/' . $value->no_ppu . '') ?>" class="dropzone" enctype="multipart/form-data">
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
    <div class="dz-message needsclick">
        <h4 class="text-uppercase">upload bukti pembayaran atau transfer</h4><br>
        <p class="text-uppercase">click or drop to upload</p>
    </div>
</form>
<div class="modal fade" id="Lunas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Ubah Status Pembayaran</h4>
            </div>
            <div class="modal-body">
                Anda yakin ingin merubah status pembayaran menjadi lunas ?
                <br>
                <small class="text-danger">* Upload bukti pembayaran !</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="Simpan(<?= $value->no_ppu ?>)">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    function Simpan(obj) {
        $.ajax({
            method: "post",
            url: "<?= base_url('Finance/PPU/Lunas/'); ?>" + obj,
            statusCode: {
                200: function (data) {
                    alert(data.msg);
                    window.location.href = '<?= base_url('Finance/PPU/index'); ?>';
                },
                500: function () {
                    alert('Error while load data, please try again !');
                    location.reload();
                }
            }
        });
    }
    window.onload = function () {
        $('table').dataTable({
            dom: 'lftipr',
            responsive: true,
            "paging": false,
            "ordering": true,
            "info": true
        });
    };
</script>
<script src="<?= base_url('assets/js/dropzone.js'); ?>" type="text/javascript"></script>