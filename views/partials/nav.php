<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <div class="p-2 bd-highlight">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <!-- for XAMPP <a class="nav-link active" aria-current="page" href="/PHP/App/">Home</a> -->
                        <a class="<?= urlIs('/') ? 'nav-link active' : 'nav-link'; ?>" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- for XAMPP <a class="nav-link" href="/PHP/App/about.php">About</a> -->
                        <a class="<?= urlIs('/about') ? 'nav-link active' : 'nav-link'; ?>" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <!-- for XAMPP <a class="nav-link" href="/PHP/App/about.php">About</a> -->
                        <a class="<?= urlIs('/notes') ? 'nav-link active' : 'nav-link'; ?>" href="/notes">Notes</a>
                    </li>
                    <li class="nav-item">
                        <!-- for XAMPP <a class="nav-link" href="/PHP/App/contact.php">Contact</a> -->
                        <a class="<?= urlIs('/contact')  ? 'nav-link active' : 'nav-link'; ?>" href="/contact">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="ms-auto p-2 bd-highlight">
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <!-- for XAMPP <a class="nav-link" href="/PHP/App/contact.php">Contact</a> -->
                            <p class="text-white my-auto"><?= $_SESSION['user']['email'] ?></p>
                        </li>
                    </ul>
                <?php else : ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="<?= urlIs('/register')  ? 'nav-link active' : 'nav-link'; ?>" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="<?= urlIs('/login')  ? 'nav-link active' : 'nav-link'; ?>" href="/login">Log In</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>