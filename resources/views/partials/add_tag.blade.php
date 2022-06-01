<div class="row gx-3 gy-2 mt-3">
    <div class="col-sm-6">
        <h4>Добавить тег</h4>
        <form method="POST" action="{{ route('tag.store') }}">
            @csrf
            <label for="sum" class="visually-hidden">Тег</label>
            <input type="text" class="form-control mb-3 @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Название тега" required>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
