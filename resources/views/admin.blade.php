<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title> 
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-4xl font-bold text-gray-800 pb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card for Masyarakat -->
            <div class="bg-gradient-to-r from-green-400 to-green-600 text-white shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Jumlah Masyarakat</h2>
                        <p class="text-4xl">{{ $jumlahMasyarakat }}</p>
                    </div>
                </div>
            </div>

            <!-- Card for Petugas -->
            <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Jumlah Petugas</h2>
                        <p class="text-4xl">{{ $jumlahPetugas }}</p>
                    </div>
                </div>
            </div>

            <!-- Card for Artikel -->
            <div class="bg-gradient-to-r from-purple-400 to-purple-600 text-white shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Jumlah Artikel</h2>
                        <p class="text-4xl">{{ $jumlahArtikel }}</p>
                    </div>
                </div>
            </div>
            <!-- Card for kategori -->
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Jumlah Kategori Artikel</h2>
                        <p class="text-4xl">{{ $jumlahKategori }}</p>
                    </div>
                </div>
            </div>
            <!-- Card for komentar -->
            <div class="bg-gradient-to-r from-red-400 to-red-600 text-white shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Jumlah Komentar</h2>
                        <p class="text-4xl">{{ $jumlahKomentar }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-violet-800 to-violet-950 text-white shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Jumlah Konsultasi</h2>
                        <p class="text-4xl">{{ $jumlahKonsultasi }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-green-800 to-green-950 text-white shadow-lg rounded-lg p-6">
                <div class="flex items-center">
                    <div class="mr-4">
                        <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14L5.84 10.578a12.083 12.083 0 000 6.844L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16 3.422a12.083 12.083 0 010-6.844L12 14z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Jumlah Diagnosa</h2>
                        <p class="text-4xl">{{ $jumlahDiagnosa }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
