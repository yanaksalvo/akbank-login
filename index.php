<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Ekranı</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            font-size: 16px;
            color: #333;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* İçeriği dikeyde yayar */
            align-items: center;
        }

        .logo {
            margin-top: 20px;
        }

        .header h1 {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
            color: #000000;
        }

        .button {
            margin-top: 20px;
        }

        .button a {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 25px;
            background-color: #d41f1f;
            color: #ffffff;
        }

        .language-selector {
            margin-bottom: 10px; /* Footer'a yakın olacak şekilde ayarlanmış */
        }

        .footer {
            padding: 20px;
            background-color: #d41f1f;
            color: #ffffff;
            display: flex;
            justify-content: center;
            gap: 30px;
            width: 100%; /* Footer'ı tam genişlik yapar */
        }

        .icon {
            text-align: center;
        }

        .footer .icon div {
            font-size: 14px;
            font-weight: bold;
        }

        .footer .icon img {
            width: 40px;
            height: 40px;
        }

        .footer .exchange-rate {
            margin-top: 10px;
            font-size: 14px;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="logo">
        <center><img src="images/akbank-logo.png" alt="Akbank Logo" width="225"></center>
    </div>

    <div class="header">
        <center><h1>Hoşgeldiniz</h1></center>
    </div>
	<div class="header">
        <center><h3>%0 Faizli Ön Onaylı Krediye Hemen Başvurun</h3></center>
    </div>

    <div class="button">
        <center><h1><a href="giris.php" class="red-button">Başvuru Yap</a></h1></center>
    </div>

    <div class="language-selector">
        <center><img src="images/dil.png" alt="Dil Seçeneği" width="40"></center>
    </div>

    <div class="footer">
        <div class="icon">
            <img src="images/credit-card.png" alt="Kredi ve kart başvuruları">
            <div>Kredi ve</div>
            <div>kart başvuruları</div>
        </div>
        <div class="icon">
            <img src="images/currency.png" alt="Döviz kurları">
            <div>Döviz</div>
            <div>kurları</div>
        </div>
        <div class="icon">
            <img src="images/bank.png" alt="En yakın Akbank">
            <div>En yakın</div>
            <div>Akbank</div>
        </div>
    </div>
</body>
</html>
