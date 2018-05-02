let book = {
    props: ['book'],
    methods: {
        fetchData(id) {
            axios.get("/assignment_3/app/controllers/books/read_one.php?id=" + id)
                .then(response => {
                    this.title = response.data.title;
                    this.original_title = response.data.original_title;
                    this.year_of_publication = response.data.year_of_publication;
                    this.genre = response.data.genre;
                    this.millions_sold = response.data.millions_sold;
                    this.language = response.data.language;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    created() {
        this.fetchData(this.id);
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
            axios.get("/assignment_3/app/controllers/books/read.php")
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
    // components: {
    //     books
    // },
    methods: {},
    router
}).$mount('#app');
