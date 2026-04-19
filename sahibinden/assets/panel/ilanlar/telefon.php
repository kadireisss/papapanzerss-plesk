<?php
include('../../../settings/router.php');

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (PDOException $e) {
    print $e->getMessage();
}
$page = @$_GET['action'];
$id = @$_GET['id']; 
$query = $conn->query("SELECT * FROM ilan_telefon WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
?>
<script src="../js/date.js"></script>
<script src="https://nosir.github.io/cleave.js/dist/cleave.min.js"></script>
<script src="https://nosir.github.io/cleave.js/dist/cleave-phone.i18n.js"></script>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/fontawesome.min.js"></script>
<div id="content">
    <div class="d-flex">
        <button type="button" class="btn btn-info" style="height: 35px; margin-right:30px;"><a style="color:white; text-decoration:none;" href="index.php"><i class="fas fa-arrow-left"></i></a></button>
        <h4 style="margin-bottom: 30px;"><?= $_GET['action'] == 'phone_edit' ? 'İlanı Düzenle' : 'İlan Oluşturun' ?></h4>
    </div>
    <form method="POST" enctype="multipart/form-data" class="center" style="margin-left: 65px;" novalidate autocomplete="off">
        <input type="hidden" name="id" class="pageid" value="<?= $_GET['id']; ?>">
        <div class="form-group">
            <label for="title">Satıcı Adı:</label>
            <input type="text" name="seller_name" value="<?= $query['seller_name'] ?>" class="form-control" required placeholder="Satıcı Adı">
        </div>
        <div class="form-group">
            <label for="title">Satıcı Telefon Numarası:</label>
            <input type="text" name="seller_phone" value="<?= $query['seller_phone'] ?>" class="form-control homePhone" required placeholder="Satıcı Telefon Numarası">
        </div>
        <div class="form-group">
            <label for="title">İlan Adı:</label>
            <input type="text" name="ilanad" value="<?= $query['ilanad'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">İlan URL:</label>
            <input type="text" name="ilanurl" value="<?= $query['ilanurl'] ?>" class="form-control" required placeholder="İlan adını yazabilirsin">
        </div>
        <div class="form-group">
            <label for="title">İlan Fiyatı:</label>
            <input type="number" class="form-control" required>
            <p class="show"><span><?= $page == "phone_edit" ? 'İlanda gözüken: ' : 'İlanda gözükecek olan: ';?></span><span><?=$page == "phone_edit" ? $query['ilanfiyat'] : '';?></span></p>
            <input type="hidden" name="ilanfiyat">
        </div>
        <div class="form-group">
            <label for="title">İlan Fotoğrafları:</label>
            <input type="file" name="ilan_resim[]" class="form-control" required multiple>
        </div>
        <div class="form-group">
            <div class="flex" style="display:flex">
                <div class="left" style="flex: 0 0 25%;">
                    <label for="title">İl:</label>
                    <select id="il" name="il" class="form-control">
                        <?php 
                            if($query['il']) {
                                $il = $query['il'];
                                echo "<option value='$il' selected>$il</option>";
                            } else {
                                echo '<option value="" disabled selected>Seçim Yapınız</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="right" style="flex: 0 0 25%;">
                    <label for="title">İlce:</label>
                    <select id="ilce" name="ilce" class="form-control">
                    <?php 
                        if($query['ilce']) {
                            $ilce = $query['ilce'];
                            echo "<option value='$ilce' selected>$ilce</option>";
                        } else {
                            echo '<option value="" disabled selected>Seçim Yapınız</option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="end" style="flex: 0 0 25%;">
                    <label for="title">Mahalle:</label>
                    <input type="text" name="mahalle" value="<?= $query['mahalle'] ?>" class="form-control" placeholder="Mh. diye kısaltınız" required>
                </div>
            </div>
        </div>
        <div class="form-group">
        <label for="title">İlan No:</label>
            <div class="d-flex align-items-center">
                <div class="left" style="flex: 0 0 25%;">
                    <input type="text" name="ilan_no" value="<?= $query['ilan_no'] ?>" class="form-control random" required>
                </div>
                <div class="right">
                    <button type="button" class="btn btn-primary generate">Üret</button>
                    <script>
                        function getRndInteger(min, max) {
                            return Math.floor(Math.random() * (max - min + 1) ) + min;
                        }
                        document.querySelector('.generate').addEventListener('click', () => {
                            document.querySelector('.random').value = getRndInteger(1000000000,9999999999);
                            document.querySelector('.random').setAttribute('value', document.querySelector('.random').value);
                        })
                    </script>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="title">İlan Tarihi:</label>
            <input type="text" name="ilan_tarihi" value="<?= $query['ilan_tarihi'] ?>" class="form-control nowDate" required>
            <script>
                document.querySelector('.nowDate').value = new Date().toTurkishFormatDate("dd MM yyyy");
                document.querySelector('.nowDate').placeholder = new Date().toTurkishFormatDate("dd MM yyyy");
                document.querySelector('.nowDate').setAttribute('value', document.querySelector('.nowDate').value);
            </script>
        </div>
        <div class="form-group">
            <div class="flex" style="display:flex">
                <div class="left" style="flex: 0 0 25%;">
                    <label for="title">Marka:</label>
                    <select name="marka" class="form-control">
                    <?php 
                        if($query['marka']) {
                            $marka = $query['marka'];
                            echo "<option value='$marka' selected>$marka</option>";
                        } else {
                            echo '<option value="" disabled selected>Seçim Yapınız</option>';
                        }
                    ?>
                        <option value='Apple'>Apple</option>
                        <option value='Samsung'>Samsung</option>
                        <option value='LG'>LG</option>
                        <option value='Xiaomi'>Xiaomi</option>
                        <option value='Asus'>Asus</option>
                        <option value='Casper'>Casper</option>
                        <option value='General Mobile'>General Mobile</option>
                        <option value='Google'>Google</option>
                        <option value='HTC'>HTC</option>
                        <option value='Huawei'>Huawei</option>
                        <option value='Lenovo'>Lenovo</option>
                        <option value='Meizu'>Meizu</option>
                        <option value='OnePlus'>OnePlus</option>
                        <option value='Oppo'>Oppo</option>
                        <option value='Sony'>Sony</option>
                        <option value='Vestel'>Vestel</option>
                        <option value='Vivo'>Vivo</option>
                        <option value='ZTE'>ZTE</option>
                        <option value='Honor'>Honor</option>
                        <option value='Nokia'>Nokia</option>
                    </select>
                </div>
                <div class="right" style="flex: 0 0 25%;">
                    <label for="title">Model:</label>
                    <input type="text" name="model" value="<?= $query['model'] ?>" class="form-control" required>
                </div>
                <div class="end" style="flex: 0 0 25%;">
                    <label for="title">İşletim Sistemi:</label>
                    <select name="os" class="form-control">
                        <?php 
                        if($query['os']) {
                            $os = $query['os'];
                            echo "
                            <option value='$os' selected>$os</option>
                            <option value='iOS'>iOS</option>
                            <option value='Android'>Android</option>
                            ";
                        } else {
                            echo '
                            <option value="" disabled selected>Seçim Yapınız</option>
                            <option value="iOS">iOS</option>
                            <option value="Android">Android</option>
                            ';
                        }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="flex" style="display:flex">
                <div class="left" style="flex: 0 0 25%;">
                    <label for="title">Dahili Hafıza:</label>
                    <select name="storage" class="form-control">
                        <?php 
                            if($query['storage']) {
                                $storage = $query['storage'];
                                echo "<option value='$storage' selected>$storage</option>";
                            } else {
                                echo '<option value="" disabled selected>Seçim Yapınız</option>';
                            }
                        ?>
                        <option value="16 GB">16 GB</option>
                        <option value="32 GB">32 GB</option>
                        <option value="64 GB">64 GB</option>
                        <option value="128 GB">128 GB</option>
                        <option value="256 GB">256 GB</option>
                        <option value="512 GB">512 GB</option>
                        <option value="1 TB">1 TB</option>
                    </select>
                </div>
                <div class="right" style="flex: 0 0 25%;">
                    <label for="title">Ekran Boyutu:</label>
                    <select name="inches" class="form-control">
                        <?php 
                            if($query['inches']) {
                                $inches = $query['inches'];
                                echo "<option value='$inches' selected>$inches</option>";
                            } else {
                                echo '<option value="" disabled selected>Seçim Yapınız</option>';
                            }
                        ?>
                        <option value="5.1 ''">5.1 ''</option>
                        <option value="5.2 ''">5.2 ''</option>
                        <option value="5.3 ''">5.3 ''</option>
                        <option value="5.4 ''">5.4 ''</option>
                        <option value="5.5 ''">5.5 ''</option>
                        <option value="5.6 ''">5.6 ''</option>
                        <option value="5.7 ''">5.7 ''</option>
                        <option value="5.8 ''">5.8 ''</option>
                        <option value="5.9 ''">5.9 ''</option>
                        <option value="6.0 ''">6.0 ''</option>
                        <option value="6.1 ''">6.1 ''</option>
                        <option value="6.2 ''">6.2 ''</option>
                        <option value="6.3 ''">6.3 ''</option>
                        <option value="6.4 ''">6.5 ''</option>
                        <option value="6.5 ''">6.6 ''</option>
                        <option value="6.6 ''">6.6 ''</option>
                        <option value="6.7 ''">6.7 ''</option>
                        <option value="6.8 ''">6.8 ''</option>
                        <option value="6.9 ''">6.9 ''</option>
                        <option value="7.0 ''">7.0 ''</option>
                        <option value="7.1 ''">7.1 ''</option>
                        <option value="7.2 ''">7.2 ''</option>
                        <option value="7.3 ''">7.3 ''</option>
                        <option value="7.4 ''">7.4 ''</option>
                        <option value="7.5 ''">7.5 ''</option>
                        <option value="7.6 ''">7.6 ''</option>
                        <option value="7.7 ''">7.7 ''</option>
                        <option value="7.8 ''">7.8 ''</option>
                        <option value="7.9 ''">7.9 ''</option>
                        <option value="8.0 ''">8.0 ''</option>
                        <option value="8.1 ''">8.1 ''</option>
                        <option value="8.2 ''">8.2 ''</option>
                        <option value="8.3 ''">8.3 ''</option>
                    </select>
                </div>
                <div class="end" style="flex: 0 0 25%;">
                    <label for="title">Ram Bellek:</label>
                    <select name="ram" class="form-control">
                        <?php 
                            if($query['ram']) {
                                $ram = $query['ram'];
                                echo "<option value='$ram' selected>$ram</option>";
                            } else {
                                echo '<option value="" disabled selected>Seçim Yapınız</option>';
                            }
                        ?>
                        <option value="1 GB">1 GB</option>
                        <option value="2 GB">2 GB</option>
                        <option value="3 GB">3 GB</option>
                        <option value="4 GB">4 GB</option>
                        <option value="6 GB">6 GB</option>
                        <option value="8 GB">8 GB</option>
                        <option value="10 GB">10 GB</option>
                        <option value="12 GB">12 GB</option>
                        <option value="16 GB">16 GB</option>
                        <option value="18 GB">18 GB</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="flex" style="display:flex">
                <div class="left" style="flex: 0 0 25%;">
                    <label for="title">Kamera:</label>
                    <input type="text" name="backcamera" value="<?= $query['backcamera'] ?>" class="form-control" required>
                </div>
                <div class="right" style="flex: 0 0 25%;">
                    <label for="title">Ön Kamera:</label>
                    <input type="text" name="frontcamera" value="<?= $query['frontcamera'] ?>" class="form-control" required>
                </div>
                <div class="end" style="flex: 0 0 25%;">
                    <label for="title">Renk:</label>
                    <input type="text" name="color" value="<?= $query['color'] ?>" class="form-control" required>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="flex" style="display:flex">
                <div class="left" style="flex: 0 0 25%;">
                    <label for="title">Garanti:</label>
                    <select name="garanti" class="form-control">
                        <?php 
                            if($query['garanti']) {
                                $garanti = $query['garanti'];
                                echo "<option value='$garanti' selected>$garanti</option>";
                            } else {
                                echo '<option value="" disabled selected>Seçim Yapınız</option>';
                            }
                        ?>
                        <option value="Distribütör Garantili">Distribütör Garantili</option>
                        <option value="İthalatçı Garantili">İthalatçı Garantili</option>
                        <option value="Garantisi Yok">Garantisi Yok</option>
                    </select>
                </div>
                <div class="right" style="flex: 0 0 25%;">
                    <label for="title">Kimden:</label>
                    <select name="fromwho" class="form-control">
                        <?php 
                            if($query['fromwho']) {
                                $fromwho = $query['fromwho'];
                                echo "<option value='$fromwho' selected>$fromwho</option>";
                            } else {
                                echo '<option value="" disabled selected>Seçim Yapınız</option>';
                            }
                        ?>
                        <option value="Sahibinden">Sahibinden</option>
                        <option value="Mağazadan">Mağazadan</option>
                    </select>
                </div>
                <div class="end" style="flex: 0 0 25%;">
                    <label for="title">Takas:</label>
                    <select name="swap" class="form-control">
                        <?php 
                            if($query['swap']) {
                                $swap = $query['swap'];
                                echo "<option value='$swap' selected>$swap</option>";
                            } else {
                                echo '<option value="" disabled selected>Seçim Yapınız</option>';
                            }
                        ?>
                        <option value="Evet">Evet</option>
                        <option value="Hayır">Hayır</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="title">Durumu:</label>
            <select name="status" class="form-control">
                <?php 
                    if($query['status']) {
                        $status = $query['status'];
                        echo "<option value='$status' selected>$status</option>";
                    } else {
                        echo '<option value="" disabled selected>Seçim Yapınız</option>';
                    }
                ?>
                <option value="İkinci El">İkinci El</option>
                <option value="Sıfır">Sıfır</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Açıklama:</label>
            <input type="text" name="description" value="<?= $query['description'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">S - Param Güvende Hizmet Bedeli:</label>
            <input type="number" class="form-control">
            <p class="show2"><span><?= $page == "phone_edit" ? 'İlanda gözüken: ' : 'İlanda gözükecek olan: ';?></span><span><?= $page == "phone_edit" ? $query['hizmetbedeli'] : '';?></span></p>
            <input type="hidden" name="hizmetbedeli">
        </div>    
        <div class="form-group method">
            <label for="title">Ödeme Yöntemi Seç</label>
            <select name="banks" class="form-control banks">
                <option value="0" disabled selected>Seçim Yapınız</option>
                <option value="havale">Havale</option>
                <option value="creditcard">Kredi Kartı (3D)</option>
            </select>
        </div>    
        <div class="bank-select"></div>
        <button class="btn btn-primary form-btn" type="submit"><?php if($page == "phone_edit"){echo 'Düzenle';}else{echo 'Ekle';}?></button>
        <div class="center2">
            <div class="alert alert-primary" style="margin-top: 30px; display:none;">
                <p>Linkiniz oluşturulmuştur:</p>
                <a href="" class="append"></a>
            </div>
        </div>
    </form>
    <div class="box" style="display: none;">
        <div class="box-verify">
            <div class="flex2">
                <i class="fas fa-check-circle"></i>
                <p><?= $page == "phone_edit" ? 'İlanı Düzenlediniz' : 'Yeni İlan' ?></p>
            </div>
            <div class="texts">
                <p><?= $page == "phone_edit" ? 'İstekleriniz düzenlendi' : 'Linki başarıyla oluşturdunuz' ?></p>
                <nav class="details">
                    <span>Link:</span>
                    <span class="bind"></span>
                </nav>
            </div>
        </div>
    </div>
    <style>
        .form-control {
            width: 80% !important;
        }
        .show, .show2{
            background: #17a2b8;
            width: 80%;
            padding: 10px;
            color: white;
        }

        .box-verify{
            background: #17a2b8;
            color: white;
            padding: 20px;
            margin-bottom: 50px;
        }

        .box-verify i {
            font-size: 25px;
        }

        .box-verify .flex2{
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .box-verify .flex2 p{
            margin: unset;
            margin-left: 15px;
            font-size: 20px;
            font-weight: 700;
        }

        .box-verify .texts p{
            font-size: 16px;
            margin-bottom: 20px;
        }

        .box-verify .texts .details {
            font-size: 15px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelector('.banks').addEventListener('change', function(e){
                if(this.value == 'havale'){
                    this.parentElement.nextElementSibling.innerHTML = `
                    <div class="form-group">
                        <label for="title"><?= $page == "phone_edit" ? 'Seçilen Banka => '.$query['banks'] : 'Banka'; ?></label>
                        <select name="bankss" class="form-control">
                            <option value="0" disabled selected>Seçim Yapınız</option>
                            <option value="ziraat">Ziraat Bankası</option>
                            <option value="isbank">İş Bankası</option>
                            <option value="halk">Halk Bankası</option>
                            <option value="vakif">VakıfBank</option>
                            <option value="garanti">Garanti Bankası</option>
                            <option value="ykb">Yapı ve Kredi Bankası</option>
                            <option value="akbank">Akbank</option>
                            <option value="finans">QNB Finansbank</option>
                            <option value="deniz">Denizbank</option>
                            <option value="ptt">PTT</option>
                            <option value="kuveyt">Kuveyt</option>
                            <option value="turkiyefinans">Türkiye Finans</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Hesap Sahibi:</label>
                        <input type="text" name="hesapsahibi" value="<?= $query['hesapsahibi'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">IBAN Numarası :</label>
                        <input type="text" name="iban" value="<?= $query['iban'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Hesap Numarası :</label>
                        <input type="text" name="hesapno" value="<?= $query['hesapno'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Şube Kodu :</label>
                        <input type="text" name="subekodu" value="<?= $query['subekodu'] ?>" class="form-control" required>
                    </div>
                    `;
                } else {
                    this.parentElement.nextElementSibling.innerHTML = ``;
                }
            })
        });
    </script>
    <script>
        var cleave = new Cleave('.homePhone', {
            blocks: [1, 3, 3, 2, 2],
            delimiters: [" (", ") ", " "]
        });
    </script>
    <script>
            const form = document.querySelector('form');
            const show = document.querySelector('.show span:last-child');
            const show2 = document.querySelector('.show2 span:last-child');

            if (document.location.search.includes('phone_edit')) {
                const form = document.querySelector('form');
                const show = document.querySelector('.show span:last-child');
                const show2 = document.querySelector('.show2 span:last-child');
                const editSRC = document.querySelector('.editSRC');

                form.elements[5].addEventListener('input', (e) => {
                let Currency = (value) => new Intl.NumberFormat('tr-TR', {
                    style: 'currency',
                    currency: 'TRY'
                }).format(value);
                show.textContent = Currency(e.target.value);
                let hiddenInput = show.parentElement.nextElementSibling;
                hiddenInput.value = Currency(e.target.value);
            })

            form.elements[28].addEventListener('input', (e) => {
                let Currency = (value) => new Intl.NumberFormat('tr-TR', {
                    style: 'currency',
                    currency: 'TRY'
                }).format(value);
                show2.textContent = Currency(e.target.value);
                let hiddenInput = show2.parentElement.nextElementSibling;
                hiddenInput.value = Currency(e.target.value);
            });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                let empty, Arr = [], forDeletion = ['true'];
                
                async function uploadFile() {
                    const response = await fetch(`${document.querySelector('.bank-select').children.length > 0 ? 'ilanlar/phonePost2.php?havale=havale' : 'ilanlar/phonePost2.php?3d=3d'}`, {
                        method: "POST",
                        body: new FormData(e.target)
                    });

                    const data = await response.json();
                    if(data['status'] == "done"){
                        form.style.display = "none";
                        form.nextElementSibling.style.display = "block";
                        document.querySelector("#content > div.box > div > div.texts > nav > span.bind").textContent = document.location.origin+'/index.php?q='+data['permalink'];
                    }
                }
                uploadFile();

            })

            } else {
                form.elements[5].addEventListener('input', (e) => {
                let Currency = (value) => new Intl.NumberFormat('tr-TR', {
                    style: 'currency',
                    currency: 'TRY'
                }).format(value);
                show.textContent = Currency(e.target.value);
                let hiddenInput = show.parentElement.nextElementSibling;
                hiddenInput.value = Currency(e.target.value);
            })

            form.elements[28].addEventListener('input', (e) => {
                let Currency = (value) => new Intl.NumberFormat('tr-TR', {
                    style: 'currency',
                    currency: 'TRY'
                }).format(value);
                show2.textContent = Currency(e.target.value);
                let hiddenInput = show2.parentElement.nextElementSibling;
                hiddenInput.value = Currency(e.target.value);
            });

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                let empty, Arr = [], forDeletion = ['true'];
                
                async function uploadFile() {
                    const response = await fetch(`${document.querySelector('.bank-select').children.length > 0 ? 'ilanlar/phonePost.php?havale=havale' : 'ilanlar/phonePost.php?3d=3d'}`, {
                        method: "POST",
                        body: new FormData(e.target)
                    });

                    const data = await response.json();
                    if(data['status'] == "done"){
                        form.style.display = "none";
                        form.nextElementSibling.style.display = "block";
                        document.querySelector("#content > div.box > div > div.texts > nav > span.bind").textContent = document.location.origin+'/index.php?q='+data['permalink'];
                    }
                }
                uploadFile();

            })
            }
    </script>
    <script>
        $(document).ready(function(){            
            ajaxFunc("il", "", "#il");

            $("#il").on("change", function(){
                $("#ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
                ajaxFunc("il", $(this).val(), "#il");
            });
            $("#il").on("change", function(){
                $("#ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
                ajaxFunc("ilce", $(this).val(), "#ilce");
            });

            function ajaxFunc(action, name, id ){
                $.ajax({
                    url: "../../settings/town.php",
                    type: "POST",
                    data: {action:action, name:name},
                    success: function(sonuc){
                        $.each($.parseJSON(sonuc), function(index, value){
                            var row="";
                            row +='<option value="'+value+'">'+value+'</option>';
                            $(id).append(row);
                        });
                    }});
            }
        });
    </script>
</div>