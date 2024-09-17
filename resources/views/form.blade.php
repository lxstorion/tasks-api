<div>
    <form action="<?= route('tasks.store') ?>" method="post">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
        <input type="submit" value="Create task">
    </form>
</div>
