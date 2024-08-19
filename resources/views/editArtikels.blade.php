<x-layout>
    <div class="max-w-7xl mx-auto bg-white p-5 rounded-lg shadow-md">
        <form action="{{ route('artikels.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">JUDUL</label>
                <input type="text" class="block w-full text-gray-700 border rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('judul') border-red-500 @enderror" name="judul" value="{{ old('judul', $artikel->judul) }}" placeholder="Masukkan Judul Artikel">
                @error('judul')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">ISI ARTIKEL</label>
                <textarea class="block w-full text-gray-700 border rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('isi') border-red-500 @enderror" name="isi" rows="5" placeholder="Masukkan isi Artikel">{{ old('isi', $artikel->isi) }}</textarea>
                @error('isi')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-wrap -mx-2 mb-4">
                <div class="w-full md:w-1/2 px-2">
                    <label class="block text-gray-700 font-bold mb-2">PENULIS ARTIKEL</label>
                    <input type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-gray-200 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md" name="penulis" value="{{ Auth::user()->username }}" readonly>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                </div>
                <div class="w-full md:w-1/2 px-2">
                    <label class="block text-gray-700 font-bold mb-2">KATEGORI</label>
                    <select class="block w-full text-gray-700 border rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('kategori_id') border-red-500 @enderror" name="kategori_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('kategori_id', $artikel->kategori_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach

                    </select>
                    @error('kategori_id')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">IMAGE</label>
                <input type="file" class="block w-full text-gray-700 border rounded py-2 px-3 leading-tight focus:outline-none focus:shadow-outline @error('image') border-red-500 @enderror" name="image">
                @if ($artikel->image)
                    <img src="{{ asset('storage/' . $artikel->image) }}" alt="Gambar Artikel" class="mt-2 max-w-xs">
                @endif
                @error('image')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="justify-between mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">UPDATE</button>
                <button type="reset" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">RESET</button>
                <a class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2.5 px-2 rounded focus:outline-none focus:shadow-outline" href="{{ route('artikels.index') }}">KEMBALI</a>
            </div>
        </form> 
    </div>
</x-layout>
