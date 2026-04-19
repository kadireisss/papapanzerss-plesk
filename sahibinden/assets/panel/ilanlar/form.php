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
$query = $conn->query("SELECT * FROM ilan WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/fontawesome.min.js"></script>
<div id="content">
    <div class="d-flex">
        <button type="button" class="btn btn-info" style="height: 35px; margin-right:30px;"><a style="color:white; text-decoration:none;" href="index.php"><i class="fas fa-arrow-left"></i></a></button>
        <h4 style="margin-bottom: 30px;"><?= $_GET['action'] == 'edit' ? 'İlanı Düzenle' : 'İlan Oluşturun' ?></h4>
    </div>
    <form method="POST" enctype="multipart/form-data" class="center" style="margin-left: 65px;" novalidate autocomplete="off">
        <input type="hidden" name="id" class="pageid" value="<?= $_GET['id']; ?>">
        <div class="form-group">
            <label for="title">İlan URL:</label>
            <input type="text" name="ilanurl" value="<?= $query['ilanurl'] ?>" class="form-control" required placeholder="Ürünün markası neyse onu girin, eğer aynı markadan birden fazla ürün varsa arasına - koy apple-1 apple-2 gibi">
        </div>
        <div class="form-group">
            <label for="title">İlan Fotoğrafı:</label>
            <input type="file" name="ilanfoto" class="form-control" required>
            <?php
                if($page == "edit"){
                    echo '<img src="" alt="ilanfoto" class="editSRC" style="width: 150px; margin:20px 0;">';
                }
            ?>
        </div>
        <div class="form-group">
            <label for="title">İlan Adı:</label>
            <input type="text" name="ilanad" value="<?= $query['ilanad'] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">İlan Fiyatı:</label>
            <input type="number" class="form-control" required>
            <p class="show"><span><?= $page == "edit" ? 'İlanda gözüken: ' : 'İlanda gözükecek olan: ';?></span><span><?= $page == "edit" ? $query['ilanfiyat'] : '';?></span></p>
            <input type="hidden" name="ilanfiyat">
        </div>
        <div class="form-group">
            <label for="title">S - Param Güvende Hizmet Bedeli:</label>
            <input type="number" class="form-control">
            <p class="show2"><span><?= $page == "edit" ? 'İlanda gözüken: ' : 'İlanda gözükecek olan: ';?></span><span><?= $page == "edit" ? $query['hizmetbedeli'] : '';?></span></p>
            <input type="hidden" name="hizmetbedeli">
        </div>        
        <div class="form-group">
            <label for="title"><?= $page == "edit" ? 'Seçilen Banka => '.$query['banks'] : 'Banka'; ?></label>
            <select name="banks" class="form-control">
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


        <button class="btn btn-primary form-btn" type="submit"><?php if($page == "edit"){echo 'Düzenle';}else{echo 'Ekle';}?></button>

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
                <p><?= $page == "edit" ? 'İlanı Düzenlediniz' : 'Yeni İlan' ?></p>
            </div>
            <div class="texts">
                <p><?= $page == "edit" ? 'İstekleriniz düzenlendi' : 'Linki başarıyla oluşturdunuz' ?></p>
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

    </script>
    <script>
        if (document.location.search.includes('form')) {
            const form = document.querySelector('form');
            const show = document.querySelector('.show span:last-child');
            const show2 = document.querySelector('.show2 span:last-child');

            form.elements[4].addEventListener('input', (e) => {
                let Currency = (value) => new Intl.NumberFormat('tr-TR', {
                    style: 'currency',
                    currency: 'TRY'
                }).format(value);
                show.textContent = Currency(e.target.value);

                let hiddenInput = show.parentElement.nextElementSibling;
                hiddenInput.value = Currency(e.target.value);
            })

            form.elements[6].addEventListener('input', (e) => {
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
                
                form.elements[1].value == "" ? (console.log('ok'), form.elements[1].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[1].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                form.elements[2].value == "" ? (form.elements[2].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[2].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                form.elements[3].value == "" ? (form.elements[3].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[3].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                form.elements[4].value == "" ? (form.elements[4].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[4].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                form.elements[6].value == "" ? (form.elements[6].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[6].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                form.elements[8].value == "0" ? (form.elements[8].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[8].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                form.elements[9].value == "" ? (form.elements[9].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[9].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                form.elements[10].value == "" ? (form.elements[10].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[10].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                form.elements[11].value == "" ? (form.elements[11].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[11].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                form.elements[12].value == "" ? (form.elements[12].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[12].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');

                console.log(Arr)

                async function uploadFile() {
                    let myForm = e.target;
                    let formData = new FormData(myForm);
                    const response = await fetch('ilanlar/new.php', {
                        method: "POST",
                        body: formData
                    });

                    const data = await response.json();
                    if(data['status'] == "done"){
                        form.style.display = "none";
                        form.nextElementSibling.style.display = "block";
                        document.querySelector("#content > div.box > div > div.texts > nav > span.bind").textContent = document.location.origin+'/index.php?q='+data['permalink'];
                    }
                }

                if (Arr.length >= 10) {
                    uploadFile();
                }

            })

        } else {
            if (document.location.search.includes('edit')) {
                const form = document.querySelector('form');
                const show = document.querySelector('.show span:last-child');
                const show2 = document.querySelector('.show2 span:last-child');
                const editSRC = document.querySelector('.editSRC');

                editSRC ? editSRC.src = "../images/<?= $query['ilanfoto'] ?>" : empty;

                form.elements[4].addEventListener('input', (e) => {
                    let Currency = (value) => new Intl.NumberFormat('tr-TR', {
                        style: 'currency',
                        currency: 'TRY'
                    }).format(value);
                    show.textContent = Currency(e.target.value);
                    show.previousElementSibling.textContent = "İlanda gözükecek olan : ";

                    let hiddenInput = show.parentElement.nextElementSibling;
                    hiddenInput.value = Currency(e.target.value);
                })

                form.elements[6].addEventListener('input', (e) => {
                    let Currency = (value) => new Intl.NumberFormat('tr-TR', {
                        style: 'currency',
                        currency: 'TRY'
                    }).format(value);
                    show2.textContent = Currency(e.target.value);
                    show2.previousElementSibling.textContent = "İlanda gözükecek olan : ";

                    let hiddenInput = show2.parentElement.nextElementSibling;
                    hiddenInput.value = Currency(e.target.value);
                });

                form.addEventListener('submit', (e) => {
                    e.preventDefault();
                    let empty, Arr = [], forDeletion = ['true'];

                    form.elements[1].value == "" ? (form.elements[1].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[1].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                    form.elements[2].value == "" ? (form.elements[2].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[2].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                    form.elements[3].value == "" ? (form.elements[3].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[3].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                    form.elements[4].value == "" ? (form.elements[4].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[4].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                    form.elements[6].value == "" ? (form.elements[6].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[6].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                    form.elements[8].value == "0" ? (form.elements[8].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[8].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                    form.elements[9].value == "" ? (form.elements[9].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[9].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                    form.elements[10].value == "" ? (form.elements[10].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[10].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                    form.elements[11].value == "" ? (form.elements[11].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[11].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');
                    form.elements[12].value == "" ? (form.elements[12].style.border = "1px solid red", Arr = Arr.filter(item => !forDeletion.includes(item))) : form.elements[12].style.border = "1px solid rgb(206, 212, 218)", Arr.push('true');


                    async function uploadFile2() {
                        let myForm = e.target;
                        let formData = new FormData(myForm);
                        const response = await fetch('ilanlar/new2.php', {
                            method: "POST",
                            body: formData
                        });

                        const data = await response.json();
                        if(data['status'] == "done"){
                            form.style.display = "none";
                            form.nextElementSibling.style.display = "block";
                            document.querySelector("#content > div.box > div > div.texts > nav > span.bind").textContent = document.location.origin+'/index.php?q='+data['permalink'];
                        }
                    }

                    if (Arr.length >= 10) {
                        uploadFile2()
                    }

                })

            }
        }
    </script>
</div>