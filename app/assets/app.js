let book = {
    data() {
        return {
            editable: false
        }
    },
    props: ['book'],
    template: '#book_template'
};
let new_book = {
    name: 'new_book',
    template: '#new_book_template'
};
let notice = {
    name: 'notice',
    template: '#notice_template',
    data() {
        return {
            message: null,
            status: null
        }
    }
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
            millions_sold: null,
            image_path: null
        }
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        fetchData() {
            axios.get('/assignment_3/app/controllers/books/read_one.php?id=' + this.$route.params.id)
                .then(response => {
                    console.log(response.data);
                    this.title = response.data.title;
                    this.original_title = response.data.original_title;
                    this.year_of_publication = response.data.year_of_publication;
                    this.genre = response.data.genre;
                    this.millions_sold = response.data.millions_sold;
                    this.language = response.data.language;
                    this.image_path = response.data.image_path;
                })
        }
    },
    beforeRouteUpdate(to, from, next) {

    }
};
let edit_book = {
        name: 'show_book',
        template: '#edit_book_template',
        data() {
            return {
                id: null,
                title: null,
                original_title: null,
                year_of_publication: null,
                genre: null,
                language: null,
                millions_sold: null,
                image_path: null
            }
        },
        mounted() {
            this.fetchData()
        },
        methods: {
            fetchData() {
                // send AJAX request and receive JSON response
                axios.get('/assignment_3/app/controllers/books/read_one.php?id=' + this.$route.params.id)
                // assign response values to javascript object data
                    .then(response => {
                        this.id = response.data.id;
                        this.title = response.data.title;
                        this.original_title = response.data.original_title;
                        this.year_of_publication = response.data.year_of_publication;
                        this.genre = response.data.genre;
                        this.language = response.data.language;
                        this.millions_sold = response.data.millions_sold;
                        this.image_path = response.data.image_path;
                    })
            },
            submit() {
                // send updated parameters to update.php
                axios.post('/assignment_3/app/controllers/books/update.php', {
                    id: this.id,
                    title: this.title,
                    original_title: this.original_title,
                    year_of_publication: this.year_of_publication,
                    genre: this.genre,
                    language: this.language,
                    millions_sold: this.millions_sold,
                    image_path: this.image_path,
                    headers: {
                        "Content-Type": "application/json"
                    }
                    // catch any errors
                }).catch(function (error) {
                    this.$parent.notice.message = 'There was an error updating the book';
                    this.$parent.notice.status = 'error';
                });
                this.$parent.notice.message = 'Book updated successfully!';
                this.$parent.notice.css = 'success';
                this.$router.push('/');
            }
        }
    }
;
let books_index = {
    name: 'books_index',
    data() {
        return {
            books: [],
        };
    },
    computed: {
        booksArray() {
            return this.books
        }
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
        },
        deleteBook(id) {
            axios.post('/assignment_3/app/controllers/books/delete.php', {
                id: id
            }).catch(error => {
                console.log(error);
                this.$parent.notice.message = 'There was an error deleting the book';
                this.$parent.notice.css = 'error';
            });
            this.$router.push('/');
            this.$parent.notice.message = 'Book Deleted Successfully';
            this.$parent.notice.css = 'success';
            this.fetchData();
        },
    },
    mounted() {
        this.fetchData();
    },
    components: {
        book
    },
    template: '#show_all_books_template',
};

let login = {
    data() {
        return {
            user: null,
            pass: null
        }
    },
    methods: {
        login() {
            axios.post('/assignment_3/app/lib/login.php', {
                user: user,
                pass: pass,
            })
        }
    },
}

let routes = [
    // more info on VueJS Routing:      https://router.vuejs.org/en/essentials/getting-started.html
    {path: '/', component: books_index},
    {path: '/new', component: new_book},
    {name: 'book', path: '/book/:id', component: show_book},
    {name: 'edit', path: '/edit/:id', component: edit_book},
];
let router = new VueRouter({
    routes,
});

// The root component
const app = new Vue({
    data() {
        return {
            notice: Object.assign({
                message: null,
                css: null
            })
        }
    },
    router
}).$mount('#app');
