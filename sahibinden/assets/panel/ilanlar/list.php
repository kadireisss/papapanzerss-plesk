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
        <button type="button" class="btn btn-danger" style="margin-right: 30px;"><a style="color:white; text-decoration:none;" href="ilanlar/deleteall.php?list=list">HEPSİNİ SİL</a></button>
    </div>
    <table class="table">
     <tr>
         <th>#</th>
         <th>İlan Tip</th>
         <th>İlan URL</th>
         <th>İlan Adı</th>
         <th>İlan Fiyat</th>
         <th>Düzenle</th>
         <th>Sil</th>
         
     </tr>
        <?php 
            $query = $conn->query("SELECT * FROM ilan", PDO::FETCH_ASSOC);
            if ($query->rowCount()){
                foreach( $query as $row ){
        ?>
         <tr>
             <td><?=$row['id']?></td>
             <td class="bindo"><a title="<?=$row['ilanurl']?>" target="_blank">İlana Git</a></td>
             <td><?=$row['ilanad']?></td>
             <td><?=$row['ilanfiyat']?></td>
             <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href="index.php?page=<?=$page_name?>&action=edit&id=<?=$row['id']?>">Düzenle</a></button></td>
             <td><button type="button" class="btn btn-danger"><a style="color:white; text-decoration:none;" href="ilanlar/sil.php?id=<?=$row['id'];?>&list=list">Sil</a></button></td>
         </tr>
         <?php
     }}
     ?>

        <?php 
            $query = $conn->query("SELECT * FROM ilan_telefon", PDO::FETCH_ASSOC);
            if ($query->rowCount()){
                foreach( $query as $row ){
        ?>
         <tr>
             <td><?=$row['id']?></td>
             <td>Telefon</td>
             <td class="bindo"><a href="/index.php?type=phone&q=<?=$row['ilanurl']?>" target="_blank">İlana Git</a></td>
             <td><?=$row['ilanad']?></td>
             <td><?=$row['ilanfiyat']?> ₺</td>
             <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href="index.php?page=<?=$page_name?>&action=phone_edit&id=<?=$row['id']?>">Düzenle</a></button></td>
             <td><button type="button" class="btn btn-danger"><a style="color:white; text-decoration:none;" href="ilanlar/sil.php?id=<?=$row['id'];?>&list=list">Sil</a></button></td>
         </tr>
         <?php
     }}
     ?>

        <?php 
            $query = $conn->query("SELECT * FROM ilan_playstation", PDO::FETCH_ASSOC);
            if ($query->rowCount()){
                foreach( $query as $row ){
        ?>
         <tr>
             <td><?=$row['id']?></td>
             <td>Oyun Konsolu</td>
             <td class="bindo"><a href="/index.php?type=console&q=<?=$row['ilanurl']?>" target="_blank">İlana Git</a></td>
             <td><?=$row['ilanad']?></td>
             <td><?=$row['ilanfiyat']?> ₺</td>
             <td><button type="button" class="btn btn-primary"><a style="color:white; text-decoration:none;" href="index.php?page=<?=$page_name?>&action=ps_edit&id=<?=$row['id']?>">Düzenle</a></button></td>
             <td><button type="button" class="btn btn-danger"><a style="color:white; text-decoration:none;" href="ilanlar/sil.php?id=<?=$row['id'];?>&list=list">Sil</a></button></td>
         </tr>
         <?php
     }}
     ?>
    </table>
</div>


