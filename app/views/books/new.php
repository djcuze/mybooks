<script type="text/x-template" id="new_book_template">
    <form method="post" action="/assignment_3/app/controllers/books/create.php" enctype="multipart/form-data"
          id="book_form">
        <h1>New Book</h1>
        <ul>
            <li><span>Title: </span>
                <input type="text" class="form__input" name="title" required maxlength="255"/>
                <span></span>
            </li>
            <li><span>Publication Year: </span>
                <input type="text" class="form__input" name="year_of_publication" required minlength="1" maxlength="4"/>
                <span></span>
            </li>
            <li><span>Original Title: </span>
                <input type="text" class="form__input" name="original_title" maxlength="255"/>
                <span></span>
            </li>
            <li><span>Genre: </span>
                <input type="text" class="form__input" name="genre" required maxlength="255"/>
                <span></span>
            </li>
            <li><span>Millions Sold: </span>
                <input type="text" class="form__input" name="millions_sold" required maxlength="8"/>
                <span></span>
            </li>
            <li><span>Language: </span>
                <input type="text" class="form__input" name="language" required maxlength="255"/>
                <span></span>
            </li>
        </ul>
<!--        <ul>-->
<!--            <li><span>Author's First Name</span>-->
<!--                <input type="text" class="form__input" name="author_first_name" required maxlength="21">-->
<!--                <span></span>-->
<!--            </li>-->
<!--            <li><span>Author's Surname</span>-->
<!--                <input type="text" class="form__input" name="author_surname" required maxlength="21">-->
<!--                <span></span>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <ul class="no-grid">-->
<!--            <li><span>Plot Summary</span>-->
<!--                <textarea name="plot_summary" id="plot_summary" required></textarea>-->
<!--                <span></span>-->
<!--            </li>-->
<!--            <li><span>Source </span>-->
<!--                <input type="text" name="plot_source" id="plot_source" required />-->
<!--                <span></span>-->
<!--            </li>-->
<!--        </ul>-->
        <ul class="no-grid">
            <li><span>Upload Image: </span>
                <input type="file" class="form__input" name="fileToUpload" required/>
                <span></span>
            </li>
        </ul>
        <input type="submit" class="submit"/>
    </form>
</script>
