<!-- resources/views/konsultasi.blade.php -->
<x-home.layout>
    <div class="container max-w-screen-xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row justify-between space-x-20">
            <div class="text-center lg:text-left mt-40">
                <h1 class="font-semibold text-gray-900 text-3xl md:text-6xl leading-normal mb-6">
                    Konsultasikan masalah kesehatan anak anda <br> pada kami!<br> Silahkan!
                </h1>

                <button onclick="toggleModal('modal-konsultasi')" class="px-6 py-4 bg-info font-semibold text-white text-lg rounded-xl hover:bg-blue-700 transition ease-in-out duration-500">
                    Konsultasi
                </button>
                
                <!-- Tombol Logout -->
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                    class="ml-4 px-6 py-4 bg-red-500 text-white font-semibold text-lg rounded-xl hover:bg-red-700 transition ease-in-out duration-500">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="mt-24">
                <img src="assets/image/home-img.png" alt="Image">
            </div>
        </div>
    </div> <!-- container.// -->

    <!-- Modal Konsultasi -->
    <div id="modal-konsultasi" class="fixed inset-0 hidden z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
            <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-bold text-gray-900">Konsultasi</h3>
                        <div class="mt-2">
                            <form action="/konsultasi" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label for="user" class="block text-sm font-medium text-gray-700">User</label>
                                    <input type="text" name="user" id="user" readonly
                                           class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-gray-200 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                                           value="{{ Auth::user()->username }}" required>
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                </div>
                                <div>
                                    <label for="pertanyaan" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                                    <textarea id="pertanyaan" name="pertanyaan" rows="3" class="mt-1 block w-full px-12 py-8 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                                              required>{{ old('pertanyaan') }}</textarea>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kirim</button>
                                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                            onclick="toggleModal('modal-konsultasi')">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Section -->
    <div class="container max-w-screen-xl mx-auto px-4 mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Riwayat Konsultasi</h2>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 12.207l-2.651 2.642a1.2 1.2 0 01-1.697-1.697l2.642-2.651-2.642-2.651a1.2 1.2 0 011.697-1.697l2.651 2.642 2.651-2.642a1.2 1.2 0 011.697 1.697l-2.642 2.651 2.642 2.651a1.2 1.2 0 010 1.697z"/>
                        </svg>
                    </span>
                </div>
            @endif
            <br>
            <div class="space-y-4">
                @foreach ($konsultasis as $konsultasi)
                    <div class="p-4 bg-blue-100 rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="text-sm font-semibold text-gray-700">
                                {{ $konsultasi->user->username }} (Masyarakat)
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $konsultasi->created_at->format('d F Y H:i:s') }}
                            </div>
                        </div>
                        <p class="text-gray-700 mt-2">{{ $konsultasi->pertanyaan }}</p>
                        <div class="flex justify-end mt-2">
                            <button onclick="toggleModal('modal-update-{{ $konsultasi->id }}')" class="px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-700 transition ease-in-out duration-300">Update</button>
                            
                            <form id="form-delete-{{ $konsultasi->id }}" action="{{ route('konsultasi.destroy', $konsultasi->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $konsultasi->id }}')" class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-yellow-700 transition ease-in-out duration-300">Hapus</button>
                            </form>
                        </div>
                    </div>

                    <!-- Modal Update -->
                    <div id="modal-update-{{ $konsultasi->id }}" class="fixed inset-0 hidden z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
                        <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
                            <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                        <h3 class="text-lg leading-6 font-bold text-gray-900">Update Pertanyaan</h3>
                                        <div class="mt-2">
                                            <form action="{{ route('konsultasi.update', $konsultasi->id) }}" method="POST" class="space-y-4">
                                                @csrf
                                                @method('PUT')
                                                <div>
                                                    <label for="pertanyaan" class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                                                    <textarea id="pertanyaan" name="pertanyaan" rows="3" class="mt-1 block w-full px-12 py-8 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md" required>{{ $konsultasi->pertanyaan }}</textarea>
                                                </div>
                                                <div class="flex justify-end mt-4">
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                                                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="toggleModal('modal-update-{{ $konsultasi->id }}')">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="space-y-4 mt-8">
                @foreach ($diagnosas as $diagnosa)
                    <div class="p-4 bg-green-100 rounded-lg">
                        <div class="flex justify-between items-center">
                            <div class="text-sm font-semibold text-gray-700">
                                {{ $diagnosa->user->username }} (Petugas)
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $diagnosa->created_at->format('d F Y H:i:s') }}
                            </div>
                        </div>
                        <p class="text-gray-700 mt-2">{!! strip_tags($diagnosa->jawaban) !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

     <!-- Modal Konfirmasi Hapus -->
     <div id="modal-delete" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
            <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-bold text-gray-900">Konfirmasi Hapus</h3>
                        <div class="mt-2">
                            <p>Apakah Anda yakin ingin menghapus konsultasi ini?</p>
                            <div class="flex justify-end mt-4">
                                <button type="button" id="delete-confirm-btn" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Hapus</button>
                                <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        onclick="toggleModal('modal-delete')">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }

        function confirmDelete(konsultasiId) {
            toggleModal('modal-delete');
            document.getElementById('delete-confirm-btn').onclick = function() {
                document.getElementById('form-delete-' + konsultasiId).submit();
            };
        }
    </script>
</x-home.layout>
