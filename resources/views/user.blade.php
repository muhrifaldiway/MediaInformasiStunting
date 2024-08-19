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

    <div class="container mx-auto px-4 py-4">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Username</th>
                        <th class="py-3 px-4 text-left">Email</th>
                        <th class="py-3 px-4 text-left">Alamat</th>
                        <th class="py-3 px-4 text-left">Telepon</th>
                        <th class="py-3 px-4 text-left">Peran</th>
                        <th class="py-3 px-4 text-left">Terdaftar</th>
                        <th class="py-3 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-200">
                        <td class="py-3 px-4">{{ $user->id }}</td>
                        <td class="py-3 px-4">{{ $user->username }}</td>
                        <td class="py-3 px-4">{{ $user->email }}</td>
                        <td class="py-3 px-4">{{ $user->alamat }}</td>
                        <td class="py-3 px-4">{{ $user->telepon }}</td>
                        <td class="py-3 px-4">{{ $user->peran }}</td>
                        <td class="py-3 px-4">{{ $user->created_at->format('d M Y H:i') }}</td>
                        <td class="py-3 px-4">
                            <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="openModal({{ $user }})">Edit</button>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirmDelete('{{ $user->username }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="editModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="modal-overlay absolute inset-0 bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Edit User</p>
                    <div class="modal-close cursor-pointer z-50" onclick="closeModal()">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.348 14.849a1.2 1.2 0 01-1.697 0L9 11.207l-3.651 3.642a1.2 1.2 0 01-1.697-1.697l3.642-3.651-3.642-3.651a1.2 1.2 0 011.697-1.697l3.651 3.642 3.651-3.642a1.2 1.2 0 011.697 1.697l-3.642 3.651 3.642 3.651a1.2 1.2 0 010 1.697z"/>
                        </svg>
                    </div>
                </div>

                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input id="username" name="username" type="text" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('username') border-red-500 @enderror"
                            value="{{ old('username') }}">
                        @error('username')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                        <input id="email" name="email" type="email" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror">
                    
                        @if (!$user->exists)
                            <p class="text-xs text-red-500">Isi kolom ini untuk menambahkan password baru.</p>
                        @else
                            <p class="text-xs text-red-500">Isi kolom ini untuk mengubah password. Kosongkan jika tidak ingin mengubah.</p>
                        @endif
                    
                        @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password_confirmation') border-red-500 @enderror">
                    
                        @if (!$user->exists)
                            <p class="text-xs text-red-500">Konfirmasi password baru.</p>
                        @else
                            <p class="text-xs text-red-500">Konfirmasi password baru jika Anda mengubahnya.</p>
                        @endif
                    
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    
                    

                    <div class="mb-4">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <input id="alamat" name="alamat" type="text" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('alamat') border-red-500 @enderror"
                            value="{{ old('alamat') }}">
                        @error('alamat')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                        <input id="telepon" name="telepon" type="text" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('telepon') border-red-500 @enderror"
                            value="{{ old('telepon') }}">
                        @error('telepon')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="peran" class="block text-sm font-medium text-gray-700">Peran</label>
                        <select id="peran" name="peran" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('peran') border-red-500 @enderror">
                            <option value="masyarakat" {{ old('peran', $user->peran) === 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                            <option value="petugas" {{ old('peran', $user->peran) === 'petugas' ? 'selected' : '' }}>Petugas</option>
                        </select>
                        @error('peran')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                        <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(user) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editForm').action = `/user/${user.id}`;
            document.getElementById('username').value = user.username;
            document.getElementById('email').value = user.email;
            document.getElementById('alamat').value = user.alamat;
            document.getElementById('telepon').value = user.telepon;
            document.getElementById('peran').value = user.peran;
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
   <script>
        function togglePasswordVisibility(fieldId) {
            var passwordField = document.getElementById(fieldId);
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        }
    </script>
      <script>
        function confirmDelete(username) {
            return confirm(`Apakah Anda yakin ingin menghapus data user '${username}'?`);
        }
    </script>


</x-layout>
