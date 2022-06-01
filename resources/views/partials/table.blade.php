<table class="table table-striped" id="task_table" data-url="">
    <thead>
    <tr>
        <th scope="col">Задача</th>
        <th scope="col">Описание</th>
        <th scope="col">Теги</th>
        <th scope="col">Дата создания</th>
    </tr>
    </thead>
    <tbody>
    @forelse($tasks ?? [] as $task)
        <tr>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td>
                @foreach($task->tags ?? [] as $item)
                    {{ $item->name }}@if(!$loop->last){{ ', ' }}@endif
                @endforeach
            </td>
            <td>
                {{ $task->created_at }}
            </td>
        </tr>
    @empty
        <tr>
            <td class="text-center" colspan="4">Задач нет</td>
        </tr>
    @endforelse
    </tbody>
</table>
