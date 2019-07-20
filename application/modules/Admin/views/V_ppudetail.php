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
            <label class="text-uppercase">tanggal terbit</label>
            <p><?= $ppu->nama_proyek ?></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group text-right">
            <a href="#" class="btn btn-default btn-success">lihat bukti transfer</a>
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
            <td colspan="3"></td>
            <td class="text-center text-uppercase">
                ppn 10%
            </td>
            <td id="total" class="text-left">
                <?php
                $ppn = $value->total * 0.1;
                echo 'Rp. ' . number_format($ppn);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td class="text-center text-uppercase">
                grand total
            </td>
            <td id="total" class="text-left">
                <?php
                echo 'Rp. ' . number_format($value->total + $ppn);
                ?>
            </td>
        </tr>
        <tr>
            <td class="text-center text-uppercase">terbilang</td>
            <td id="total" class="text-center" colspan="4">
                <?php
                $ter = $value->total + $ppn;
                echo ucwords(number_to_words($ter));
                ?>
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