<!-- Creates a Vue Template ( Which is rendered via Vue Router ) -->
<script type='text/x-template' id='show_all_books_template'>
    <section class="book__container">
        <div class="notice">
            <p v-if="this.$parent.notice.message" :class="this.$parent.notice.css ">
                {{ this.$parent.notice.message }}
            </p>
        </div>
        <router-link :to="{ name: 'book', params: { id: book.id }}" v-for="book in booksArray" class="book"
                     :key="book.id">
            <img :src="book.image_path" alt="" class="book__cover"/>
            <p class="book__title">{{ book.title }}</p>
            <p>{{ book.author }}</p>
            <div class="book__buttons" @click.stop>
                <router-link :to="{ name: 'edit', params: { id: book.id }}" class="button">Edit</router-link>
                <a href="#" class="button" @click="deleteBook(book.id)">Delete</a>
            </div>
        </router-link>
    </section>
</script>