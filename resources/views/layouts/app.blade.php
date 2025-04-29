<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muslim-Go</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Scheherazade&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/muslim-go/muslim-go/public/">🕌 Muslim-Go</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/muslim-go/muslim-go/public/quran/">Quran</a></li>
                    <li class="nav-item"><a class="nav-link" href="/muslim-go/muslim-go/public/doa/">Doa</a></li>
                    <li class="nav-item"><a class="nav-link" href="/muslim-go/muslim-go/public/dzikir">Dzikir</a></li>
                    <li class="nav-item"><a class="nav-link" href="/muslim-go/muslim-go/public/asmaulhusna">Asmaul Husna</a></li>
                    <li class="nav-item"><a class="nav-link" href="/muslim-go/muslim-go/public/hadits">Hadits</a></li>
                    <li class="nav-item"><a class="nav-link" href="/qibla">Arah Qiblat</a></li>
                    <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center p-3 bg-white shadow-lg mt-5">
        <small>&copy; 2025 Muslim-Go. Semua Hak Dilindungi.</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
