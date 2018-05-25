<?php

if (isset($_POST['start_btn'])) {

    if($_POST['second_id'] == $users->id) {
        echo 'Du kan ikke skrive en PM til dig selv';
    }

    $getChat = $chat->getChat($users->id, $_POST['second_id']);
    $checkChat = $chat->checkChat($getChat->id);

}
$second_user = $user->getOne($_SESSION['chatSession']);
?>
<div class="chat-box">
    <ul class="text-right boxs">
        <li class="chat-single-box card-shadow bg-white active" data-id="1">
            <div class="had-container">

                <div class="chat-header p-10 bg-gray">
                    <div class="user-info d-inline-block f-left">
                        <div class="box-live-status bg-<?php if($second_user->is_loggedin == 1) { echo 'success';} else {echo 'danger';} ?> d-inline-block m-r-10"></div>
                        <a href="#"><?= $second_user->firstname . ' ' . $second_user->lastname ?></a>
                    </div>
                    <div class="box-tools d-inline-block">
                        <a href="#" class="mini">
                            <i class="icofont icofont-minus f-20 m-r-10"></i>
                        </a>
                        <a class="close" href="#">
                            <i class="icofont icofont-close f-20"></i>
                        </a>
                    </div>
                </div>

                <div class="chat-body p-10">
                    <div class="message-scrooler">
                        <div class="messages">

                            <div class="message out no-avatar media">
                                <div class="body media-body text-right p-l-50">
                                    <div class="content msg-reply f-12 bg-primary d-inline-block">Good morning..</div>
                                    <div class="seen"><i class="icon-clock f-12 m-r-5 txt-muted d-inline-block"></i><span><p class="d-inline-block">a few seconds ago </p></span>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="sender media-right friend-box">
                                    <a href="javascript:void(0);" title="Me"><img src="../assets/img/users/thumb/<?= $second_user->avatar ?>" class="  img-chat-profile" alt="Me"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="chat-footer b-t-muted">
                    <div class="input-group write-msg">
                        <input type="text" class="form-control input-value" placeholder="Type a Message">
                        <span class="input-group-btn">
                            <button  id="paper-btn" class="btn btn-primary" type="button">
                                 <i class="icofont icofont-paper-plane"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </li>
    </ul>

    <div id="sidebar" class="users p-chat-user">
        <div class="had-container">
            <div class="card card_main p-fixed users-main ">
                <div class="user-box">
                    <div class="card-block">
                        <div class="right-icon-control">
                            <input type="text" class="form-control  search-text" placeholder="Search Friend">
                            <div class="form-icon">
                                <i class="icofont icofont-search"></i>
                            </div>
                        </div>
                    </div>
<!--                    <div class="user-groups">-->
<!--                        <h6>Groups</h6>-->
<!--                        <ul>-->
<!--                            <li class="frnds">Friends</li>-->
<!--                            <li class="work">Work</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    <div class="user-groups">-->
<!--                        <h6>Favourites</h6>-->
<!--                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">-->
<!--                            <a class="media-left" href="#!">-->
<!--                                <img class="media-object  " src="assets/images/avatar-3.jpg" alt="Generic placeholder image">-->
<!--                            </a>-->
<!--                            <div class="media-body">-->
<!--                                <div class="f-13 chat-header">Josephin Doe</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">-->
<!--                            <a class="media-left" href="#!">-->
<!--                                <img class="media-object  " src="assets/images/task/task-u1.jpg" alt="Generic placeholder image">-->
<!--                            </a>-->
<!--                            <div class="media-body">-->
<!--                                <div class="f-13 chat-header">Lary John</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <?php
                    foreach ($user->getAll() as $users) {
                        $_SESSION['chatSession'] = $users->id;
                        ?>
                        <form method="post" action="">
                            <div class="media userlist-box" data-id="<?= $users->id ?>" data-status="<?php if($users->is_loggedin == 1) { echo 'online'; } else { echo 'offline'; } ?>" data-username="<?= $users->firstname . ' ' . $users->lastname ?>" data-toggle="tooltip" data-placement="left" title="<?php if($users->is_loggedin == 1) { echo 'Online'; } else { echo 'Offline'; } ?>">
                                <input type="hidden" name="second_id" value="<?= $users->id ?>">
                                <a class="media-left" type="submit" name="start_btn" href="#!">
                                    <img class="media-object" src="../assets/img/users/thumb/<?= $users->avatar ?>" alt="<?= $users->firstname . ' ' . $users->lastname ?>">
                                    <div class="live-status bg-<?php if($users->is_loggedin == 1) { echo 'success'; } else { echo 'danger'; } ?>"></div>
                                </a>
                                <div class="media-body">
                                    <div class="f-13 chat-header"><?= $users->firstname . ' ' . $users->lastname ?></div>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>