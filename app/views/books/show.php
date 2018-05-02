<script type="text/x-template" id="book_template">
    <article>
        <h1>{{ book.title }}</h1>
        <img src='http://placehold.it/114/162' alt='A Book Cover' class='book__cover'/>
        <form method="post" id="form" action="/app/controllers/books/update.php">
            <ul>
                <li><span>Author: </span>
                    <input
                            v-if="isEditable === true"
                            v-model="book.author"
                            class="form__input"
                            for="author"/>
                    <p v-else>{{ book.author }}</p>
                </li>
                <li><span>Publication Year: </span>
                    <input
                            v-if="isEditable === true"
                            v-model="book.year_of_publication"
                            class="form__input"
                            for="year_of_publication"/>
                    <p v-else>{{ book.year_of_publication }}</p>
                </li>
                <li><span>Original Title: </span>
                    <input
                            v-if="isEditable === true"
                            v-model="book.original_title"
                            class="form__input"
                            for="original_title"/>
                    <p v-else>{{ book.original_title }}</p>
                </li>
                <li><span>Genre: </span>
                    <input
                            v-if="isEditable === true"
                            v-model="book.genre"
                            class="form__input"
                            for="genre"/>
                    <p v-else>{{ book.genre }}</p>
                </li>
                <li><span>Millions Sold: </span>
                    <input
                            v-if="isEditable === true"
                            v-model="book.millions_old"
                            class="form__input"
                            for="millions_sold"/>
                    <p v-else>{{ book.millions_sold }}</p>
                </li>
                <li><span>Language: </span>
                    <input
                            v-if="isEditable === true"
                            v-model="book.language"
                            class="form__input"
                            for="language"/>
                    <p v-else>{{ book.language }}</p>
                </li>
            </ul>
            <ul>
                <li><span>Plot: </span>
                    <textarea
                            v-if="isEditable === true"
                            v-model="book.plot"
                            class="form__input"
                            for="plot"/>
                    <p v-else>{{ book.plot }}</p>
                </li>
                <li>
                    <p @click.prevent="editable = true">Update</p>
                </li>
                <li>
                    <button @click.prevent="deleteBook(id)">Delete</button>
                </li>
            </ul>
            <input type="submit" v-if="isEditable === true" @click.prevent="updateBook()" class="submit"/>
        </form>
    </article>
</script>