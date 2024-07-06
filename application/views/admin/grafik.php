[           
    <?php
    while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
    ?>
    //data yang diambil dari database dimasukan ke variable nama dan data
    {
           name: '<?php echo $row4['id_karyawan'] ?>',
           data: '<?php echo $row4['hasil_akhir'] ?>'
    },
    <?php } ?>
]

<?php
    $pro1 = new Karyawan_model();
    $stmt4 = $pro1->readAll();
    $stmt5 = json_encode($stmt4, true);
?>

[

    <?php
    while ($row4 = $stmt5->fetchAll(PDO::FETCH_ASSOC)){
    ?>
    //data yang diambil dari database dimasukan ke variable nama dan data
    {
           name: '<?php echo $row4['id_karyawan'] ?>',
           data: '<?php echo $row4['f'] ?>'
    },
    <?php } ?>

]

[

    <?php
    for ($i=0; $i < count($stmt5); $i++){
    ?>
    //data yang diambil dari database dimasukan ke variable nama dan data
    {
           name: '<?php echo $stmt5[$i]["id_karyawan"] ?>',
           data: '<?php echo $stmt5[$i]["f"] ?>'
    },
    <?php } ?>

]



[{
        name: 'Karyawan A',
        data: [5]  // Nilai yang akan ditampilkan dalam grafik untuk Karyawan A
    }, {
        name: 'Karyawan B',
        data: [3]  // Nilai yang akan ditampilkan dalam grafik untuk Karyawan B
    }]

[          
    <?php
    while ($row4 = $stmt4){
    ?>
    //data yang diambil dari database dimasukan ke variable nama dan data
    {
           name: '<?php echo $row4['nama_karyawan'] ?>',
           data: [<?php 
                        $nilai=$row4['id_karyawan']/count($row4('id_kriteria'));
                        echo $nilai; 
                ?>]
    },
    <?php } ?>
]

[
                    {
                        name: 'Gusti Agung Bagus Juli Artawan',
                        data: [0.6]  // Nilai yang akan ditampilkan dalam grafik untuk Karyawan A
                    }, {
                        name: 'Sarah Puspa Saputri',
                        data: [0.21]  // Nilai yang akan ditampilkan dalam grafik untuk Karyawan B
                    },
                    {
                        name: 'Ni Wayan Wulan Puspita Sari',
                        data: [0.2]  // Nilai yang akan ditampilkan dalam grafik untuk Karyawan B
                    },
                    {
                        name: 'I Putu Surya Wijaya',
                        data: [0.1333334]  // Nilai yang akan ditampilkan dalam grafik untuk Karyawan B
                    },
                    {
                        name: 'Nyoman Suardiana',
                        data: [0.1333333]  // Nilai yang akan ditampilkan dalam grafik untuk Karyawan B
                    },
                    ]