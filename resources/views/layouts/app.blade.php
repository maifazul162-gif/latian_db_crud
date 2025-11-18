<!DOCTYPE html>
<html>
<head>
 <title>CRUD Menu Makanan</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
 <h2 class="text-center mb-4">CRUD Menu Makanan</h2>
 @if(session('success'))
 <div id="alertMessage" class="alert alert-success alert-dismissible fade show" 
role="alert">
 {{ session('success') }}
 </div>
 <script>
 // Setelah 3 detik (3000 ms), sembunyikan alert
 setTimeout(() => {
 const alertBox = document.getElementById('alertMessage');
 if (alertBox) {
 alertBox.classList.remove('show');
 alertBox.classList.add('fade');
 setTimeout(() => alertBox.remove(), 500); // hapus elemen setelah animasi
 }
 }, 3000);
 </script>
@endif
 @yield('content')
</div>
</body>
</html>