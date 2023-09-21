<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Desa Kalurahan Sentolo</title>
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
        <h1>{{ $data['judul'] }}</h1>
        <p>Aplikasi Kalurahan Sentolo</p>
    </div>
    <div class="container" align="justify">
        <p>{{ $data['kata-kata'] }}</p>
        <br>
        <center>
	        <p><a href="{{ $data['tautan'] }}"><button class="btn-primary">{{ $data['tombol'] }}</button></a></p>
        </center>
        <br>
        <p align="justify">{{ $data['kata-penutup'] }}</p>
    </div>
</body>
</html>
