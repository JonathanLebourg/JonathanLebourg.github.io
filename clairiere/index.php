<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>La clairière</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https:////cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/style/generalStyle.css" /> 
    </head>
    <body>
        <?php
        if (!isset($_GET['page'])) {
            include('views/pageZERO.php');
        } else {
            ?>
            <div class="container-fluid">
                <?php
                include 'views/nav_foot/navbar.php';
                ?>
            </div>
            <main>
                <?php
                switch ($_GET['page']) {
                    case 'accueil':
                        include('views/accueil.php');
                        break;
//                  
                    case 'whoIam':
                        include('views/whoIam.php');
                        break;
//                   ----------FORMULAIRES-----------
                    case 'contact':
                        include('views/form/contact.php');
                        break;

                    case 'inscription':
                        include('views/form/userChoice.php');
                        break;
//                 -
                    case 'artistForm':
                        include('views/form/artistForm.php');
                        break;
                    case 'modifProfile':
                        include('views/form/modifArtistForm.php');
                        break;
                    case 'clientForm':
                        include('views/form/clientForm.php');
                        break;
                    case 'ajoutOeuvre':
                        include('views/form/worksForm.php');
                        break;

                    case 'validateUser':
                        include('views/form/validate/validateUser.php');
                        break;
//                        -----------PROFILS-----------
                    case 'admin':
                        include('views/profile/myprofileAdmin.php');
                        break;
                    case 'myprofileArtist':
                        include('views/profile/myprofileArtist.php');
                        break;
                    case 'myprofileClient':
                        include('views/profile/myprofileClient.php');
                        break;
                    
                    case 'artWork':
                        include('views/profile/profileArtWork.php');
                        break;

                    case 'listArtists':
                        include('views/lists/listArtists.php');
                        break;
                    case 'listArtWorks':
                        include('views/lists/listArtWorks.php');
                        break;

                    case 'validateDelete':
                        include('views/validate/validateDelete.php');
                        break;
                    
                    case 'validate':
                        include('views/validate/validate.php');
                        break;

                    case 'mentions':
                        include('views/legalMention.php');
                        break;
                    default :
                        include('views/pageERROR.php');
                        break;
                }
                ?>
            </main>
            <div class="container-fluid">
                <?php
                include 'views/nav_foot/footer.php';
            }
            ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="assets/script/generalScript.js"></script>

        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!--        <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="assets/script/tableScriptUsers.js"></script>-->
    </body>
</html>
