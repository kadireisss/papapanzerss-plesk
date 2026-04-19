



<?php
// Veritabanı bağlantısı
include_once('../../inc/db.php');

// Eğer ID belirtilmişse
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Veritabanından ilgili ürünü sil
    $db = db_connect();
    $stmt = $db->prepare('DELETE FROM bella_a101_products WHERE id = :product_id');
    $stmt->bindParam(':product_id', $product_id);

    try {
        $stmt->execute();
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı!',
                    text: 'Ürün başarıyla silindi!',
                });
            </script>";
    } catch (Exception $e) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Hata!',
                    text: 'Ürün silinirken bir hata oluştu!',
                });
            </script>";
    }
} else {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Hata!',
                text: 'Geçersiz ürün ID!',
            });
        </script>";
}
?>