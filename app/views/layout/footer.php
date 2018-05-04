<footer>
    <ul class="debug">
        <li><strong>SESSION:</strong>
            <?php if (isset($_SESSION)) { print_r($_SESSION); } ?>
        </li>
        <li><strong>POST:</strong> <?php print_r($_POST) ?></li>
    </ul>
</footer>