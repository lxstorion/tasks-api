@extends('layouts.main')

@section('head-title', 'Daily tasks')

@section('body-title')
    <h2>All tasks</h2>
@endsection

@section('content')
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-danger delete-button" id="dlt-btn" data-attr="{{ route('tasks.delete', $task->task_id) }}" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                            Delete
                        </button>

                    </td>
                </tr>
            @empty
                <p>No tasks today =(</p>
            @endforelse
            </tbody>
        </table>

        <x-modals.delete />
        <x-modals.edit />



@endsection

@section('script')
    <script type="text/javascript">
        $('.delete-button').each(function (index) {
            $(this).on('click', (event) => {
                event.preventDefault();
                $('.spinner-border').show();
                let href = $(this).data('attr');
                $.ajax({
                    url: href,
                    beforeSend: () => {
                        $('#deleteModal').modal('show')
                    },
                    success: (response) => {
                        $('#form-body').html(response).show()
                    },
                    complete: () => {
                        $('.spinner-border').hide()
                    },
                    error: (error) => {
                        console.error(`Error, unable to load resource. Error text : ${error}`)
                    }
                })
            })
        })
    </script>
@endsection
