<!-- Creates a Vue Template ( Which is rendered via Vue Router ) -->
<script type='text/x-template' id='show_all_books_template'>
    <section>
        <div v-for="book in books">
            <p>{{ book.title }}</p>
            <router-link :to="{ name: 'book', params: { id: book.id }}">Show</router-link>
        </div>
    </section>
</script>