        <?php
   require 'controllers/formsCtl/validateUserCtl.php';
   
        ?>

<div class="container">
    <h1>Inscription réussie</h1>
    <div class="divider"></div>
    <div class="col s12 m6 center-align conditionCheck">
        <h2><b>BIENVENUE</b></h2>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col s12 m6">
            <div class="card-height card white darken-1 hoverable">
                <div class="content1 card-content black-text">
                    <h3>Récapitulatif de vos infos</h3>
                    <p><?= $valid->id ?></p>
                    <p><?= $valid->nickName ?></p>
                    <p><?= $valid->lastName ?></p>
                </div>
                <div class="card-action">
                    <a class="disabled btn userchoicebutton waves-effect waves-light btn" name="button" href="index.php?page=artistForm" >S'inscrire en tant qu'artiste</a>
                </div>
            </div>
        </div>
       
</div>

