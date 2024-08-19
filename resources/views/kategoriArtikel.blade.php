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
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="toggleModal('modal-add')">Tambah Kategori</button>

        <form action="{{ route('kategori.index') }}" method="GET" class="flex items-center">
            <input type="text" name="search" placeholder="Cari kategori..." value="{{ request('search') }}" class="px-3 py-2 border rounded-md">
            <button type="submit" class="ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cari</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Kategori</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $index => $k)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-200">
                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">{{ $k->nama_kategori }}</td>
                        <td class="py-3 px-4 flex">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2" 
                            onclick="openEditModal({{ $k->id }}, '{{ $k->nama_kategori }}')">Edit</button>
                            <form id="form-delete-{{ $k->id }}" action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete('{{ $k->id }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $kategori->links() }}
        </div>        
    </div>

    <!-- Modal Tambah Kategori -->
    <div id="modal-add" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white w-full max-w-2xl mx-auto rounded-lg shadow-lg">
            <div class="relative px-8 py-10 bg-white shadow-lg rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg leading-6 font-bold text-gray-900">Tambah Kategori</h3>
                    <button class="text-gray-500 hover:text-gray-700" onclick="toggleModal('modal-add')">
                        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                            <path d="M18.36 6.64a1 1 0 010 1.41L13.41 13l4.95 4.95a1 1 0 01-1.41 1.41L12 14.41l-4.95 4.95a1 1 0 01-1.41-1.41L10.59 13 5.64 8.05a1 1 0 011.41-1.41L12 11.59l4.95-4.95a1 1 0 011.41 0z"/>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" autocomplete="off" required
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                               value="{{ old('nama_kategori') }}">
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                        <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2"
                                onclick="toggleModal('modal-add')">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kategori -->
<div id="modal-edit" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white w-full max-w-2xl mx-auto rounded-lg shadow-lg">
        <div class="relative px-8 py-10 bg-white shadow-lg rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg leading-6 font-bold text-gray-900">Edit Kategori</h3>
                <button class="text-gray-500 hover:text-gray-700" onclick="toggleModal('modal-edit')">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path d="M18.36 6.64a1 1 0 010 1.41L13.41 13l4.95 4.95a1 1 0 01-1.41 1.41L12 14.41l-4.95 4.95a1 1 0 01-1.41-1.41L10.59 13 5.64 8.05a1 1 0 011.41-1.41L12 11.59l4.95-4.95a1 1 0 011.41 0z"/>
                    </svg>
                </button>
            </div>
            <form id="edit-form" action="" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="edit-kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <input type="text" name="nama_kategori" id="edit-kategori" autocomplete="off" required
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2"
                            onclick="toggleModal('modal-edit')">Batal</button>
                </div>
            </form>
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
                            <p>Apakah Anda yakin ingin menghapus kategori ini?</p>
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
            document.getElementById(modalID).classList.toggle('hidden');
        }

        function openEditModal(id, kategori) {
            // Set form action URL
            const form = document.getElementById('edit-form');
            form.action = `/kategori/${id}`;

            // Set form input values
            document.getElementById('edit-kategori').value = kategori;

            // Open modal
            toggleModal('modal-edit');
        }

        function confirmDelete(kategoriId) {
            toggleModal('modal-delete');
            document.getElementById('delete-confirm-btn').onclick = function() {
                document.getElementById('form-delete-' + kategoriId).submit();
            };
        }
    </script>
</x-layout>
