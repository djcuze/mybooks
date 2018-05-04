<script type="text/x-template" id="new_book_template">
    <form method="post" action="/assignment_3/app/controllers/books/create.php" enctype="multipart/form-data" id="book_form">
        <h1>New Book</h1>
        <ul>
            <li><span>Title: </span>
                <input class="form__input" name="title" required maxlength="255"/>
                <span></span>
            </li>
            <li><span>Publication Year: </span>
                <input class="form__input" name="year_of_publication" required minlength="1" maxlength="4"/>
                <span></span>
            </li>
            <li><span>Original Title: </span>
                <input class="form__input" name="original_title" maxlength="255"/>
                <span></span>
            </li>
            <li><span>Genre: </span>
                <input class="form__input" name="genre" required maxlength="255"/>
                <span></span>
            </li>
            <li><span>Millions Sold: </span>
                <input class="form__input" name="millions_sold" required maxlength="8"/>
                <span></span>
            </li>
            <li><span>Language: </span>
                <input class="form__input" name="language" required maxlength="255"/>
                <span></span>
            </li>
            <li><span>Upload Image: </span>
                <input type="file" class="form__input" name="fileToUpload" required/>
                <span></span>
            </li>
        </ul>
        <input type="submit" class="submit"/>
    </form>
</script>