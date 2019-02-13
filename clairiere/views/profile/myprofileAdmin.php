<?php
require 'controllers/adminCtl.php';

?>

<div class="container-fluid">
    <div class="row">
        <hr>
        <h1><b>Page ADMINISTRATEUR</b></h1>
        <hr>
    </div>
    <div class="row">
        <div class="col s12 m2">
            <div class="row"><p><b><?= $countUsers - 1?></b> INSCRITS sur le site</p></div>
            <div class="row"><p>dont :</p></div>
            <div class="row"><p><b><?= $countArtists ?></b> ARTISTES</p></div>
            <div class="row"><p><b><?= $countClients ?></b> CLIENTS</p></div>
            <div class="row"><p><b><?= $countArtWorks ?></b> OEUVRES</p></div>
        </div>
        <div class="col s12 m10  basic">
            <div class="row">
                <div class="col s12 m12 centered">
                    <ul class="tabs">
                        <li class="tab col s4 m4"><a href="#stats">Statistiques Générales</a></li>
                        <li class="tab col s4 m4"><a class="active" href="#artists">Artistes</a></li>
                        <li class="tab col s4 m4"><a href="#clients">Clients</a></li>
                    </ul>
                </div>
                <div id="stats" class="col s9 m10 offset-m1 centered">
                    <div class="col s12 m10 offset-m1 centered">
                        <ul class="tabs">
                            <!--<li class="tab col s3 m3"><a href="#numbers">Chiffres</a></li>-->
                            <li class="tab col s3 m3"><a class="active" href="#usersList">Liste complète des inscrites</a></li>
                            <li class="tab col s3 m3"><a href="#worksList">Liste complète des oeuvres</a></li>
                        </ul>
                    </div>          
                    <!--                    <div id="numbers" class="col s12" >
                                            <p><?= $countUsers ?> inscrits sur le site</p>
                                        </div>-->
                    <div id="usersList" class="col s12" >
                        <div class="row">
                            <table id="datatable" class="display centered responsive-table">
                                <thead>
                                    <tr>
                                        <th><b>Nom</b></th>
                                        <th><b>Prénom</b></th>
                                        <th><b>Pseudo</b></th>
                                        <th><b>Mail</b></th>
                                        <th><b>Type</b></th>
                                        <th><b>Détail</b></th>
                                        <th><b>Supprimer</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listUsers as $user) {
                                        ?>
                                        <tr>
                                            <td><?= $user->lastName ?></td>
                                            <td><?= $user->firstName ?></td>
                                            <td><?= $user->nickName ?></td>
                                            <td><?= $user->mail ?></td>
                                            <?php if ($user->idUserType == 1) { ?>
                                                <td> Administrateur </td> <?php } ?>
                                            <?php if ($user->idUserType == 2) { ?>
                                                <td> Artiste </td> <?php } ?>
                                            <?php if ($user->idUserType == 3) { ?>
                                                <td> Client </td> <?php } ?>

                                            <?php if ($user->idUserType == 2) { ?>
                                                <td> <a href="index.php?page=myprofileArtist&id=<?= $user->userId; ?>">
                                                        <i class="tiny material-icons">person</i>
                                                    </a> </td> <?php } ?>
                                            <?php if ($user->idUserType == 3) { ?>
                                                <td> <a href="index.php?page=myprofileClient&id=<?= $user->userId; ?>">
                                                        <i class="tiny material-icons">person</i>
                                                    </a> </td> <?php } ?>
                                            <?php if ($user->idUserType == 1) { ?>
                                                <td> <a href="index.php?page=admin">
                                                        <i class="tiny material-icons">person</i>
                                                    </a> </td> <?php } ?>

                                            <td><a href="" data-target="modalDeleteUser<?= $user->userId; ?>" class="modal-trigger">
                                                    <i class="tiny material-icons">delete</i>
                                                </a></td>
                                        </tr>
                                        <!--Modal Structure--> 
                                    <div id="modalDeleteUser<?= $user->userId; ?>" class="modal">
                                        <div class="modal-content">
                                            <div class="container">
                                                <h1>SUPPRIMER</h1>
                                                <div class="divider"></div>
                                            </div>
                                            <div class="container">
                                                <p>ATTENTION, action irreversible !!!</p>
                                                <form method="POST" action="index.php?page=admin&user=<?= $user->userId; ?>" id="formIdDeleteUser<?= $user->userId; ?>">
                                                    <input  form="formIdDeleteUser<?= $user->userId; ?>" class="modal-action btn waves-effect waves-light validateButton" type="submit" value="EFFACER ARTISTE" name="deleteUser" />
                                                </form>
                                                <div class="row">
                                                    <a class="modal-close waves-effect waves-light">ANNULER</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="worksList" class="col s12" >
                        <div class="row">
                            <table id="datatable_2" class="display centered responsive-table">
                                <thead>
                                    <tr>
                                        <th><b>Titre</b></th>
                                        <th><b>date</b></th>
                                        <th><b>Description technique</b></th>
                                        <th><b>Description optionnelle</b></th>
                                        <th><b>Style</b></th>
                                        <th><b>nom du fichier</b></th>
                                        <th><b>Détail</b></th>
                                        <th><b>Supprimer</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listArtWorks as $work) {
                                        ?>
                                        <tr>
                                            <td><?= $work->title ?></td>
                                            <td><?= $work->date ?></td>
                                            <td><?= $work->technicalDescription ?></td>
                                            <td><?= $work->optionalDescription ?></td>
                                            <td> <?= $work->workStyle ?> </td> 
                                            <td> <?= $work->picture ?> </td>

                                            <td> <a href="index.php?page=ArtWork&id=<?= $work->idArtWork; ?>">
                                                    <i class="tiny material-icons">person</i>
                                                </a> </td> 


                                            <td><a href="" data-target="modalWork<?= $work->idArtWork; ?>" class="modal-trigger">
                                                    <i class="tiny material-icons">delete</i>
                                                </a></td>
                                        </tr>
                                        <!--Modal Structure--> 
                                    <div id="modalWork<?= $work->idArtWork; ?>" class="modal">
                                        <div class="modal-content">
                                            <div class="container">
                                                <h1>SUPPRIMER</h1>
                                                <div class="divider"></div>
                                            </div>
                                            <div class="container">
                                                <p>ATTENTION, action irreversible !!!</p>
                                                <form method="POST" action="index.php?page=admin&id=<?= $work->idArtWork; ?>" id="formWorkId<?= $work->idArtWork; ?>">
                                                    <input  form="formWorkId<?= $work->idArtWork; ?>" class="modal-action btn waves-effect waves-light choicebutton delete" type="submit" value="EFFACER OEUVRE" name="deleteWork" />
                                                </form>
                                                <div class="row">
                                                    <a class="modal-close waves-effect waves-light choicebutton delete">ANNULER</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="artists" class="col s12">
                    <p>plein de count</p>
                </div>
                <div id="clients" class="col s12">
                    <p>plein de count</p>
                </div>
            </div>
        </div>
    </div>
</div>