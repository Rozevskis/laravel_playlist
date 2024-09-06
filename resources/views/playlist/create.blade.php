<div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-6">Create Playlist</h1>
        <p class="text-center text-gray-500 mb-10">Add a new playlist to your collection</p>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
            <form action="{{ route('playlist.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Playlist Name</label>
                    <div class="mt-1">
                        <input type="text" id="name" name="name" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Awesome Playlist" required>
                    </div>
                </div>

                <div>
                    <label for="tag" class="block text-sm font-medium text-gray-700">Tag</label>
                    <div class="mt-1">
                        <input type="text" id="tag" name="tag" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Chill, Workout, etc." required>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Playlist
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
