<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php foreach ($setting->getAllSettings() as $settings) {echo $settings->site_name;} ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <style>
        pre {
            background-color: #333;
            color: #fff;
            padding: 5px 15px;
        }
    </style>
</head>
<body>
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
            ?>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Config.php</h1>
            <pre><code>&lt;?php
// Database information //
define('_DB_HOST_', 'localhost'); // Host
define('_DB_NAME_', 'undervisning'); // Database Navn
define('_DB_USER_', 'root'); // Database Bruger
define('_DB_PASSWORD_', ''); // Database Adgangskode
define('_DB_PREFIX_', ''); // Database Prefix
define('_MYSQL_ENGINE_', 'InnoDB'); // Database Motor

// Automatisk Klasse Indlæser //
function ClassLoader($className)
{
    $className = str_replace('\\', '/', $className);
    if(file_exists(__DIR__ . '/classes/' . $className . '.php')){
        require_once(__DIR__ . '/classes/' . $className . '.php');
    } else {
        echo 'ERROR: '. __DIR__ .'/classes/'. $className . '.php';
    }
}
spl_autoload_register('ClassLoader');

// Håndtere database forbindelse //
$db = new DB('mysql:host='._DB_HOST_.';dbname='._DB_NAME_.';charset=utf8',_DB_USER_,_DB_PASSWORD_);
?&gt;</code></pre>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>Settings.php</h1>
            <pre><code>&lt;?php
class Settings {
    private $db = null;
    public function __construct($db)
    {
        $this-&gt;db = $db;
    }
    public function getAllMenu()
    {
        return $this-&gt;db-&gt;toList("SELECT * FROM `menu`");
    }
    public function getAllSettings()
    {
        return $this->db->toList("SELECT * FROM `settings`");
    }
}
?&gt;</code></pre>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1>Index.php</h1>
            <h5>Starten af dokumentet. Før &lt;head&gt; osv.</h5>
            <pre><code>&lt;?php
require_once './config.php';
$setting = New Settings($db);
?&gt;</code></pre>
            <h5>Titel i &lt;head&gt; og andre steder der benytter side navnet (eks. &lt;nav&gt;)</h5>
            <pre><code>&lt;?php
    foreach ($setting->getAllSettings() as $settings) {
        echo $settings->site_name;
    }
?&gt;</code></pre>
            <h5>Menuen</h5>
            <pre><code>&lt;?php
    foreach ($setting->getAllMenu() as $menu) {
        echo '&lt;li class="nav-item"&gt;';
        echo '&lt;a class="nav-link" href="' . $menu->link . '.php"&gt;' . $menu->name . '&lt;/a&gt;';
        echo '&lt;/li&gt;';
    }
?&gt;</code></pre>
        </div>
    </div>
</div>
<?php
//foreach ($user->getAll() as $users){
//    echo 'Hej, ' .$users->firstname . ' ' . $users->lastname;
//    echo '<br>';
//    echo 'Dit brugernavn er: ' . $users->username;
//    echo '<br>';
//    echo 'Din brugerrolle er: ' . $users->fk_userrole;
//}
//?>
</body>
</html>