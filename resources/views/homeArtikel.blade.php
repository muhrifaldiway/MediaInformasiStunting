<x-home.layout>
    <div class="px-4 py-6 sm:px-6 lg:px-8">
        <article class="max-w-screen-lg mx-auto my-8 p-6 bg-white shadow-md rounded-lg">
            <h2 class="mb-3 text-3xl font-bold text-gray-900">{{ $artikel->judul }}</h2>
            <div class="flex items-center text-sm text-gray-500 mb-3">
                <span>
                    <a class="hover:underline" href="/authors/{{ $artikel->user->id }}">
                        {{ $artikel->user->username }}
                    </a>
                </span>
                <span class="mx-2">|</span>
                <span>{{ $artikel->created_at->format('d F Y H:i:s') }}</span>
            </div>
            
            @if ($artikel->image)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $artikel->image) }}" alt="Gambar Artikel" class="max-w-md">
                </div>
            @endif
            
            <p class="text-gray-700 text-justify mb-6">
                {!! strip_tags($artikel->isi) !!}
            </p>
            <a href="/" class="inline-block px-4 py-2 bg-blue-600 text-white font-medium rounded hover:bg-blue-700 transition-colors duration-200">&laquo; Kembali ke Home</a>
        </article>
    </div>
</x-home.layout>