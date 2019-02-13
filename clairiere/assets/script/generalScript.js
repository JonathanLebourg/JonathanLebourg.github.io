$(document).ready(function () {
//**-------dropdown-------**
    $('.dropdown-trigger').dropdown();
    $('.materialboxed').materialbox();
    $('.modal').modal();
    //**-----navbar responsive----**
    $('.sidenav').sidenav({edge: 'right'});
    //**----select en materialize-----**
    $(document).ready(function () {
        $('select').formSelect();
    });
    $('.tabs').tabs();
    $('#datatable').DataTable();
//**-----fction jquery pour activer les boutons ds userChoice quand on checked les conditions générales------**
    $('[name="checkbox"]').change(function () {
        if ($(this).is(':checked')) {
            // Do something...
            $('.card-action a').removeClass("disabled")
        } else
            $('.card-action a').addClass("disabled")
    })
    
    
    $('[name="submitNickName"]').click(function () {
        $('.modifDivNickName').toggle(500);
    });
    $('[name="submitLastName"]').click(function () {
        $('.modifDivLastName').toggle(500);
    });
    $('[name="submitFirstName"]').click(function () {
        $('.modifDivFirstName').toggle(500);
    });
    $('[name="submitMail"]').click(function () {
        $('.modifDivMail').toggle(500);
    });
    $('[name="submitPassword"]').click(function () {
        $('.modifDivPassword').toggle(500);
    });


//fction pour afficher l aperçu des images dans les formulaires
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#output').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileToUpload").change(function () {
        readURL(this);
    });
});










//**-------carousel--------**
//$(document).ready(function () {
//    $(".owl-carousel").owlCarousel();
//});


//**-----function pour ramener les noms de ville dans l inmput ville du form artist-----**
//
//$(function townChoice()
//{
//    $("#town").click(function () {
//        ;
//    })
//});
