<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>



<main>
    <div class="container">
        <h3 class="mb-3">Hello, this is my notes page.</h3>
        <ul>
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>
            <a href="/notes/create" class="btn btn-success">Create Note</a>
        </p>

    </div>
</main>
<?php require base_path('views/partials/footer.php') ?>