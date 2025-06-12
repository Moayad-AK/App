<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>


<main class="text-center my-auto">
    <div class="container " style="padding-top: 40px;">
        <form action="/sessions" method="post" >
            <h1 class="h3 mb-3 fw-normal">Log In to your account</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
                <?php if (isset($errors['email'])) : ?>
                    <p class="fs-6 text-danger mt-3 fw-normal"><?= $errors['email'] ?></p>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password">
                <label for="password">Password</label>
                <?php if (isset($errors['password'])) : ?>
                    <p class="fs-6 text-danger mt-3 fw-normal"><?= $errors['password'] ?></p>
                <?php endif; ?>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Log In</button>
        </form>
    </div>
</main>
<?php require base_path('views/partials/footer.php') ?>