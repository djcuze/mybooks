<?php require_once 'config.php'; ?>
<!doctype html>
<html lang='en'>
<head profile="https://www.w3.org/2005/10/profile">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <script src="app/assets/vendor/vue.js" defer></script>
    <script src="app/assets/vendor/vue-router.js" defer></script>
    <script src="app/assets/vendor/jquery-3.3.1.min.js"></script>
    <script src="app/assets/vendor/axios.js" defer></script>
</head>
<body>
<?php include_once 'app/views/layout/header.php' ?>
<main class="content">g
    <article class="book">
        <h1>Book Title</h1>
        <img src="http://placehold.it/114/162" alt="A Book Cover" class="book__cover"/>
        <ul>
            <li>Publication Year:</li>
            <li>Author's Name</li>
            <li>No. Copies Sold</li>
            <li>
                <button>Update</button>
            </li>
            <li>
                <button>Delete</button>
            </li>
        </ul>
    </article>
</main>
</body
</html>
