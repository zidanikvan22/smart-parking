<nav class="bg-blue-600 text-white p-4 relative z-50">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-base font-bold pl-2" id="greeting">Hallo, Selamat Pagi</h1>
        <div class="dropdown-wrapper">
            <div class="flex items-center cursor-pointer" id="profileDropdown">
                <span class="mr-2 text-sm">Nama Pengguna</span>
                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="dropdown-menu mt-2 w-48 bg-white rounded-md shadow-lg hidden" id="dropdownMenu">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ganti Password</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const greetingElement = document.getElementById("greeting");
        const currentHour = new Date().getHours();

        let greetingText = "Hallo, ";
        if (currentHour >= 5 && currentHour < 12) {
            greetingText += "Selamat Pagi";
        } else if (currentHour >= 12 && currentHour < 18) {
            greetingText += "Selamat Siang";
        } else if (currentHour >= 18 && currentHour <= 23) {
            greetingText += "Selamat Malam";
        } else {
            greetingText += "Selamat Dini Hari";
        }

        greetingElement.textContent = greetingText;
    });

</script>
