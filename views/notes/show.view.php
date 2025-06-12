<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>


<main>
    <div class="container">
        <h3 class="mb-3">Hello, this is the note(<?= $note['id'] ?>) page.</h3>
        <p class="mb-5"><a href="/notes">go back...</a></p>
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>
        <div class="d-flex mb-3">
            <div class="my-auto">
                <a href="/note/edit?id=<?= $note['id'] ?>" class="btn btn-info">Edit</a>
            </div>
            <div class=" mx-3">
                <form action="" method="post">
                    <div class="my-5">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $note['id'] ?>">
                        <button class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
</main>
<?php require base_path('views/partials/footer.php') ?>