<div class="container">
    <h1>Create Playlist</h1>
    <form action="{{ route('playlist.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="tag">Tag</label>
            <input type="text" class="form-control" id="tag" name="tag" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>