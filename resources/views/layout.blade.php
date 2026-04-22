<!DOCTYPE html>
<html>
<head>
    <title>Siakad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
       
        body {
            background: #F4F7FE !important; 
            font-family: 'Segoe UI', sans-serif;
            color: #1B1B1B;
            overflow-x: hidden;
            overflow-y: auto !important; 
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #FFFFFF;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            border-radius: 0 20px 20px 0;
            border-right: 1px solid #eee;
            z-index: 1050; 
        }

        .logo { font-weight: bold; font-size: 18px; }

        .menu a {
            display: block;
            padding: 12px;
            border-radius: 10px;
            text-decoration: none;
            color: #555;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .menu a:hover { background: rgba(93, 95, 239, 0.1); color: #5D5FEF; }
        .menu a.active-menu { background: linear-gradient(135deg, #5D5FEF, #EF5DA8); color: white; font-weight: 500; }

        
        .content { margin-left: 250px; padding: 30px; position: relative; z-index: 1; min-height: 100vh; }

        .card { background: #FFFFFF; border-radius: 16px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .btn-danger { background: #EF5DA8 !important; border: none; }

        .modal-backdrop { display: none !important; }


        .pagination {
            gap: 5px;
        }

        .pagination .page-link {
            border-radius: 8px !important;
            color: #5D5FEF; 
            border: none;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            padding: 8px 14px;
            font-size: 14px;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #5D5FEF, #EF5DA8) !important;
            color: white !important;
            font-weight: bold;
        }

        .pagination .page-link:hover {
            background: rgba(93, 95, 239, 0.1);
            color: #5D5FEF;
        }

        nav .flex.justify-between.flex-1.sm\:hidden, 
        nav p.text-sm.text-gray-700.leading-5 {
            display: none !important;
        }

        .admin-profile-box {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .admin-profile-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(93, 95, 239, 0.15) !important;
            border-color: #5D5FEF !important;
        }
    </style>
</head>
<body>

<div class="sidebar d-flex flex-column justify-content-between">
    <div>
        <div class="logo">
            <div>SISTEM AKADEMIK</div>
            <small style="color: gray; font-size: 12px;">Universitas Teknologi Bandung</small>
        </div>

        <div class="menu mt-4">
            <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active-menu' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="{{ url('/jurusan') }}" class="{{ request()->is('jurusan*') ? 'active-menu' : '' }}">
                <i class="bi bi-grid me-2"></i> Jurusan
            </a>
            <a href="{{ url('/mahasiswa') }}" class="{{ request()->is('mahasiswa*') ? 'active-menu' : '' }}">
                <i class="bi bi-people me-2"></i> Mahasiswa
            </a>
            <a href="{{ url('/matakuliah') }}" class="{{ request()->is('matakuliah*') ? 'active-menu' : '' }}">
                <i class="bi bi-book me-2"></i> Matakuliah
            </a>
        </div>
    </div>

    <div>
        <button type="button" onclick="confirmLogout()" class="btn btn-danger w-100">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
    </div>
</div>

<div class="content">
    <div class="d-flex justify-content-end mb-4">
        <div class="admin-profile-box shadow-sm" style="
            width: 50px; 
            height: 50px; 
            border-radius: 14px; 
            background: #FFFFFF; 
            display: flex; 
            align-items: center; 
            justify-content: center;
            border: 1px solid #eee;
        ">
            <img src="{{ asset('img/admin-icon.png') }}" 
                 alt="Admin" 
                 style="width: 32px; height: 32px; object-fit: contain;">
        </div>
    </div>

    @yield('content')
</div>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Yakin ingin keluar?',
            text: "Sesi Anda akan berakhir sekarang.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF5DA8', 
            cancelButtonColor: '#7C8DB5',
            confirmButtonText: 'Ya, Logout!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ url('/logout') }}";
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        const removeBackdrops = () => {
            const backdrops = document.querySelectorAll('.modal-backdrop, .sidebar-overlay, .fade.show');
            backdrops.forEach(el => el.remove());
            document.body.classList.remove('modal-open');
            document.body.style.overflow = 'auto';
            document.body.style.paddingRight = '0';
        };

        removeBackdrops();
        setTimeout(removeBackdrops, 1000);
    });
</script>

@yield('scripts')
</body>
</html>