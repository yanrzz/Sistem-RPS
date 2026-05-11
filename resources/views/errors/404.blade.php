<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Halaman Tidak Ditemukan - Fakultas Teknik UNSULBAR</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0c2d4f; /* Navy background */
            color: #fff;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .error-container {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 50px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            max-width: 500px;
            width: 90%;
            position: relative;
            overflow: hidden;
        }
        /* Dekorasi kuning */
        .error-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: #f2a900;
        }
        .error-code {
            font-size: 100px;
            font-weight: 900;
            color: #f2a900;
            margin: 0;
            line-height: 1;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        }
        .error-title {
            font-size: 24px;
            color: #fff;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .error-desc {
            color: #d1e0ec;
            margin-bottom: 35px;
            line-height: 1.6;
            font-size: 15px;
        }
        .btn-home {
            background-color: transparent;
            color: #f2a900;
            border: 2px solid #f2a900;
            text-decoration: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s;
            display: inline-block;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 13px;
        }
        .btn-home:hover {
            background-color: #f2a900;
            color: #0c2d4f;
            box-shadow: 0 0 15px rgba(242, 169, 0, 0.4);
        }
    </style>
</head>
<body>

    <div class="error-container">
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Oops! Halaman Tidak Ditemukan</h2>
        <p class="error-desc">Maaf, halaman yang Anda coba akses mungkin telah dihapus, dipindahkan, atau Anda salah memasukkan URL.</p>
        <a href="/rps" class="btn-home">&larr; Kembali ke Beranda</a>
    </div>

</body>
</html>
