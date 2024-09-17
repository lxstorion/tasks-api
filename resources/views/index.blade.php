<div>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
        </tr>
        @forelse($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
            </tr>
        @empty
            No users
        @endforelse
    </table>
</div>
