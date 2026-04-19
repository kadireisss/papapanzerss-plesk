<?php 
include('../../../settings/router.php');

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (PDOException $e) {
    print $e->getMessage();
}
$pagename = $_GET['action'];
$id = @$_GET['id']; 
$query = $conn->query("SELECT * FROM login WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
?>

<div id="content">
    <h4>Admin Ekle veya Değiştir</h4>
    <form action="" method="post" enctype="multipart/form-data" class="admin-form" novalidate>
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="form-group">
            <label for="title">Kullanıcı Adı:</label>
            <input type="text" name="username" value="<?= $pagename == "new" ? $empty : $query['username']?>" class="form-control username" required>
        </div>
        <div class="form-group">
            <label for="title">Şifre:</label>
            <input type="password" name="password" class="form-control password" required>
        </div>
        <br> <button class="btn btn-primary form-btn"><?= $pagename == "new" ? 'Ekle' : 'Değiştir';?></button>
    </form>
    <script>
        $('.admin-form').submit(function (e) {
            e.preventDefault();
            const username = $('.username').val();
            const password = $('.password').val();
            if(($('.username').val() == "") || ($('.password').val() == "")){
                e.preventDefault();
                $('.username').css('border', '1px solid red');
                $('.password').css('border', '1px solid red');
            }else{
                $.ajax({
                    type: "POST",
                    url: <?= $pagename == 'new' ? '"admin/new.php"' : '"admin/new3.php"'; ?>,
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "done"){
                            $.notify({
                                    <?= $page == 'form' ? "message: 'Başarıyla eklendi'" : "message: 'Başarıyla düzenlendi'"; ?>,
                                },{
                                    type: 'success'
                            });
                            $('.username').css('border', '1px solid #fff');
                            $('.password').css('border', '1px solid #fff');
                        }
                        if (data.status == "error"){
                            $.notify({
                                message: 'Bir hata oluştu' 
                            },{
                                type: 'danger'
                            });
                        } 
                    }
                });
            }
        })
    </script>
</div>