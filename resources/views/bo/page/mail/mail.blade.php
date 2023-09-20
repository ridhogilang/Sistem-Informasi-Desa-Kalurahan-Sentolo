<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Email - Aplikasi Desa Kalurahan Sentolo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #007BFF;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
        }
        a .btn-primary{
        	color: white;
            text-decoration: none;
        }

        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Konfirmasi Alamat Email Anda</h1>
        <p>Aplikasi Desa Kalurahan Sentolo</p>
    </div>
    <div class="container" align="justify">
        <p>Terima kasih telah mendaftar di Aplikasi Desa Kalurahan Sentolo. Untuk menyelesaikan proses pendaftaran, silakan konfirmasikan alamat email Anda dengan mengklik tautan di bawah ini:</p>
        <br>
        <center>
	        <p><a href="{{ url('/sitemin-sentolo/verifymail/'.$verimail['id'])}}"><button class="btn-primary">Konfirmasi Email</button></a></p>
        </center>
        <br>
        <p align="justify">Jika Anda tidak mendaftar di Aplikasi Desa Kalurahan Sentolo, Anda dapat mengabaikan pesan ini.</p>
    </div>
</body>
</html>
