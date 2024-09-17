<div>
    @isset($task)
        <table>
            <tr>
                <td>Title:</td>
                <td>{{ $task->title }}</td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>{{ $task->description }}</td>
            </tr>
            <tr>
                <td>Created at:</td>
                <td>{{ $task->created_at }}</td>
            </tr>
        </table>
    @endisset
    @empty($task)
        @foreach($errors->all() as $error)
            <h2>{{ $error }}</h2>
        @endforeach
    @endempty
</div>
