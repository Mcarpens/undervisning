<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar - <?php foreach ($setting->getAllSettings() as $settings) {echo $settings->site_name;} ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <?php
            foreach ($setting->getAllMenu() as $menu) {
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="./index.php?side=' . $menu->link . '">' . $menu->name . '</a>';
                echo '</li>';
            }

            if($user->secCheckLevel() >= 90) {
                echo '<li class="nav-item"><a href="index.php?side=beskeder">Beskeder</a></li>';
                echo '<li class="nav-item"><a href="index.php?side=opdater">Opdater</a></li>';
            } else {
                echo '';
            }

            if($user->is_loggedin() === TRUE) {
                echo '<li class="nav-item"><a href="index.php?side=logud">Log ud</a></li>';
            } else {
                echo '<li class="nav-item"><a href="index.php?side=logind">Log ind</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>