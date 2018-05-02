<script type="text/x-template" id="book_template">
    <article>
        <h1>{{ book.title }}</h1>
        <img src='http://placehold.it/114/162' alt='A Book Cover' class='book__cover'/>
        <ul>
            <li><strong>Author: </strong>{{ book.author }}</li>
            <li><strong>Publication Year: </strong>{{ book.year_of_publication }}</li>
            <li><strong>Original Title: </strong>{{ book.original_title }}</li>
            <li><strong>Genre: </strong>{{ book.genre }}</li>
            <li><strong>Millions Sold: </strong>{{ book.millions_sold }}</li>
            <li><strong>Language: </strong>{{ book.language }}</li>
            <li><strong>Plot: </strong>{{ book.plot }}</li>
            <li>
                <button>Update</button>
            </li>
            <li>
                <button @click.prevent="deleteBook(this.id)">Delete</button>
            </li>
        </ul>
    </article>
</script>