<script type="text/x-template" id="show_book_template">
    <article>
        <h1>{{ title }}</h1>
        <img src='http://placehold.it/114/162' alt='A Book Cover' class='book__cover'/>
        <ul>
            <li><span>Publication Year: </span>
                <p>{{ year_of_publication }}</p>
            </li>
            <li><span>Original Title: </span>
                <p>{{ original_title }}</p>
            </li>
            <li><span>Genre: </span>
                <p>{{ genre }}</p>
            </li>
            <li><span>Millions Sold: </span>
                <p>{{ millions_sold }}</p>
            </li>
            <li><span>Language: </span>
                <p>{{ language }}</p>
            </li>
        </ul>
    </article>
</script>