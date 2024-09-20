<form action="{{ route('tasks.update', $task->task_id) }}" method="post">
    @csrf
    @method('UPDATE')
    <div class="modal-body">
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Заголовок задачи</label>
            <input name="title" type="text" class="form-control" id="inputTitle" aria-describedby="titleHelp" value="{{ $task->title }}">
            <div id="titleHelp" class="form-text">Длина заголовка не должна превышать 255 символов.</div>
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Описание задачи</label>
            <input name="description" type="text" class="form-control" id="inputDescription" aria-describedby="descriptionHelp" value="{{ $task->description }}">
            <div id="descriptionHelp" class="form-text">Не менее 10 и не более 255 символов.</div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="edit-cancel">Нет</button>
        <button type="submit" class="btn btn-danger">Да</button>
    </div>
</form>
