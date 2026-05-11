<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sistem Kurikulum</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            min-height: 100vh;
        }
        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #004a8c;
            color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar-header {
            padding: 20px;
            background-color: #003666;
            text-align: center;
            border-bottom: 2px solid #f2a900;
        }
        .sidebar-header h2 {
            margin: 0;
            font-size: 20px;
        }
        .sidebar-nav {
            padding: 20px 0;
            flex-grow: 1;
        }
        .sidebar-nav a {
            display: block;
            padding: 12px 25px;
            color: #d1e3f8;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s, color 0.3s;
        }
        .sidebar-nav a:hover, .sidebar-nav a.active {
            background-color: #005bb5;
            color: white;
            border-left: 4px solid #f2a900;
            padding-left: 21px;
        }
        
        /* Main Content */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .topbar {
            background-color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .btn-logout {
            background-color: #d9534f;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
            margin-top: 0 !important;
        }
        .btn-logout:hover {
            background-color: #c9302c !important;
        }
        .content-area {
            padding: 30px;
            overflow-y: auto;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            padding: 25px;
        }
        
        /* General Typography */
        h3 {
            color: #004a8c;
            margin-top: 0;
            border-bottom: 2px solid #f2a900;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            max-width: 600px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            margin-top: 15px;
            font-weight: 600;
            color: #004a8c;
            font-size: 14px;
        }
        input[type="text"], input[type="number"], input[type="url"], select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.3s;
            background-color: #fdfdfd;
        }
        input[type="text"]:focus, input[type="number"]:focus, input[type="url"]:focus, select:focus {
            outline: none;
            border-color: #004a8c;
            box-shadow: 0 0 0 2px rgba(0,74,140,0.2);
            background-color: #fff;
        }
        button[type="submit"], input[type="submit"] {
            background-color: #004a8c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            margin-top: 20px;
            transition: background 0.3s;
        }
        button[type="submit"]:hover, input[type="submit"]:hover {
            background-color: #003666;
        }

        /* Tables Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            background-color: #fff;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 0 0 1px #e0e0e0;
        }
        th {
            background-color: #004a8c;
            color: white;
            text-align: left;
            padding: 12px 15px;
            font-weight: 500;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            color: #333;
            vertical-align: middle;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover td {
            background-color: #f5f8fb;
        }

        /* Top level anchor (Tambah Button) */
        .card > a {
            background-color: #004a8c;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 15px;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.3s;
        }
        .card > a:hover {
            background-color: #003666;
        }

        /* Action buttons inside table */
        td a {
            color: #004a8c;
            text-decoration: none;
            font-weight: 600;
            margin-right: 10px;
            font-size: 13px;
        }
        td a:hover {
            text-decoration: underline;
        }
        td form {
            display: inline-block;
            margin: 0;
            padding: 0;
        }
        td form button {
            background: none;
            border: none;
            color: #d9534f;
            cursor: pointer;
            font-weight: 600;
            padding: 0;
            margin: 0;
            font-size: 13px;
        }
        td form button:hover {
            text-decoration: underline;
            background: none;
        }

        /* Search Bar */
        .search-bar-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }
        .search-bar-wrapper form {
            display: flex;
            align-items: center;
            gap: 0;
            max-width: 420px;
            width: 100%;
            position: relative;
        }
        .search-bar-wrapper form input[type="text"] {
            flex: 1;
            padding: 10px 40px 10px 38px;
            border: 2px solid #d0d8e0;
            border-radius: 8px;
            font-size: 14px;
            background: #f8fafc;
            transition: border-color 0.3s, box-shadow 0.3s, background 0.3s;
            margin: 0;
        }
        .search-bar-wrapper form input[type="text"]:focus {
            border-color: #004a8c;
            box-shadow: 0 0 0 3px rgba(0,74,140,0.15);
            background: #fff;
            outline: none;
        }
        .search-bar-wrapper form .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #8899a6;
            font-size: 15px;
            pointer-events: none;
            transition: color 0.3s;
        }
        .search-bar-wrapper form input[type="text"]:focus ~ .search-icon,
        .search-bar-wrapper form:focus-within .search-icon {
            color: #004a8c;
        }
        .search-bar-wrapper form button[type="submit"] {
            position: absolute;
            right: 4px;
            top: 50%;
            transform: translateY(-50%);
            background: #004a8c;
            color: white;
            border: none;
            padding: 7px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            margin: 0;
            transition: background 0.3s;
        }
        .search-bar-wrapper form button[type="submit"]:hover {
            background: #003666;
        }
        .search-bar-wrapper .btn-clear-search {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: none;
            border: 1px solid #d0d8e0;
            color: #8899a6;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.3s;
        }
        .search-bar-wrapper .btn-clear-search:hover {
            border-color: #d9534f;
            color: #d9534f;
            background: #fff5f5;
        }
        .search-result-info {
            font-size: 13px;
            color: #6b7a8d;
            margin-bottom: 10px;
        }
        .search-result-info strong {
            color: #004a8c;
        }
        .no-results {
            text-align: center;
            padding: 40px 20px;
            color: #8899a6;
        }
        .no-results .no-results-icon {
            font-size: 48px;
            margin-bottom: 12px;
            opacity: 0.4;
        }
        .no-results p {
            margin: 4px 0;
            font-size: 15px;
        }
        .no-results .no-results-hint {
            font-size: 13px;
            color: #aab8c2;
        }

        /* Top action bar (search + tambah button) */
        .top-action-bar {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }
        .top-action-bar > a {
            white-space: nowrap;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2> Admin Panel</h2>
        </div>
        <div class="sidebar-nav">
            <a href="/prodi">Prodi</a>
            <a href="/kurikulum">Kurikulum</a>
            <a href="/angkatan">Angkatan</a>
            <a href="/semester">Semester</a>
            <a href="/matakuliah">Mata Kuliah</a>
            <a href="/rps" target="_blank" style="margin-top: 20px; border-top: 1px solid #005bb5; padding-top: 20px;">Lihat Web Publik ↗</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div>
                <strong>Sistem Kurikulum Kampus</strong>
            </div>
            <div class="user-info">
                @auth
                    <span>Halo, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong></span>
                    <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" class="btn-logout">Logout</button>
                    </form>
                @endauth
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            <div class="card">
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>