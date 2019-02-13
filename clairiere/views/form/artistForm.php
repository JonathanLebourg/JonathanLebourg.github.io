<?php
require 'controllers/formsCtl/artistFormController.php';
?>
<div class="container-fluid">
    <div class="col s12 m8">
        <div class="col s12 m9">
            <hr>
            <h1>Vous vous apprêtez à vous inscrire sur le site en tant qu'artiste</h1>
            <hr>
            <p>Suivez les instuctions et renseignez chaque champ</p>
        </div>
        <?php if ($addOK === FALSE) { ?>
            <div class="col s9 m6">VOUS EXISTEZ DÉJÀ !!</div>
        </div>
    <?php } else { ?>

        <div class="container">           
            <form class="col s12" method="POST" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input name="lastName" id="lastName" type="text" class="validate" value="<?= isset($artistById->lastName) ? $artistById->lastName : '' ?>" />
                        <label for="lastName">Nom</label>
                        <p class="text-danger"><?= isset($formError['lastName']) ? $formError['lastName'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="firstName" id="firstName" type="text" class="validate" value="<?= isset($artistById->firstName) ? $artistById->firstName : '' ?>" />
                        <label for="firstName">Prénom</label>
                        <p class="text-danger"><?= isset($formError['firstName']) ? $formError['firstName'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <span></span>
                        <input name="pseudo" id="pseudo" type="text" class="validate" value="<?= isset($artistById->nickName) ? $artistById->nickName : '' ?>" />
                        <label for="pseudo">Nom d'artiste | sera aussi votre pseudo de connexion </label>
                        <p class="text-danger"><?= isset($formError['pseudo']) ? $formError['pseudo'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="mail" id="mail" type="text" class="validate" value="<?= isset($artistById->mail) ? $artistById->mail : '' ?>" />
                        <label for="mail">Mail</label>
                        <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input name="password" id="password" type="password" class="validate" value="<?= isset($artistById->password) ? $artistById->password : '' ?>" />
                        <label for="password">Mot de passe | 8 à 12 caractères (minuscules, MAJUSCULES, chiffres UNIQUEMENT)</label>
                        <p class="text-danger"><?= isset($formError['password']) ? $formError['password'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="passwordCheck" id="passwordCheck" type="password" class="validate" value="<?= isset($passwordCheck) ? $passwordCheck : '' ?>" />
                        <label for="passwordCheck">Vérification du mot de passe</label>
                        <p class="text-danger"><?= isset($formError['passwordCheck']) ? $formError['passwordCheck'] : ''; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div class="file-field input-field">
                            <div class="file-field input-field col s6 m6">
                                <div class="validateButton btn">
                                    <span>Image</span>
                                    <input  type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="jpg, jpeg ou png || 2Mo MAX">
                                </div>
                            </div>
                            <div class="col s6 m6">
                                <img src="" id="output" class="responsive-img" alt="aperçu de l'image" />
                            </div>
                            <div class="error">
                                <p class="text-danger"><?= isset($formError['fileToUpload']) ? $formError['fileToUpload'] : ''; ?></p>
                                <p class="text-danger"><?= isset($uploadError['NaImage']) ? $uploadError['NaImage'] : ''; ?></p>
                                <p class="text-danger"><?= isset($uploadError['exist']) ? $uploadError['exist'] : ''; ?></p>
                                <p class="text-danger"><?= isset($uploadError['size']) ? $uploadError['size'] : ''; ?></p>
                                <p class="text-danger"><?= isset($uploadError['type']) ? $uploadError['type'] : ''; ?></p>                    
                                <p class="text-danger"><?= isset($uploadError['uploadNotOK']) ? $uploadError['uploadNotOK'] : ''; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m3"></div>
                        <div class="input-field col s12 m6">
                            <select name="specialities">
                                <option value="<?= isset($artistById->speciality) ? $artistById->speciality : '' ?>" disabled selected>choisir une spécialité</option>
                                <?php foreach ($listSpeciality as $spec) { ?>
                                    <option value="<?= $spec->idSpeciality ?>"><?= $spec->speciality ?></option>
                                <?php } ?>
                            </select>
                            <label for="specialities">Domaine artistique</label>
                            <p class="text-danger"><?= isset($formError['specialities']) ? $formError['specialities'] : ''; ?></p>
                        </div>
                    </div>
                    <!--            <div class="row">
                                    <div class="input-field col s12">
                                        <input id="ville" name="town" id="town" type="text" class="validate" value="<?= isset($town) ? $town : '' ?>">
                                        <ul>
                                            <li data-vicopo="#ville">
                                                <a id="town" href="" onclick="townChoice()"><strong data-vicopo-code-postal></strong>
                                                <span data-vicopo-ville></span></a>
                                            </li>
                                        </ul>
                                        <label for="town">Ville ||  <i>Entrez un code postal ou une ville</i></label>
                                        <p class="text-danger"><?= isset($formError['town']) ? $formError['town'] : ''; ?></p>
                                    </div>
                                </div>-->
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="present" class="materialize-textarea" name="present" maxlength="2000"><?= isset($artistById->present) ? $artistById->present : '' ?></textarea>
                        <label for="present">Texte de présentation ||  <i>2000 caractères MAX.</i>  <span>  <i>* modifiable ultèrieurement</i></span></label>
                        <p class="text-danger"><?= isset($formError['present']) ? $formError['present'] : ''; ?></p>
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
