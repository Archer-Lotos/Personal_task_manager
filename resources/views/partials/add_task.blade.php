
<form class="row gx-3 gy-2 align-items-center mt-3" method="POST" action="{{ route('store') }}">
    @csrf
    <h4>Добавить задачу</h4>
    <div class="col-12">
        <label for="sum" class="visually-hidden">Задача</label>
        <input type="text" class="form-control @error('task_name') is-invalid @enderror" value="{{ old('task_name') }}" name="task_name" placeholder="Заголовок задачи" required>
    </div>
    <div class="col-sm-6">
        <label for="description" class="visually-hidden">Текст задачи</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description" placeholder="Текст задачи">{{ old('description') }}</textarea>
    </div>
    <div class="col-sm-6">
        <select class="form-select" name="tags[]" multiple size="3" aria-label="size 3 select example">
            <option value="" disabled>Выберете теги (multiple) ...</option>
            @foreach($tags ?? [] as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 text-center my-3">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
