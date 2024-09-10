<x-app-layout>

    <div class="flex justify-end mb-4">
        <a href="{{ route('playlist.create') }}" class="button bg-gray-700 text-white p-2 rounded">
            Create Playlist
        </a>
    </div>
    <div class="gap-6">
        @foreach ($playlists as $playlist)
            <div class="w-full rounded overflow-hidden shadow-lg p-4 bg-white mb-4">
                <div class="flex justify-between">
                    <div>
                        <a class=" hover:drop-shadow transform hover:bg-gray-100 font-bold text-xl mb-2"
                            href="{{ route('playlist.show', $playlist->id) }}">
                            {{ $playlist->name }}
                        </a>
                        <span
                            class="inline-block shadow-lg bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $playlist->tag }}
                        </span>
                    </div>
                    <div>
                        <a href="{{ route('playlist.show', $playlist->id) }}"
                            class="bg-blue-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                            View
                        </a>
                        <a href="{{ route('playlist.edit', $playlist->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Edit
                        </a>
                        <form action="{{ route('playlist.destroy', $playlist->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                <div class="pt-4 pb-2">
                    <table class="w-full table-auto">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-[25%] px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Song
                                    Name</th>
                                <th class="w-[25%] px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Artist
                                </th>
                                <th class="w-[25%] px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Genre
                                </th>
                                <th class="w-[25%] px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Options
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($playlist->songs as $song)
                                <tr class="odd:bg-white even:bg-blue-50 hover:bg-gray-100">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $song->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $song->artist }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $song->genre }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <button class="bg-red-500 hover:bg-red-700 text-white text-xs py-1 px-2 rounded">
                                            Remove
                                            song
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>