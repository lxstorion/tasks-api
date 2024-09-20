<form action="{{ route('tasks.destroy', $task->task_id) }}" method="post">
    @csrf
    @method('DELETE')
    <div class="modal-body">
        Вы уверены, что хотите удалить задачу?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Нет</button>
        <button type="submit" class="btn btn-danger">Да</button>
    </div>
</form>
