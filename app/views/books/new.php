<script type="text/x-template" id="new_book_template">
    <form method="post" action="/assignment_3/app/controllers/books/create.php">
        <h1>New Book</h1>
        <ul>
            <li><span>Title: </span>
                <input class="form__input" name="title"/>
            </li>
            <li><span>Publication Year: </span>
                <input class="form__input" name="year_of_publication"/>
            </li>
            <li><span>Original Title: </span>
                <input class="form__input" name="original_title"/>
            </li>
            <li><span>Genre: </span>
                <input class="form__input" name="genre"/>
            </li>
            <li><span>Millions Sold: </span>
                <input class="form__input" name="millions_sold"/>
            </li>
            <li><span>Language: </span>
                <input class="form__input" name="language"/>
            </li>
        </ul>
        <input type="submit" class="submit"/>
    </form>
</script>