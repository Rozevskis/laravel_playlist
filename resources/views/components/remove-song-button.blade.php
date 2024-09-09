<form action="{{ route($route, ['playlist' => $playlistId, 'song' => $songId]) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this song?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
        Remove
    </button>
</form>