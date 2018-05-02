<!-- Creates a Vue Template ( Which is rendered via Vue Router ) -->
<script type='text/x-template' id='show_all_books_template'>
    <section>
        <article v-for="book in books" is="book" :book="book"></article>
    </section>
</script>