<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Kurikulum & RPS Fakultas Teknik UNSULBAR</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        /* Navbar Styling */
        .navbar {
            background-color: #0c2d4f; /* Navy Blue dari desain */
            color: #fff;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            border-bottom: 3px solid #f2a900;
        }
        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .navbar-logo img {
            height: 50px;
            width: auto;
        }
        .btn-login-nav {
            background-color: transparent;
            color: #ffffffff;
            border: 1px solid #ffffffff;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-login-nav:hover {
            background-color: #ffffffff;
            color: #0c2d4f;
        }
        .navbar-logo-text {
            display: flex;
            flex-direction: column;
        }
        .navbar-logo-text .title {
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 0;
        }
        .navbar-logo-text .subtitle {
            font-size: 12px;
            opacity: 0.8;
            margin: 0;
        }

        .public-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            flex-grow: 1; /* Pushes footer to bottom */
            width: 100%;
            box-sizing: border-box;
        }
        .public-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 30px;
            margin-bottom: 30px;
        }
        .public-card h3 {
            color: #004a8c;
            margin-top: 0;
            border-bottom: 2px solid #eee;
            padding-bottom: 12px;
            font-size: 20px;
        }
        .vision-mission {
            line-height: 1.6;
            font-size: 15px;
        }
        .vision-mission h4 {
            margin-bottom: 8px;
            color: #222;
            font-size: 16px;
        }
        .vision-mission ul {
            margin-top: 0;
            padding-left: 20px;
        }
        .vision-mission li {
            margin-bottom: 6px;
        }
        
        /* Footer Styling */
        .footer {
            background-color: #0c2d4f;
            color: #d1e0ec;
            padding: 40px 20px 20px;
            margin-top: 40px;
            font-size: 13px;
        }
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 30px;
        }
        .footer-col {
            display: flex;
            flex-direction: column;
        }
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            justify-content: center;
        }
        .footer-logo img {
            height: 40px;
        }
        .footer-logo-text {
            color: #fff;
            font-weight: bold;
            font-size: 14px;
        }
        .footer-links {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer-links a {
            display: block;
            color: #d1e0ec;
            text-decoration: none;
            margin-bottom: 10px;
            font-weight: 500;
            font-size: 12px;
        }
        .footer-links a:hover {
            color: #fff;
            text-decoration: underline;
        }
        .footer-contact {
            margin-top: 20px;
            line-height: 1.8;
            color: #9ab4cd;
            font-size: 12px;
        }
        .footer-col h4 {
            color: #fff;
            text-align: center;
            font-size: 16px;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .map-container {
            width: 100%;
            height: 200px;
            border-radius: 4px;
            overflow: hidden;
            border: 1px solid #1a4269;
        }
        
        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">
            <!-- URL Logo Unsulbar -->
            <img src="/images/fakultas-teknik.png" alt="Logo Unsulbar">
        </div>
        <div>
            <a href="/login" class="btn-login-nav">Login Admin</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="public-container">
        
        <div class="public-card vision-mission">
            <h3>Visi & Misi Fakultas Teknik UNSULBAR</h3>
            
            <h4>Visi:</h4>
            <p>"Menjadi Fakultas Teknik yang unggul dalam pengembangan ilmu pengetahuan dan teknologi berwawasan lingkungan dan kearifan lokal pada tingkat nasional."</p>
            
            <h4 style="margin-top: 20px;">Misi:</h4>
            <ul>
                <li>Menyelenggarakan pendidikan akademik dan keahlian di bidang keteknikan yang bermutu dan relevan dengan kebutuhan masyarakat.</li>
                <li>Melaksanakan penelitian dan pengembangan IPTEK yang inovatif dan berdaya guna bagi peningkatan kesejahteraan masyarakat.</li>
                <li>Melaksanakan pengabdian kepada masyarakat berbasis hasil riset keteknikan yang tepat guna.</li>
                <li>Mengembangkan kerja sama dengan institusi pemerintah, swasta, dan industri di tingkat nasional maupun internasional.</li>
            </ul>
        </div>

        <div class="public-card" style="padding: 40px;">
            @yield('content')
        </div>

    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-container">
            <!-- Kolom 1 -->
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="/images/fakultas-teknik.png" alt="Logo Unsulbar">
                </div>
                
                <div class="footer-links">
                    <a href="https://sipil.unsulbar.ac.id/">TEKNIK SIPIL</a>
                    <a href="https://informatika.unsulbar.ac.id/">INFORMATIKA</a>
                    <a href="https://pwk.unsulbar.ac.id/">PERENCANAAN WILAYAH DAN KOTA</a>
                    <a href="https://si.unsulbar.ac.id/">SISTEM INFORMASI</a>
                    <a href="https://arsitektur.unsulbar.ac.id/">ARSITEKTUR</a>
                </div>

                <div class="footer-contact">
                    Email: fakultas.teknik@unsulbar.ac.id<br>
                    Telepon: (0422) 22559<br>
                    Alamat: Jalan Prof. Dr. Baharuddin Lopa, SH, Talumung. Majene.<br>
                    Sulawesi Barat, Indonesia
                </div>
            </div>

            <!-- Kolom 2 -->
            <div class="footer-col">
                <h4>Layanan</h4>
                <div class="footer-links">
                    <a href="https://siakad.unsulbar.ac.id/">SIAKAD</a>
                    <a href="https://ft.unsulbar.ac.id/pengaduan">Pengaduan</a>
                    <a href="https://ts.unsulbar.ac.id/">Tracer Study</a>
                    <a href="#">E-Learning</a>
                    <a href="https://informatika.unsulbar.ac.id/sintaks/">SINTAKS INFORMATIKA</a>
                    <a href="https://sipil.unsulbar.ac.id/sintaks/">SINTAKS TEKNIK SIPIL</a>
                </div>
                
                <div style="text-align: center; margin-top: 20px;">
                    <!-- Placeholder untuk Flag Counter -->
                    <a href="https://info.flagcounter.com/1O6w">
                            <img src="https://s01.flagcounter.com/count2/1O6w/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_10/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0" class="rounded shadow-sm">
                    </a>
                </div>
            </div>

            <!-- Kolom 3 -->
            <div class="footer-col">
                <h4>Lokasi</h4>
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15933.727506972054!2d118.88764041042735!3d-3.0456108529267073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d9302506b3a2ce5%3A0x33446dfc8e104e13!2sUniversitas%20Sulawesi%20Barat!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
        
        <!-- Admin Link & Copyright -->
        <div style="text-align: center; margin-top: 40px; border-top: 1px solid #1a4269; padding-top: 20px; font-size: 12px; color: #7c98b6;">
            &copy; {{ date('Y') }} Fakultas Teknik Universitas Sulawesi Barat. All rights reserved.
        </div>
    </div>

</body>
</html>
