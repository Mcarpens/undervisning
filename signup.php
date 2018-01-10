<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 09-01-2018
 * Time: 13:09
 */

if(isset($_POST['btn-signup']))
{
    $fname = strip_tags($_POST['txt_fname']);
    $lname = strip_tags($_POST['txt_lname']);
    $uname = strip_tags($_POST['txt_uname']);
    $upass = strip_tags($_POST['txt_upass']);

    if ($fname=="") {
        $error[] = "Angiv et fornavn !";
    }
    else if ($lname=="") {
        $error[] = "Angiv et efternavn !";
    }
    else if($uname=="")	{
        $error[] = "Angiv et brugernavn !";
    }
    else if($upass=="")	{
        $error[] = "Angiv en adgangskode!";
    }
    else if(strlen($upass) < 6){
        $error[] = "Adgangskoden skal mindst være på 6 karatere";
    }
    else
    {
        try
        {
            $stmt = $user->runQuery("SELECT username FROM users WHERE username=:uname");
            $stmt->execute(array(':uname'=>$uname));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['username']==$uname) {
                $error[] = "Brugernavnet er allerede i brug !";
            }
            else
            {
                if($user->register($fname, $lname, $uname,$upass)){
                    $user->redirect('./index.php?side=opret?joined');
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
?>
<form method="post" class="form-signin">
    <h2 class="form-signin-heading">Opret en bruger</h2><hr />
    <?php
    if(isset($error))
    {
        foreach($error as $error)
        {
            ?>
            <div class="alert alert-danger alert-dismissible" id="myAlert">
                <a href="#" class="close">&times;</a>
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp;<?php echo $error; ?>
            </div>
            <?php
        }
    }
    else if(isset($_GET['joined']))
    {
        ?>
        <div class="alert alert-success alert-dismissible" id="myAlert">
            <a href="#" class="close">&times;</a>
            <i class="glyphicon glyphicon-check"></i> &nbsp;Registreringen er gemmeført, <a href='./index.php?side=logind'>log ind</a> her
        </div>
        <?php
    }
    ?>
    <div class="form-group">
        <input type="text" class="form-control" name="txt_fname" placeholder="Indtast Fornavn" value="<?php if(isset($error)){echo $fname;}?>" />
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="txt_lname" placeholder="Indtast Efternavn" value="<?php if(isset($error)){echo $lname;}?>" />
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="txt_uname" placeholder="Indtast Brugernavn" value="<?php if(isset($error)){echo $uname;}?>" />
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="txt_upass" placeholder="Indtast Adgangskode" />
    </div>
    <div class="clearfix"></div><hr />
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="btn-signup">
            <i class="fa fa-user-plus"></i>&nbsp;OPRET
        </button>
        <button type="reset" class="btn btn-danger">
            <i class="fa fa-ban"></i>&nbsp;FORTRYD
        </button>
    </div>
    <br />
    <label>Har du allerede en konto? <a href="./index.php?side=logind">Log ind her</a></label>
</form>
<script>
    $(document).ready(function(){
        $(".close").click(function(){
            $("#myAlert").alert("close");
        });
    });
</script>