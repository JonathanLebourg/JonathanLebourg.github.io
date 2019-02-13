<?php require 'controllers/formsCtl/clientFormController.php'; ?>
<div class="container-fluid">
    <div class="col s12 m8">
        <div class="col s12 m9">
            <hr>
            <h1>Vous vous apprêtez à vous inscrire sur le site en tant que client</h1>
            <hr>
            <p>Suivez les instuctions et renseignez chaque champ</p>
        </div>
        <?php if ($addOK === FALSE) { ?>
            <div class="col s9 m6">VOUS EXISTEZ DÉJÀ !!</div>
        </div>
    <?php } else { ?>
        <div class="container">            
            <form class="col s12" method="POST" action="" >
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input name="lastName" id="lastName" type="text" class="validate" value="<?= isset($lastName) ? $lastName : '' ?>" />
                        <label for="lastName">Nom</label>
                        <p class="text-danger"><?= isset($formError['lastName']) ? $formError['lastName'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="firstName"id="firstName" type="text" class="validate" value="<?= isset($firstName) ? $firstName : '' ?>" />
                        <label for="firstName">Prénom</label>
                        <p class="text-danger"><?= isset($formError['firstName']) ? $formError['firstName'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input name="pseudo" id="pseudo" type="text" class="validate" value="<?= isset($pseudo) ? $pseudo : '' ?>" />
                        <label for="pseudo">Pseudo de connexion</label>
                        <p class="text-danger"><?= isset($formError['pseudo']) ? $formError['pseudo'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="mail"id="password" type="text" class="validate" value="<?= isset($mail) ? $mail : '' ?>" />
                        <label for="mail">Mail</label>
                        <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input name="password" id="password" type="password" class="validate" value="<?= isset($password) ? $password : '' ?>" />
                        <label for="password">Mot de passe  |  8 à 12 caractères (minuscules, MAJUSCULES, chiffres)</label>
                        <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="passwordCheck" id="passwordCheck" type="password" class="validate" value="<?= isset($passwordCheck) ? $passwordCheck : '' ?>" />
                        <label for="passwordCheck">Vérification du mot de passe</label>
                        <p class="text-danger"><?= isset($formError['passwordCheck']) ? $formError['passwordCheck'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <button class="validateButton btn waves-effect waves-light" type="submit" name="submit">S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php } ?>