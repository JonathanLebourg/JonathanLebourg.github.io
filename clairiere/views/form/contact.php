<div class="container-fluid">
    <div class="col s12 m8">
        <hr>
        <h1><b>Contactez le site</b></h1>
        <hr>
        <p>Vous desirez nous faire part d'un message, vous êtes sur la bonne page.</p>        
    </div>
    <div class="container">
    <div class="col s12 m6">
        <form class="col s12" method="POST" action="" >
            <div class="row">
                <div class="input-field col s12 m6">
                    <input name="pseudo" id="pseudo" type="text" class="validate" value="<?= isset($pseudo) ? $pseudo : '' ?>" />
                    <label for="pseudo">Pseudo<?= isset($formError['pseudo']) ? $formError['pseudo'] : ''; ?></label>
                    <p class="text-danger"><?= isset($formError['pseudo']) ? $formError['pseudo'] : ''; ?></p>
                </div>
                <div class="input-field col s12 m6">
                    <input name="mail" id="mail" type="text" class="validate" value="<?= isset($mail) ? $mail : '' ?>" />
                    <label for="mail">Mail</label>
                    <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : ''; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="message" class="materialize-textarea" name="message" placeholder="(2000 caractères MAX.)" maxlength="2000"></textarea>
                    <label for="message">Message</label>
                    <p class="text-danger"><?= isset($formError['message']) ? $formError['message'] : ''; ?></p>
                </div>
            </div>
            <div class="row">
                <button class="validateButton btn waves-effect waves-light" type="submit" name="submitContact">Envoyer</button>
            </div>
        </form>
    </div>
        </div>
</div>


