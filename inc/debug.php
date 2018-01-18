<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 17-01-2018
 * Time: 13:01
 */

if(isset($_POST['hide'])) {
    setcookie("HideDebugMenu",
        $_COOKIE['HideDebugMenu'] = "Hidden", time()+60*60*24*5, "/");
}
if(isset($_COOKIE['HideDebugMenu'])) {
    var_dump($_COOKIE);
} else {
    echo 'NOPE!';
}
?>
<div class="usrp-fb-2 is-expanded">
<?php
if(isset($_COOKIE['HideDebugMenu'])) {

    ?>
    <div class="usrp-fb-state-collapsed">
        <div class="usrp-fb-title"> &nbsp; DEBUG &nbsp;</div>
    </div>

    <?php
} else {
    ?>'
    <div class="usrp-fb-state-expanded">
        <div class="usrp-fb-title"><i class="fa fa-bug"></i> DEBUG MENU <i class="fa fa-bug"></i></div>
        <?php print_r($_SESSION) ?>
        <div class="usrp-fb-divider"></div>
        <form method="post">
            <button type="submit" class="usrp-fb-btn usrp-fb-btn-yes" name="hide">SKJUL</button>
        </form>
    </div>


    <?php
}
?>


</div>
