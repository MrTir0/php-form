<?php

if (isset($_POST['submit'])) {
    $isim = isset($_POST['isim']) ? $_POST['isim'] : null;
    $soy_isim = isset($_POST['soy_isim']) ? $_POST['soy_isim'] : null;
    $mail = isset($_POST['mail']) ? $_POST['mail'] : null;

    if (!$isim) {
        echo  'Lütfen isiminizi giriniz';
    } elseif (!$soy_isim) {
        echo 'Lütfen soyisminizi giriniz';
    } else {
        $sorgu = $db->prepare('INSERT INTO test.uyeler SET 
            uye_adi = ?,
            uye_soyadi = ?,
            uye_eposta = ? ');

        $ekle = $sorgu->execute([$isim, $soy_isim, $mail]);


        if ($ekle) {
            header('Location:index.php');
        } else {
            $hata = $sorgu->errorInfo();
            echo 'MySQL hatası' . $hata[2];
        }
    }
}
?>

<form action="" method="post">
    <div style = "text-align : center ;">
        İsim : <br>
        <input type="text" value="<?php echo isset($_POST['isim']) ? $_POST['isim'] : null ?> " name=" isim">
        Soyisim : <br><br>
        <input type="text" value="<?php echo isset($_POST['soy_isim']) ? $_POST['soy_isim'] : null ?> " name=" soy_isim">
        Mail : <br><br>
        <input type="text" value="<?php echo isset($_POST['mail']) ? $_POST['mail'] : null ?>" name=" mail">
    </div>
    <input type="hidden" name="submit" value="1"><br><br>
    <button type="submit"> Gönder </button>
</form>
