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
<canvas id="myChart"></canvas>
<script>
    document.onreadystatechange = () => {
        if (document.readyState === 'complete') {
            $(".right_col").removeClass("hidden");
        }
    };
    window.onload = function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                        label: '# ppu <?= date("Y") ?>',
                        data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
            },
            options: {
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                }
            }
        });
    };
</script>