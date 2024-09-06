<x-app-layout>
        @foreach ($playlists as $playlist)
            <div class="max-w-sm rounded overflow-hidden shadow-lg p-4 bg-white mb-4">
                <div class="font-bold text-xl mb-2">{{ $playlist->name }}</div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block shadow-lg bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $playlist->tag }}</span>
                </div>
            </div>
        @endforeach
</x-app-layout>