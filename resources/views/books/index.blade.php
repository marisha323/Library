<style>
    .container {
        margin: 20px auto;
        padding: 0 15px;
        max-width: 1200px;
    }

    .book-list {
        list-style: none;
        padding: 0;
    }

    .book-list li {
        margin-bottom: 10px;
        font-size: 18px;
    }

    .pagination {
        margin-top: 20px;
    }
</style>
<div class="container">
    <h1>Books</h1>
    <ul class="book-list">
        @foreach ($books as $book)
            <li>
                <strong>Title:</strong> {{ $book->title }} <br>
                <strong>Author:</strong> {{ $book->author->name }} <br>
                <strong>Publisher:</strong> {{ $book->publisher->name }}
            </li>
        @endforeach
    </ul>

    <div class="pagination">
        {{ $books->links() }}
    </div>
</div>
