<x-app-layout>
    <div class="flex justify-end mb-4">
            <a href="{{ route('playlist.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create Playlist
            </a>
    </div>
    <div class="gap-6">
    @foreach ($playlists as $playlist)
    <div class="w-full rounded overflow-hidden shadow-lg p-4 bg-white mb-4">
        <div class="font-bold text-xl mb-2">{{ $playlist->name }}</div>
        <div class="px-6 pt-4 pb-2">
            <span class="inline-block shadow-lg bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $playlist->tag }}</span>
        </div>
        <div class="px-6 pt-4 pb-2">
            <table class="w-full table-auto">
                <tbody>
                    <tr>
                        <td class="border px-4 py-2">Song 1</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Song 2</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Song 3</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Song 4</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Song 5</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2">Song 6</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endforeach

    </div>
</x-app-layout>