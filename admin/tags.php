<?php
/**
 * Created by PhpStorm.
 * User: mcarp
 * Date: 23-01-2018
 * Time: 08:58
 */
?>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="./index.php?side=dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Nyheder</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-list"></i> Tags</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">Navn</th>
                            <th scope="col" style="text-align: center">Handling</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($blogs->getAllTags() as $tag) { ;?>
                            <tr>
                                <td><?= $tag->name ?></td>
                                <td style="text-align: center">
                                    <a href="?side=redigerTag&id=<?=$tag->id?>"><button class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Rediger tag"><i class="fa fa-edit"></i> </button></a>
                                    <a href="?side=sletTag&id=<?=$tag->id?>"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Slet tag"><i class="fa fa-ban"></i> </button></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

