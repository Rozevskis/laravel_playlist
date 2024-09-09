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
                <x-edit-button route="playlist.edit" :id="$playlist->id" />
                <x-playlist-delete-button :playlistId="$playlist->id" />
            </div>
        </div>

        <x-songs-table :playlist="$playlist" />

        <!-- Add Song Form -->
        <div class="px-4 py-5 sm:px-6">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Add Song to Playlist</h3>
                <form action="{{ route('playlist.addSong', $playlist->id) }}" method="POST">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <select name="song_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 sm:text-sm " onsubmit="return confirm('Are you sure you want to delete this playlist?');">
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