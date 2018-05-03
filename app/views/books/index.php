<!-- Creates a Vue Template ( Which is rendered via Vue Router ) -->
<script type='text/x-template' id='show_all_books_template'>
    <section class="book__container">
        <div class="notice">
            <p v-if="this.$parent.notice.message" :class="this.$parent.notice.css ">
                {{ this.$parent.notice.message }}
            </p>
        </div>
        <div v-for="book in booksArray" class="book">
            <img :src="book.image_path" alt="" class="book__cover"/>
            <router-link :to="{ name: 'book', params: { id: book.id }}"class="book__title">
                {{ book.title }}</router-link>
            <div class="book__buttons">
                <router-link :to="{ name: 'edit', params: { id: book.id }}" class="button">
                    Edit
                </router-link>
                <a href="#" class="button" @click="deleteBook(book.id)">
                    Delete
                </a>
            </div>
        </div>
    </section>
</script>