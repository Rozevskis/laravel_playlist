<x-app-layout>
    <div class="w-full rounded overflow-hidden shadow-lg p-4 bg-white mb-4">
        <div class="flex justify-between">
            <div>
                <a class="font-bold text-xl mb-2" href="{{ route('playlist.show', $playlist->id) }}">
                    {{ $playlist->name }}
                </a>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block shadow-lg bg-gray-400 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $playlist->tag }}</span>
                </div>
            </div>
            <div>
                <a href="{{ route('playlist.edit', $playlist->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Edit
                </a>
                <form action="{{ route('playlist.destroy', $playlist->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <table class="min-w-full divide-y divide-gray-200 shadow-md rounded-lg overflow-hidden">
            <!-- Table Header -->
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Song Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Artist</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Genre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Options</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="divide-y divide-gray-200">
                @foreach ($playlist->songs as $song)
                <tr class="odd:bg-white even:bg-blue-100 hover:bg-gray-100">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $song->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $song->artist }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $song->genre }}</td>
                    <td class="px-6 py-4 text-sm">
                        <form action="{{ route('playlist.removeSong', ['playlist' => $playlist->id, 'song' => $song->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this song?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Add Song Form -->
        <div class="px-4 py-5 sm:px-6">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Add Song to Playlist</h3>
                <form action="{{ route('playlist.addSong', $playlist->id) }}" method="POST">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <select name="song_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 sm:text-sm">
                            <option value="">Select a Song</option>
                            @foreach ($songs as $song)
                            <option value="{{ $song->id }}">{{ $song->name }} by {{ $song->artist }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="whitespace-nowrap inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Add Song
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>