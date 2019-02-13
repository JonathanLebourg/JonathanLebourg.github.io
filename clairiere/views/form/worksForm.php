<?php
require 'controllers/formsCtl/worksFormController.php';
?>
<div class="container-fluid">
    <div class="row">
        <hr>
        <h1><b>Ajout d'une oeuvre</b></h1>
        <hr>

    </div>
</div>     
<div class="container">           
    <form class="" method="POST" action="" enctype="multipart/form-data" >
        <div class="borderPreAlert2 col s8 offset-s2 m8 offset-m2">
            <div class="row">
                <div class="col s8 offset-s2 m8 offset-m2">
                    <p>Vous êtes invitez à suivre au mieux les recommandations afin de permettre à votre travail
                        de rencontrer le plus de succès possible</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8 offset-m1">
                    <input name="title" id="title" type="text" class="validate" value="<?= isset($artWork->title) ? $artWork->title : '' ?>" />
                    <label for="title">Titre de l'oeuvre</label>
                    <p class="text-danger"><?= isset($formError['title']) ? $formError['title'] : ''; ?></p>
                </div>
                <div class="input-field col s12 m2">
                    <select name="workStyle">
                        <option value="" disabled selected>Choisir</option>
                        <?php foreach ($listWorkStyles as $style) { ?>
                            <option value="<?= $style->idWorkStyle ?>"><?= $style->workStyle ?></option>
                        <?php } ?>
                    </select>
                    <label>Selectionnez le type d'oeuvre</label>
                    <p class="text-danger"><?= isset($formError['workstyle']) ? $formError['workstyle'] : ''; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="input-field col s10 offset-s1 m10 offset-m1">
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
            </div>
        </div>
        
        <div class="borderPreAlert3 col s8 offset-s2 m8 offset-m2">
            <div class="row">
                <div class="col s8 offset-s2 m8 offset-m2">
                    <h1>Modalités <b>importantes</b> liés à la clairière</h1>
                    <p>vous pouvez décider sous quelles conditions sera partagé votre travail puis fixer 
                        au besoin un prix.</p>
                    <p>Sans oublier que ce prix ne reste qu'indicatif pour les échanges avec les potentiels clients 
                        puisqu'aucun argent ne transite sur notre plateforme.</p>
                    <hr>
                </div>
                <div class="col s8 offset-s2 m8 offset-m2">
                    <div class="input-field col s12 m8 offset-m2">
                        <select name="modality">
                            <option value="" disabled selected>Choisir</option>
                            <?php foreach ($listModalities as $modality) { ?>
                                <option value="<?= $modality->idModality ?>"><?= $modality->modalityType ?></option>
                            <?php } ?>
                        </select>
                        <label>Faites votre sélection</label>
                        <p class="text-danger"><?= isset($formError['modality']) ? $formError['modality'] : ''; ?></p>
                    </div>
                    <div class="input-field col s12 m6 offset-m3">
                        <p>prix en Euros</p>
                        <input type="text" name="price" id="price" class="validate" value="<?= isset($artWork->price) ? $artWork->price : '' ?>" />
                        <label>Prix</label>
                        <p class="text-danger"><?= isset($formError['price']) ? $formError['price'] : ''; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="borderPreAlert col s8 offset-s2 m8 offset-m2">
            <div class="row">
                <div class="col s8 offset-s2 m8 offset-m2">
                    <p>Le reste de ces informations est facultatif 
                        bien qu'il soit recommandé de renseigner le plus de champs possibles</p>
                    <p>(de plus, toutes les informations restent modifiables par la suite)</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s10 offset-s1 m10 offset-m1">
                    <input name="technicalDescription" id="technicalDescription" type="text" class="validate" value="<?= isset($artWork->technicalDescription) ? $artWork->technicalDescription : '' ?>" />
                    <label for="technicalDescription">Description technique (dimensions, matières, techniques, etc...)  ||  <i>2000 caractères MAX.</i></label>
                    <p class="text-danger"><?= isset($formError['technicalDescription']) ? $formError['technicalDescription'] : ''; ?></p>
                </div>
                <div class="input-field col s10 offset-s1 m10 offset-m1">
                    <textarea id="optionalDescription" class="materialize-textarea" name="optionalDescription" maxlength="2000"></textarea>
                    <label for="optionalDescription">Informations complémentaires de votre choix ||  <i>2000 caractères MAX.</i></label>
                    <p class="text-danger"><?= isset($formError['optionalDescription']) ? $formError['optionalDescription'] : ''; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <p>vous pouvez aussi si vous le désirez préciser l'année de création de votre oeuvre</p>
                </div>
                <div class="input-field col s6 offset-s3 m4 offset-m4 ">
                    <input name="date" id="date" type="text" class="validate" value="<?= isset($date) ? $date : '' ?>" />
                    <label for="date">Date</label>
                    <p class="text-danger"><?= isset($formError['date']) ? $formError['date'] : ''; ?></p>
                </div>
            </div>
        </div>
        
        <div class="row">
            <button class="validateButton btn waves-effect waves-light" type="submit" name="submitArtWork">Envoyer</button>
        </div>
        
    </form>
</div>