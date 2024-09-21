<form action="{{ route('tasks.update', $task->task_id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="mb-3">
            <label for="inputTitle" class="form-label">Заголовок задачи</label>
            <input name="title" type="text" class="form-control" id="inputTitle" aria-describedby="titleHelp" value="{{ $task->title }}" max="255">
            <div id="titleHelp" class="form-text">Длина заголовка не должна превышать 255 символов.</div>
        </div>
        <div class="mb-3">
            <label for="inputDescription" class="form-label">Описание задачи</label>
            <input name="description" type="text" class="form-control" id="inputDescription" aria-describedby="descriptionHelp" value="{{ $task->description }}" min="10" max="255">
            <div id="descriptionHelp" class="form-text">Не менее 10 и не более 255 символов.</div>
        </div>
        @if($errors->any())
            <ul id="edit-form-errors">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="edit-cancel">Нет</button>
        <button type="button" class="btn btn-danger" id="edit-confirm" data-route="{{ route('tasks.update', $task->task_id) }}">Да</button>
    </div>
</form>
<script type="text/javascript">
    $('#edit-confirm').on('click', function (event) {
        event.preventDefault();
        let data = {
            title: $('#inputTitle').val(),
            description: $('#inputDescription').val()
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            accepts: {},
            url: $(this).data('route'),
            type: 'PUT',
            data: data,
            success: function(response) {
                $('#td-title-{{ $task->task_id }}').html(response.data.title);
                $('#td-description-{{ $task->task_id }}').html(response.data.description);
                $('#editModal').modal('toggle')
            },
            complete: function() {

            },
            error: function(error) {

            }
        })
    })
</script>
