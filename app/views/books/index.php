<!-- Creates a Vue Template ( Which is rendered via Vue Router ) -->
<script type='text/x-template' id='show_all_books_template'>
    <section>
        <div class="notice">
            <p v-if="this.$parent.notice.message" :class="this.$parent.notice.css ">{{ this.$parent.notice.message }}</p>
        </div>
        <div v-for="book in books">
            <p>{{ book.title }}</p>
            <router-link :to="{ name: 'book', params: { id: book.id }}">Show</router-link>
            <router-link :to="{ name: 'edit', params: { id: book.id }}">Edit</router-link>
        </div>
    </section>
</script>