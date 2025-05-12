<!-- Navbar -->
<nav class="bg-biru_tua shadow-lg font-poppins sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="images/icon.png" alt="Logo" class="w-10 h-10 border-2 border-white rounded-full object-cover" />
            <div class="text-xl font-bold text-white">SIPPP</div>
        </div>

        <!-- Hamburger menu button (mobile) -->
        <div class="md:hidden">
            <button id="menu-button" class="text-white focus:outline-none" onclick="toggleMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Menu Links (desktop) -->
        <div class="hidden md:flex md:items-center md:space-x-6">
            <a href="#tentang" class="text-white hover:text-blue-400 transition">Tentang</a>
            <a href="#keunggulan" class="text-white hover:text-blue-400 transition">Keunggulan</a>
            <a href="javascript:void(0);" onclick="openModal()" class="bg-biru_muda hover:bg-white hover:text-biru_muda text-white font-semibold px-6 py-2 rounded-full transition duration-300 shadow">
                Login
            </a>
        </div>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
        <a href="#tentang" class="block text-white py-2 hover:text-blue-400">Tentang</a>
        <a href="#keunggulan" class="block text-white py-2 hover:text-blue-400">Keunggulan</a>
        <a href="javascript:void(0);" onclick="openModal()" class="block text-center mt-2 bg-biru_muda hover:bg-white hover:text-biru_muda text-white font-semibold px-6 py-2 rounded-full transition duration-300 shadow">
            Login
        </a>
    </div>
</nav>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>
