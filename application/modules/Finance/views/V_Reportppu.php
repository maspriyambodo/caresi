<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <select class="form-control" onchange="Tahun()">
                <?php foreach ($year as $year) { ?>
                    <option value = "<?= $year->tahun ?>"><?= $year->tahun ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class = "col-md-4">

    </div>
    <div class = "col-md-4">

    </div>
</div>
<table class = "table table-bordered table-striped table-hover" style="width:100%;">
    <thead>
        <tr>
            <th class = "text-center text-uppercase">
                no ppu
            </th>
            <th class = "text-center text-uppercase">
                tgl pembayaran
            </th>
            <th class = "text-center text-uppercase">
                vendor
            </th>
            <th class = "text-center text-uppercase">
                nama proyek
            </th>
            <th class = "text-center text-uppercase">
                total
            </th>
            <th class = "text-center text-uppercase">
                DETAIL
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
                    <?= $value->tgl_pembayaran ?>
                </td>
                <td>
                    <?= $value->vendor ?>
                </td>
                <td>
                    <?= $value->nama_proyek ?>
                </td>
                <td>
                    <?= number_format($value->total); ?>
                </td>
                <td class = "text-center">
                    <a href = "" class = "btn btn-xs btn-default"><i class = "glyphicon glyphicon-eye-open"></i></a>
                </td>
            </tr>
        <?php } ?>
        <tr style="background-color:#F7F7F7;">
            <td colspan="3"></td>
            <td class="hidden"></td>
            <td class="hidden"></td>
            <td class="text-center text-uppercase">
                Total pengeluaran kas
            </td>
            <td colspan="2">
                <b>Rp. <?= number_format($value->gtotal); ?></b>
            </td>
            <td class="hidden"></td>
        </tr>
    </tbody>
</table>
<script>
    window.onload = function () {
        $('table').dataTable({
            dom: 'Blftipr',
            responsive: true,
            "paging": false,
            "ordering": false,
            "info": true
        });
    };
    function Tahun() {
        alert('hahaha');
    }
</script>