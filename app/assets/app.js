let books = {
    name: 'Books',
    data() {
        return {
            books: [],
        };
    },
    methods: {
        fetchData: function () {
            axios
                .get("/assignment_3/app/controllers/books/read.php")
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
    template: '#show_all_books_template',
};

let routes = [
    {path: '/', component: books},
];
let router = new VueRouter({
    routes,
});

const app = new Vue({
    data() {
        return {

        }
    },
    components: {
        books
    },
    methods: {},
    router
}).$mount('#app');
