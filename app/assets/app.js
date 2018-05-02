let book = {
    data() {
        return {
            editable: false
        }
    },
    props: ['book'],
    methods: {
        deleteBook(id) {
            axios.post('/assignment_3/app/controllers/books/delete.php', {
                id: id
            }).catch(error => {
                console.log(error);
            });
        },
        updateBook(book) {
            axios.post('/assignment_3/app/controllers/books/update.php', {
                id: book.id,
                title: book.title,
                original_title: book.original_title,
                year_of_publication: book.year_of_publication,
                genre: book.genre,
                millions_sold: book.millions_sold,
                language: book.language,
                plot: book.plot,
                author: book.author,
                headers: {
                    "Content-Type": "application/json"
                }
            });
            this.editable = false
        },
        createBook() {

        }
    },
    computed: {
        isEditable: function () {
            return this.editable;
        }
    },
    template: '#book_template'
};
let new_book = {
    name: 'new_book',
    template: '#new_book_template'
};
let show_book = {
    name: 'show_book',
    template: '#show_book_template',
    data() {
        return {
            title: null,
            original_title: null,
            year_of_publication: null,
            genre: null,
            language: null,
            millions_sold: null
        }
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        fetchData() {
            axios.get('/assignment_3/app/controllers/books/read_one.php?id=' + id)
                .then(response => {
                    console.log(response.data);
                    this.title = response.data.title;
                    this.original_title = response.data.original_title;
                    this.year_of_publication = response.data.year_of_publication;
                    this.genre = response.data.genre;
                    this.language = response.data.language;
                    this.millions_sold = response.data.millions_sold;
                })
        }
    }
};
let books_index = {
    name: 'books_index',
    data() {
        return {
            books: [],
        };
    },
    methods: {
        fetchData() {
            axios.get('/assignment_3/app/controllers/books/read.php')
                .then(response => {
                    this.books = response.data.books;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    mounted() {
        this.fetchData();
    },
    components: {
        book
    },
    template: '#show_all_books_template',
};

let routes = [
    {path: '/', component: books_index},
    {path: '/new', component: new_book},
    {path: '/show', component: show_book},
];
let router = new VueRouter({
    routes,
});

const app = new Vue({
    data() {
        return {}
    },
    router
}).$mount('#app');
