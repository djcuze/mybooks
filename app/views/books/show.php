<script type="text/x-template" id="book_template">
    <article>
        <h1>{{ book.title }}</h1>
        <img src='http://placehold.it/114/162' alt='A Book Cover' class='book__cover'/>
        <form method="post" id="form" action="/app/controllers/books/update.php">
            <ul>
                <li><span>Author: </span>
                    <p>{{ book.author }}</p>
                </li>
                <li><span>Publication Year: </span>
                    <p>{{ book.year_of_publication }}</p>
                </li>
                <li><span>Original Title: </span>
                    <p>{{ book.original_title }}</p>
                </li>
                <li><span>Genre: </span>
                    <p>{{ book.genre }}</p>
                </li>
                <li><span>Millions Sold: </span>
                    <p>{{ book.millions_sold }}</p>
                </li>
                <li><span>Language: </span>
                    <p>{{ book.language }}</p>
                </li>
            </ul>
        </form>
    </article>
</script>