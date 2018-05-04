<script type="text/x-template" id="new_book_template">
    <form method="post" action="/assignment_3/app/controllers/books/create.php" enctype="multipart/form-data"
          id="book_form">
        <h1>New Book</h1>
        <ul>
            <li><span>Title: </span>
                <input type="text" class="form__input" name="title" required maxlength="255" title="title"/>
                <span></span>
            </li>
            <li><span>Publication Year: </span>
                <input type="text" class="form__input" name="year_of_publication" required minlength="1" maxlength="4"
                       title="year_of_publication"/>
                <span></span>
            </li>
            <li><span>Original Title: </span>
                <input type="text" class="form__input" name="original_title" maxlength="255" title="original_title"/>
                <span></span>
            </li>
            <li><span>Genre: </span>
                <input type="text" class="form__input" name="genre" required maxlength="255" title="genre"/>
                <span></span>
            </li>
            <li><span>Millions Sold: </span>
                <input type="text" class="form__input" name="millions_sold" required maxlength="8"
                       title="millions_sold"/>
                <span></span>
            </li>
            <li><span>Language: </span>
                <input type="text" class="form__input" name="language" required maxlength="255" title="language"/>
                <span></span>
            </li>
        </ul>
        <!--    Fields for Author    -->
        <ul>
            <li><span>Author's First Name</span>
                <input type="text" class="form__input" name="author_first_name" required maxlength="21"
                       title="author_first_name">
                <span></span>
            </li>
            <li><span>Author's Surname</span>
                <input type="text" class="form__input" name="author_surname" required maxlength="21"
                       title="author_surname">
                <span></span>
            </li>
            <li><span>Author's Nationality</span>
                <input type="text" class="form__input" name="author_nationality" required maxlength="21"
                       title="author_nationality">
                <span></span>
            </li>
            <li><span>Author's Birth Year</span>
                <input type="text" class="form__input" name="author_birth_year" required maxlength="4"
                       title="author_birth_year">
                <span></span>
            </li>
        </ul>
        <!--    Fields for Plot    -->
        <ul class="no-grid">
            <li><span>Plot Summary</span>
                <textarea name="plot_summary" id="plot_summary" required title="plot_summary"></textarea>
                <span></span>
            </li>
            <li><span>Source </span>
                <input type="text" name="plot_source" id="plot_source" required title="plot_source"/>
                <span></span>
            </li>
        </ul>
        <!--    Fields for Image    -->
        <ul class="no-grid">
            <li><span>Upload Image: </span>
                <input type="file" class="form__input" name="fileToUpload" required/>
                <span></span>
            </li>
        </ul>
        <input type="submit" class="submit"/>
    </form>
</script>
