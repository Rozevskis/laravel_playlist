<form action="{{ route('playlist.destroy', $playlistId) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this playlist?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
        Delete
    </button>
</form>
