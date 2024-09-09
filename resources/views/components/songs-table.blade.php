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
                <x-remove-song-button route="playlist.removeSong" :playlistId="$playlist->id" :songId="$song->id" />
            </td>
        </tr>
        @endforeach
    </tbody>
</table>