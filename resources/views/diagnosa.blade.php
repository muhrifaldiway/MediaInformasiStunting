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
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="toggleModal('modal-diagnosa')">Diagnosa</button>

        <form action="{{ route('diagnosa') }}" method="GET" class="flex items-center">
            <input type="text" name="search" placeholder="Cari kategori..." value="{{ request('search') }}" class="px-3 py-2 border rounded-md">
            <button type="submit" class="ml-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cari</button>
        </form>
    </div>
   
     <h1 class="font-bold pl-2 text-2xl">Pertanyaan</h1>
    <br>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">Masyarakat</th>
                    <th class="py-3 px-4 text-left">Pertanyaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($konsultasis as $konsultasi)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-200">
                        <td class="py-3 px-4">{{ $konsultasi->user->username }}</td>
                        <td class="py-3 px-4">{{ $konsultasi->pertanyaan }}</td>
                    </tr>
        
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
            </tbody>
        </table>
        
    </div>
     <br><br>
     <h1 class="font-bold pl-2 text-2xl">Jawaban</h1>
    <br>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-green-500 text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Petugas</th>
                    <th class="py-3 px-4 text-left">Jawaban</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diagnosas as $index => $diagnosa)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-200">
                        <td class="py-3 px-4">{{ $index + 1 }}</td>
                        <td class="py-3 px-4">{{ $diagnosa->user->username }}</td>
                        <td class="py-3 px-4">{!! strip_tags($diagnosa->jawaban) !!}</td>
                        <td class="py-3 px-4 flex">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="toggleUpdateModal({{ $diagnosa->id }})">Edit</button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete({{ $diagnosa->id }})">Hapus</button>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Diagnosa -->
    <div id="modal-diagnosa" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
            <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-bold text-gray-900">Diagnosa Keluhan</h3>
                        <div class="mt-2">
                            <form action="{{ route('diagnosa.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="penulis" class="block text-sm font-medium text-gray-700">Petugas</label>
                                    <input type="text" name="user_id" id="user_id" readonly
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-gray-200 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md"
                                        value="{{ Auth::user()->username }}" required>
                                    <input type="hidden" name="petugas_id" value="{{ Auth::id() }}">
                                </div>
                                <div class="mb-4">
                                    <label for="masyarakat_id" class="block text-sm font-medium text-gray-700">Masyarakat</label>
                                    <select id="masyarakat_id" name="masyarakat_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md" required>
                                        <option value="">Silahkan Pilih !</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="konsultasi_id" class="block text-sm font-medium text-gray-700">Pertanyaan Masyarakat</label>
                                    <select name="konsultasi_id" id="konsultasi_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md" required>
                                        <option value="">Silahkan Pilih !</option>
                                        @foreach($konsultasis as $konsul)
                                            <option value="{{ $konsul->id }}" data-user="{{ $konsul->user_id }}">{{ $konsul->pertanyaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div class="mb-4">
                                    <label for="jawaban" class="block text-sm font-medium text-gray-700 mb-2">Jawaban:</label>
                                    <textarea id="isi" name="jawaban" class="border-gray-300 rounded-md w-full h-20"></textarea>
                                </div>
                            
                                <div class="flex justify-end">
                                    <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="toggleModal('modal-diagnosa')">Batal</button>
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@foreach ( $diagnosas as $diagnosa )
<!-- Modal Update Diagnosa -->
<div id="modal-update-diagnosa-{{ $diagnosa->id }}" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
        <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                    <h3 class="text-lg leading-6 font-bold text-gray-900">Update Diagnosa</h3>
                    <div class="mt-2">
                        <form id="update-diagnosa-form-{{ $diagnosa->id }}" action="{{ route('diagnosa.update', $diagnosa->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="jawaban" class="block text-sm font-medium text-gray-700">Jawaban</label>
                                <textarea id="jawaban" name="jawaban" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md" required>{{ $diagnosa->jawaban }}</textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="toggleUpdateModal({{ $diagnosa->id }})">Batal</button>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Delete Diagnosa -->
<div id="modal-delete-diagnosa" class="fixed hidden inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white w-11/12 max-w-lg mx-auto rounded-lg shadow-lg">
        <div class="relative px-12 py-10 bg-white shadow-lg sm:rounded-lg sm:p-8">
            <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                    <h3 class="text-lg leading-6 font-bold text-gray-900">Hapus Diagnosa</h3>
                    <div class="mt-2">
                        <form id="delete-diagnosa-form" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <p>Apakah Anda yakin ingin menghapus diagnosa ini?</p>
                            <div class="flex justify-end mt-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2" onclick="toggleModal('modal-delete-diagnosa')">Batal</button>
                            </div>
                        </form>
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

        function toggleUpdateModal(id) {
        document.getElementById('modal-update-diagnosa-' + id).classList.toggle('hidden');
        }

        function confirmDelete(id) {
            document.getElementById('delete-diagnosa-form').action = `/diagnosa/${id}`;
            toggleModal('modal-delete-diagnosa');
        }

    </script>
    <script>
        document.getElementById('masyarakat_id').addEventListener('change', function() {
            const selectedUserId = this.value;
            const konsultasiSelect = document.getElementById('konsultasi_id');
            
            // Reset the konsultasi select options
            Array.from(konsultasiSelect.options).forEach(option => {
                if (option.value) {
                    option.style.display = 'none';
                }
            });
    
            // Show options matching the selected user
            Array.from(konsultasiSelect.options).forEach(option => {
                if (option.dataset.user == selectedUserId) {
                    option.style.display = 'block';
                }
            });
    
            // Reset the selected value
            konsultasiSelect.value = '';
        });
    </script>
</x-layout>
