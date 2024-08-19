<!-- resources/views/home.blade.php -->
<x-home.layout>
   
    <div class="container max-w-screen-xl mx-auto px-4">

        <div class="flex flex-col lg:flex-row justify-between space-x-20">
            <div class="text-center lg:text-left mt-40">
                <h1 class="font-semibold text-gray-900 text-3xl md:text-6xl leading-normal mb-6">Selamat Datang<br>Di Media Informasi Stunting</h1>

                <p class="font-light text-gray-400 text-md md:text-lg leading-normal mb-12">Temukan informasi terpercaya dan berguna tentang stunting, pertumbuhan anak, dan perawatan yang tepat untuk si kecil. Kami hadir untuk membantu Anda memahami <br>dan mengatasi stunting secara efektif.</p>

                <a href="#cegah" class="px-6 py-4 bg-info font-semibold text-white text-lg rounded-xl hover:bg-blue-700 transition ease-in-out duration-500">Get started</a>
            </div>

            <div class="mt-24">
                <img src="assets/image/home.png" alt="Image">
            </div>
        </div>

    </div> <!-- container.// -->

    <!-- feature section -->
    <section class="bg-white py-16 md:mt-10">

        <div class="container max-w-screen-xl mx-auto px-4">

            <p id="cegah" class="font-light text-gray-500 text-lg md:text-xl text-center uppercase mb-6">Pencegahan</p>

            <h1 class="font-semibold text-gray-900 text-xl md:text-4xl text-center leading-normal mb-10">3 Hal <br> Penting mencegah stunting pada anak</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-20">
                <div class="text-center">
                    <div class="flex justify-center mb-6">
                        <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl">
                            <i data-feather="globe"></i>
                        </div>
                    </div>

                    <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">Gizi Seimbang dan Cukup</h4>

                    <p class="font-light text-gray-500 text-md md:text-xl mb-6 text-justify">Pastikan anak mendapatkan nutrisi yang cukup dan seimbang. Ini termasuk asupan protein, vitamin, mineral, dan zat gizi lainnya yang diperlukan untuk pertumbuhan yang optimal. Pilih makanan yang kaya akan nutrisi, seperti buah-buahan, sayuran, protein nabati dan hewani, serta sumber karbohidrat kompleks.</p>

                </div>

                <div class="text-center">
                    <div class="flex justify-center mb-6">
                        <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl">
                            <i data-feather="arrow-up-right"></i>
                        </div>
                    </div>

                    <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">Perawatan Kesehatan yang Baik</h4>

                    <p class="font-light text-gray-500 text-md md:text-xl mb-6 text-justify">Jaga kesehatan anak dengan memberikan vaksinasi yang tepat waktu, menghindari infeksi, dan memberikan perawatan yang baik saat anak sakit. Infeksi berulang atau kondisi kesehatan yang tidak terkontrol dapat mempengaruhi penyerapan nutrisi tubuh dan pertumbuhan anak.</p>

                </div>

                <div class="text-center">
                    <div class="flex justify-center mb-6">
                        <div class="w-20 py-6 flex justify-center bg-blue-200 bg-opacity-30 text-blue-700 rounded-xl">
                            <i data-feather="clock"></i>
                        </div>
                    </div>

                    <h4 class="font-semibold text-lg md:text-2xl text-gray-900 mb-6">Stimulasi dan Perkembangan</h4>

                    <p class="font-light text-gray-500 text-md md:text-xl mb-6 text-justify">Berikan stimulasi yang tepat dan dukungan dalam perkembangan fisik, kognitif, dan emosional anak. Ini meliputi interaksi yang positif, permainan yang mendukung perkembangan motorik, kegiatan membaca, dan eksplorasi lingkungan yang aman. Stimulasi yang baik dapat membantu otak dan tubuh anak berkembang secara optimal.</p>
                </div>
            </div>

        </div> <!-- container.// -->

    </section>
    <!-- feature section //end -->

    <!-- donation section -->
    <section class="bg-white py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <h1 class="font-semibold text-gray-900 text-xl md:text-4xl text-center mb-16" id="artikels">Artikels</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($artikels as $artikel)
                    <div class="px-6 py-6 w-full border-2 border-gray-200 rounded-3xl">
                        <img src="{{ asset('storage/'.$artikel->image) }}" alt="{{ $artikel->judul }}" class="mb-6 hover:opacity-75 transition ease-in-out duration-500">
        
                        <h4 class="font-semibold text-gray-900 text-lg md:text-2xl mb-6">{{ $artikel->judul }}</h4>
        
                        <p class="font-light text-gray-400 text-sm md:text-md lg:text-lg mb-10">{{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 150) }}</p>
        
                    
                        <button onclick="window.location.href='{{ route('homeArtikel.show', ['judul' => $artikel->judul]) }}'" class="w-full py-4 bg-info font-semibold text-white text-lg rounded-xl hover:bg-blue-800 transition ease-in-out duration-500">
                                Baca Selengkapnya
                            </button>
                    </div>
                @endforeach
            </div>

        </div> <!-- container.// -->

    </section>
    <!-- donation section //end -->

    <!-- feature section -->
    <section class="bg-white py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col lg:flex-row justify-between space-x-16">
                <div class="flex justify-center lg:justify-start">
                    <img src="assets/image/feature-img.png" alt="Image">
                </div>

                <div class="mt-16">
                    <h1 class="font-semibold text-gray-900 text-xl md:text-4xl mb-20">Informasi Stunting Pada <br> Puskesmas Bangkir</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 md:space-x-20 mb-16">
                        <div class="mb-5 md:mb-0">
                            <div class="w-20 py-6 flex justify-center bg-info bg-opacity-5 rounded-xl mb-4">
                                <i data-feather="sun" class="text-info"></i>
                            </div>

                            <h3 class="font-semibold text-gray-900 text-xl md:text-3xl mb-4">BANGKIR
                            </h3>

                            <p class="font-light text-gray-400 text-md md:text-lg">Jumlah anak yang terkena stunting <br> 21
                            </p>
                        </div>

                        <div>
                            <div class="w-20 py-6 flex justify-center bg-red-500 bg-opacity-5 rounded-xl mb-4">
                                <i data-feather="award" class="text-red-500"></i>
                            </div>

                            <h3 class="font-semibold text-gray-900 text-xl md:text-3xl mb-4">DONGKO
                            </h3>

                            <p class="font-light text-gray-400 text-md md:text-lg">Jumlah anak yang terkena stunting <br> 10</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 md:space-x-20">
                        <div class="mb-5 md:mb-0">
                            <div class="w-20 py-6 flex justify-center bg-yellow-500 bg-opacity-5 rounded-xl mb-4">
                                <i data-feather="users" class="text-yellow-500"></i>
                            </div>

                            <h3 class="font-semibold text-gray-900 text-xl md:text-3xl mb-4">MIMBALA
                            </h3>

                            <p class="font-light text-gray-400 text-md md:text-lg">Jumlah anak yang terkena stunting <br> 6</p>
                        </div>

                        <div>
                            <div class="w-20 py-6 flex justify-center bg-green-500 bg-opacity-5 rounded-xl mb-4">
                                <i data-feather="trending-up" class="text-green-500"></i>
                            </div>

                            <h3 class="font-semibold text-gray-900 text-xl md:text-3xl mb-4">LEMPE
                            </h3>

                            <p class="font-light text-gray-400 text-md md:text-lg">Jumlah anak yang terkena stunting <br> 17</p>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container.// -->

    </section>
    <!-- feature section //end -->

    <!-- join volunteers section -->
    <section class="bg-white py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="w-full h-full bg-blue-500 rounded-2xl md:rounded-3xl relative lg:flex items-center">
                <div class="hidden lg:block">
                    <img src="assets/image/humans2.png" alt="Image" class="relative z-10">

                    <img src="assets/image/pattern-2.png" alt="Image" class="absolute top-14 left-40">

                    <img src="assets/image/pattern.png" alt="Image" class="absolute top-0 z-0">
                </div>

                <div class="lg:relative py-4 lg:py-0">
                    <br>
                    <h1 class="font-semibold text-white text-xl md:text-4xl text-center lg:text-left leading-normal md:mb-5 lg:mb-10">Jika Ingin Berkomentar <br>Dan Ingin Menambahkan <br> Artikels Di Atas ? <br>Silahkan Berikan Disini!</h1>
                    @if (session('success'))
                <div class="bg-green-500 text-white text-center py-2 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="/komentar" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg space-y-4">
                @csrf
                <div>
                    <label for="judul" class="block text-gray-700 text-sm font-medium">judul Komentar</label>
                    <input type="text" name="judul" id="judul" placeholder="judul Komentar" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" required></input>
                </div>
                <div>
                    <label for="judul" class="block text-gray-700 text-sm font-medium">Artikel</label>
                    <select name="artikel_id" id="artikel" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" required>
                        <option value="">Pilih Judul Artikel</option>
                        @foreach ($artikels as $artikel)
                            <option value="{{ $artikel->id }}">{{ $artikel->judul }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div>
                    <label for="kategori_id" class="block text-gray-700 text-sm font-medium">Kategori Artikel</label>
                    <select name="kategori_id" id="kategori_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div>
                    <label for="isi" class="block text-gray-700 text-sm font-medium">Isi Komentar</label>
                    <textarea name="isi" id="isi" rows="5" placeholder="Isi Komentar" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" required></textarea>
                </div>
            
                <div class="text-center">
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">Kirim Komentar</button>
                </div>
            </form>
                    </div>
                </div>
            </div>

        </div> <!-- container.// -->

    </section>
    <!-- join volunteers section //end -->

    <footer class="bg-white py-16">

        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row lg:justify-between">

                <div class="space-y-7 mb-10 lg:mb-0">
                    <div class="flex justify-center lg:justify-start">
                        <img src="assets/image/navbar-logo2.png" alt="Image">
                    </div>
                    
                    <p class="font-light text-gray-400 text-md md:text-lg text-center lg:text-left">Terimakasih <br> telah mengunjungi website kami!</p>

                    <div class="flex items-center justify-center lg:justify-start space-x-5">
                        <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-info hover:text-white transition ease-in-out duration-500">
                            <i data-feather="facebook"></i>
                        </a>

                        <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-info hover:text-white transition ease-in-out duration-500">
                            <i data-feather="twitter"></i>
                        </a>

                        <a href="#" class="px-3 py-3 bg-gray-200 text-gray-700 rounded-full hover:bg-info hover:text-white transition ease-in-out duration-500">
                            <i data-feather="linkedin"></i>
                        </a>
                    </div>
                </div>
               
            </div>
        </div> <!-- container.// -->

    </footer>

    <script>
        feather.replace()
    </script>

</x-home.layout>
