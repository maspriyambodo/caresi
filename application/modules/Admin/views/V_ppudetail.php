<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">tanggal terbit</label>
            <p><?= $ppu[0]->tgl_ppu ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">Proyek</label>
            <p class="text-uppercase"><?= $ppu[0]->nama_proyek ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-uppercase">Owner</label>
            <p class="text-uppercase"><?= $ppu[0]->pemilik_proyek ?></p>
        </div>
        <div class="form-group text-right">
            <div class="btn-group" role="group" aria-label="...">
                <a href="<?= base_url('Admin/PPU/Cetak/' . $ppu[0]->no_ppu . ''); ?>" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> Print</a>
                <?php
                if ($ppu[0]->stat == 1) {
                    echo '';
                } else {
                    echo '<a href="' . base_url('Admin/PPU/Bukti/' . $ppu[0]->no_ppu . '') . '" class="btn btn-default btn-success" target="_blank">lihat bukti transfer</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered table-hover table-striped" style="width:100%;">
    <thead>
        <tr>
            <th class="text-uppercase text-center">
                uraian
            </th>
            <th class="text-uppercase text-center">
                satuan
            </th>
            <th class="text-uppercase text-center">
                harga satuan
            </th>
            <th class="text-uppercase text-center">
                qty
            </th>
            <th class="text-uppercase text-center">
                jumlah
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ppu as $value) { ?>
            <tr>
                <td>
                    <?= $value->keterangan ?>
                </td>
                <td class="text-center">
                    <?= $value->satuan ?>
                </td>
                <td>
                    <?= number_format($value->harga) ?>
                </td>
                <td>
                    <?= $value->jumlah ?>
                </td>
                <td id="tot" class="text-right">
                    <?= number_format($value->harga * $value->jumlah) ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td class="text-center text-uppercase">
                T O T A L
            </td>
            <td id="total" class="text-left">
                <?= 'Rp. ' . number_format($value->total); ?>
            </td>
        </tr>
        <tr>
            <td class="text-center text-uppercase">terbilang</td>
            <td id="total" class="text-center" colspan="4">
                <?php
                $ter = $value->total;
                echo ucwords(number_to_words($ter));
                ?> Rupiah
            </td>
        </tr>
    </tfoot>
</table>
<script>
    window.onload = function () {
        $('.table').DataTable({
            responsive: true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            dom: 'lfrtip',
            info: true
        });
    };
</script>