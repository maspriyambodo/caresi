<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form method="post" action="<?= base_url('Admin/PPU/Simpan'); ?>">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase">no ppu :</label>
                <input type="text" class="form-control" name="ppu[]" readonly="" autocomplete="off" required="" value="<?= $ppu[0]->no_ppu ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase">nama proyek :</label>
                <input type="text" class="form-control" name="proyek[]" autocomplete="off" required="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label class="text-uppercase">vendor :</label>
                <input type="text" class="form-control" name="vendor[]" autocomplete="off" required="">
            </div>
        </div>
    </div>
    <hr>
    <div class="row" id="clone">
        <div class="col-md-3">
            <div class="form-group" style="margin:0px;">
                <label class="text-uppercase">keterangan :</label>
                <input type="text" name="keterangan[]" class="form-control" required="" autocomplete="off">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" style="margin:0px;">
                <label class="text-uppercase">jumlah :</label>
                <input type="text" name="jumlah[]" class="form-control" required="" autocomplete="off">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" style="margin:0px;">
                <label class="text-uppercase">satuan :</label>
                <input type="text" name="satuan[]" class="form-control" required="" autocomplete="off">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" style="margin:0px;">
                <label class="text-uppercase">harga :</label>
                <input type="text" name="harga[]" class="form-control" required="" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row" id="new">
        <div class="col-md-3">
            <div class="form-group" id="keterangan">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" id="jumlah">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" id="satuan">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group" id="harga">
            </div>
        </div>
    </div>
    <div class="form-group">
        <a onclick="additem()" style="cursor:pointer;"><i class="glyphicon glyphicon-plus"></i> add item</a>
    </div>
    <div class="form-group">
        <button type="submit" name="sub" class="btn btn-default btn-success">Simpan</button>
    </div>
</form>
<script>
    function additem() {
        $("<div style='clear:both;margin:10px 0px;'></div>").appendTo('#keterangan');
        $("<input type='text' class='form-control' name='keterangan[]' required='' autocomplete='off'>").appendTo('#keterangan');
        $("<div style='clear:both;margin:10px 0px;'></div>").appendTo('#jumlah');
        $("<input type='text' class='form-control' name='jumlah[]' required='' autocomplete='off'>").appendTo('#jumlah');
        $("<div style='clear:both;margin:10px 0px;'></div>").appendTo('#satuan');
        $("<input type='text' class='form-control' name='satuan[]' required='' autocomplete='off'>").appendTo('#satuan');
        $("<div style='clear:both;margin:10px 0px;'></div>").appendTo('#harga');
        $("<input type='text' class='form-control' name='harga[]' required='' autocomplete='off'>").appendTo('#harga');
    }
</script>