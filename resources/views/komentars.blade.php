<x-layout>
    <h1 class="font-bold pl-2 text-3xl">{{ $title }}</h1>
    <br>

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
    <div class="mb-4 flex justify-between items-center">
        <form action="{{ route('komentars.index') }}" method="GET" class="flex items-center">
            <input type="text" name="search" placeholder="Cari komentar..." value="{{ $search }}" class="px-3 py-2 border rounded-md">
            <button type="submit" class="ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cari</button>
        </form>
    </div>
    <br>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Judul Komentar</th>
                    <th class="py-3 px-4 text-left">Judul Artikel</th>
                    <th class="py-3 px-4 text-left">Kategori</th>
                    <th class="py-3 px-4 text-left">Tanggal</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $index => $comment)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-200">
                        <td class="py-3 px-4">{{ $comments->firstItem() + $index }}</td>
                        <td class="py-3 px-4">{{ $comment->judul }}</td>
                        <td class="py-3 px-4">
                            <a href="{{ route('komentars.show', $comment->id) }}" class="text-blue-600 hover:underline font-bold">{{ $comment->artikel->judul }}</a>
                        </td>
                        <td class="py-3 px-4">{{ $comment->artikel->kategori->nama_kategori ?? 'Tidak ada kategori' }}</td>
                        <td class="py-3 px-4">{{ $comment->created_at->format('d F Y') }}</td>
                        <td class="py-3 px-4 flex">
                            <form id="form-delete-{{ $comment->id }}" action="{{ route('komentars.destroy', $comment->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $comment->id }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $comments->appends(['search' => $search])->links() }}
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
                            <p>Apakah Anda yakin ingin menghapus komentar ini?</p>
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
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        function confirmDelete(komentarId) {
            toggleModal('modal-delete');
            document.getElementById('delete-confirm-btn').onclick = function() {
                document.getElementById('form-delete-' + komentarId).submit();
            };
        }
    </script>
</x-layout>
