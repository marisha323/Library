<style>
    .form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: #45a049;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<form action="{{ route('books.store') }}" method="POST" class="form">
    @csrf
    <div class="form-group">
        <label for="title">Назва книги:</label>
        <input type="text" id="title" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Ціна:</label>
        <input type="number" id="price" name="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="status">Статус:</label>
        <select id="status" name="status" class="form-control">
            <option value="available">Доступна</option>
            <option value="unavailable">Недоступна</option>
        </select>
    </div>
    <div class="form-group">
        <label for="author_id">Автор:</label>
        <select id="author_id" name="author_id" class="form-control">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="publisher_id">Видавництво:</label>
        <select id="publisher_id" name="publisher_id" class="form-control">
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Зберегти</button>
</form>
