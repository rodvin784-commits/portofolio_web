<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPortfolio — Dashboard</title>

    <!-- Typography: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Sets: Bootstrap Icons & FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js (Untuk Interaksi Dropdown) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind System Configuration -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        bg: '#0D1117',
                        surface: '#161B22',
                        card: '#1C2128',
                        navbar: '#111827',
                        border: '#30363D',
                        primary: {
                            DEFAULT: '#22C55E',
                            hover: '#16A34A',
                            light: '#4ADE80',
                            glow: 'rgba(34, 197, 94, 0.25)',
                        },
                        text: {
                            heading: '#F8FAFC',
                            body: '#CBD5E1',
                            secondary: '#94A3B8',
                            disabled: '#64748B',
                        },
                        status: {
                            success: '#22C55E',
                            warning: '#FACC15',
                            danger: '#EF4444',
                            info: '#3B82F6',
                        }
                    },
                    borderRadius: {
                        'btn': '12px',
                        'card': '18px',
                        'input': '12px',
                        'modal': '20px',
                    },
                    boxShadow: {
                        'card': '0 10px 30px rgba(0, 0, 0, 0.25)',
                        'glow': '0 0 25px rgba(34, 197, 94, 0.2)',
                    }
                }
            }
        }
    </script>

    <!-- Custom Micro-Interactions & Form Styles -->
    <style>
        body {
            background-color: #0D1117;
            color: #CBD5E1;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 15px;
        }

        .custom-input {
            background-color: #161B22;
            border: 1px solid #30363D;
            color: #F8FAFC;
            transition: all 0.3s ease;
        }
        .custom-input:focus {
            outline: none;
            border-color: #22C55E;
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.25);
        }

        .hover-card {
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-5px) scale(1.03);
            border-color: #22C55E;
            box-shadow: 0 0 25px rgba(34, 197, 94, 0.2);
        }

        .btn-animate {
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-animate:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body class="bg-bg text-text-body antialiased min-h-screen flex flex-col selection:bg-primary selection:text-white">

    <!-- ================= NAVBAR ================= -->
    <header class="bg-navbar border-b border-border sticky top-0 z-50 backdrop-blur-md bg-opacity-90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex justify-between items-center">

            <!-- Logo / Brand -->
            <a href="{{ route('projects.index') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-btn bg-surface border border-border flex items-center justify-center text-primary group-hover:border-primary transition-colors">
                    <i class="bi bi-briefcase-fill text-lg"></i>
                </div>
                <span class="text-text-heading font-extrabold text-xl tracking-tight">MyPortfolio</span>
            </a>

            <!-- DROPDOWN PROFIL (ALPINE JS) -->
            <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                <!-- Tombol Trigger Profil -->
                <button @click="open = !open"
                        class="flex items-center gap-2 bg-surface hover:bg-card px-4 py-2.5 rounded-btn border border-border text-sm font-medium text-text-heading transition-all">
                    <i class="bi bi-person-circle text-primary text-base"></i>
                    <span>Vin</span>
                    <i class="bi bi-chevron-down text-xs text-text-muted transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                </button>

                <!-- Menu Dropdown -->
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-52 bg-card border border-border rounded-btn shadow-card py-2 z-50 overflow-hidden"
                     style="display: none;">

                    <!-- Item 1: Profil -->
                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-text-body hover:text-text-heading hover:bg-surface transition-colors">
                        <i class="bi bi-person text-primary"></i>
                        <span>Profil</span>
                    </a>

                    <!-- Item 2: Ganti Password -->
                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-text-body hover:text-text-heading hover:bg-surface transition-colors">
                        <i class="bi bi-lock text-status-warning"></i>
                        <span>Ganti Password</span>
                    </a>

                    <div class="border-t border-border my-1"></div>

                    <!-- Item 3: Logout -->
                    <a href="#" class="flex items-center gap-3 px-4 py-2.5 text-sm text-status-danger hover:bg-status-danger/10 transition-colors">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

        </div>
    </header>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-10">
        @yield('content')
    </main>

    <!-- ================= FOOTER ================= -->
    <footer class="border-t border-border py-6 text-center text-xs text-text-disabled">
        <p>&copy; {{ date('Y') }} MyPortfolio. VinRumere.</p>
    </footer>

</body>
</html>
