<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h4 class="text-center">PPU Tahun <?= date("Y"); ?></h4>
<div class="row tile_count">
    <div class="col-md-4 tile_stats_count">
        <span class="count_top"><i class="glyphicon glyphicon-list-alt"></i> Total PPU</span>
        <div class="count"><?= $value[0]->totppu; ?></div>
    </div>
    <div class="col-md-4 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> PPU UN-PROCESS</span>
        <div class="count"><?= $value[0]->unppu; ?></div>
    </div>
    <div class="col-md-4 tile_stats_count">
        <span class="count_top"><i class="glyphicon glyphicon-ok"></i> PPU PROCESS</span>
        <div class="count green"><?= $value[0]->procppu; ?></div>
    </div>
</div>