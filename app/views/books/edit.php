<script type="text/x-template" id="edit_book_template">
    <form method="post" enctype="multipart/form-data">
        <h1>Edit Book</h1>
        <ul>
            <input type="hidden" :value="id" name="id">
            <li><span>Title: </span>
                <input class="form__input" name="title" v-model="title"/>
            </li>
            <li><span>Publication Year: </span>
                <input class="form__input" name="year_of_publication" :value="year_of_publication"/>
            </li>
            <li><span>Original Title: </span>
                <input class="form__input" name="original_title" :value="original_title"/>
            </li>
            <li><span>Genre: </span>
                <input class="form__input" name="genre" :value="genre"/>
            </li>
            <li><span>Millions Sold: </span>
                <input class="form__input" name="millions_sold" :value="millions_sold"/>
            </li>
            <li><span>Language: </span>
                <input class="form__input" name="language" :value="language"/>
            </li>
            <li><span>Edit Image: </span>
                <input type="file" class="form__input" name="fileToUpload" />
            </li>
        </ul>
        <input type="submit" class="submit" @click.prevent="submit()"/>
    </form>
</script>