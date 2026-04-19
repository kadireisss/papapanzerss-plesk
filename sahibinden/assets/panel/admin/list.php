<?php
include('../../../settings/router.php');

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (PDOException $e) {
    print $e->getMessage();
}

?>

<?php echo @$_SESSION['message']; $_SESSION['message'] = "";?>
<div id="content">
    <h4>Admin</h4>
    <table class="table">
     <tr>
         <th>#</th>
         <th>Ad</th>
         <th>Düzenle</th>
         
     </tr>
        <?php 
            $query = $conn->query("SELECT * FROM login", PDO::FETCH_ASSOC);
            if ( $query->rowCount() ){
                foreach( $query as $row ){
        ?>
         <tr>
             <td><?=$row['id']?></td>
             <td><?=$row['username']?></td>
             <td><a href="index.php?page=<?=$page_name?>&action=edit&id=<?=$row['id']?>">Düzenle</a></td>
         </tr>
         <?php
     }}
     ?>
    </table>

</div>
</body>
</html>
