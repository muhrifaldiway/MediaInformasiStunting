<!-- resources/views/components/sidebar.blade.php -->

<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="/admin" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Puskesmas Bangkir</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <x-sidebar-link href="/admin" :active="request()->is('admin')" icon="fas fa-tachometer-alt">
            Admin
        </x-sidebar-link>
        <x-sidebar-link href="/user" :active="request()->is('user')" icon="fas fa-sticky-note">
            User
        </x-sidebar-link>
        <x-sidebar-link href="/diagnosa" :active="request()->is('diagnosa')" icon="fas fa-table">
            Diagnosa
        </x-sidebar-link>
        <x-sidebar-link href="/komentars" :active="request()->is('komentars')" icon="fas fa-align-left">
            Komentar
        </x-sidebar-link>
        <div x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left text-white text-base font-semibold flex items-center px-6 py-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 transition duration-150 ease-in-out">
                <i class="fas fa-tablet-alt mr-3"></i>
                <span>Artikel</span>
                <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas ml-auto"></i>
            </button>
            <div x-show="open" class="pl-12">
                <x-sidebar-link href="/artikels" :active="request()->is('artikels')" icon="fas fa-file-alt">
                    Semua Artikel
                </x-sidebar-link>
                <x-sidebar-link href="/kategoriArtikel" :active="request()->is('kategoriArtikel')" icon="fas fa-heartbeat">
                    Kategori Artikel
                </x-sidebar-link>
            </div>
        </div>
    </nav>
</aside>
