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

    },
    computed: {
        isEditable: function () {
            return this.editable;
        }
    },
    template: '#book_template'
};
let books_index = {
    name: 'books_index',
    data() {
        return {
            books: [],
        };
    },
    methods: {
        fetchData: function () {
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
];
let router = new VueRouter({
    routes,
});

const app = new Vue({
    data() {
        return {}
    },
    methods: {},
    router
}).$mount('#app');
