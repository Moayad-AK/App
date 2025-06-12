<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>


<main>
    <div class="container">
        <h3 class="mb-3">Hello, this is create note page.</h3>

        <form action="/notes" method="post">
            <div class="mb-3">
                <label for="body" class="form-label">Description</label>
                <textarea class="form-control" id="body" name="body" rows="3" ><?= $_POST['body'] ?? '' ?></textarea>
                <?php if (isset($errors['body'])) : ?>
                    <p class="fs-6 text-danger mt-3 fw-normal"><?= $errors['body'] ?></p>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>

    </div>
</main>
<?php require base_path('views/partials/footer.php') ?>