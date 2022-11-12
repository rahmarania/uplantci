<link rel="stylesheet" href="<?=base_url()?>/stisla/node_modules/chart.js/dist/Chart.min.css">
<script src="<?=base_url()?>/stisla/node_modules/chart.js/dist/Chart.bundle.min.js"></script>


<?php 
    $namatnm = "";
    $jenis = "";
    $namail = "";

    foreach($grafik as $row):
        $jen = $row->$jenis;
        $jenis .= "'$jen'".",";

        $nama_tanaman = $row->nama_tanaman;
        $namatnm .= "'$nama_tanaman'".",";

        $nama_ilmiah = $row->nama_ilmiah;
        $namail .= "'$nama_ilmiah'".",";

    endforeach;
?>
<script>
    var ctx = document.getElementsById('kattan').getContext('2d');
    var chart = new Chart(ctx, {
        type:'bar',
        responsive:true,
        data:{
            labels: [<?= $jenis ?>],
            datasets:[{
                label: "Kategori Tanaman",
                backgroundColor: ['rgb(255,99,132)','rgb(14,99,132)'],
                borderColor:['rgb(255,991,130)'],
                data:[<?=$namatnm?>]
            }]
        },
        duration: 1000
    })
</script>