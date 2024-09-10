<x-app-layout>
    <div class="w-full rounded overflow-hidden shadow-lg p-4 bg-white mb-4">
        <div class="flex justify-between">
            <div>
                <a class="  transform  font-bold text-xl mb-2">
                    {{ $playlist->name }}
                </a>
                <span
                    class="inline-block shadow-lg bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $playlist->tag }}
                </span>
            </div>
            <div>
                <a href="{{ route('playlist.edit', $playlist->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">
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
                                <form
                                    action="{{ route('playlist.removeSong', ['playlist' => $playlist->id, 'song' => $song->id]) }}"
                                    method="POST" onsubmit="return confirm('Are you sure you want to remove this song?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="w-full">
            <form class="flex gap-2" action="{{ route('playlist.addSong', $playlist->id) }}" method="POST">
                @csrf
                <select name="song_id"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 sm:text-sm "
                    onsubmit="return confirm('Are you sure you want to delete this playlist?');">
                    <option value="">Select a Song</option>
                    @foreach ($songs as $song)
                        <option value="{{ $song->id }}">{{ $song->title }} by {{ $song->artist }}</option>
                    @endforeach
                </select>
                <button type="submit" class="py-2 px-4 bg-green-500 rounded text-nowrap font-semibold text-white">
                    Add song
                </button>
            </form>

        </div>
    </div>
</x-app-layout>