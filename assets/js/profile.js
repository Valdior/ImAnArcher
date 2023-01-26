import '../styles/profile.scss';

document.addEventListener("DOMContentLoaded", function(event) {
    const imgSrc = document.getElementById("imgProfile").src;

    function readURL(input) {

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('imgProfile').src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('btnChangePicture').onclick  = function clickPicture() {
        document.getElementById('profilePicture').click();
    }

    document.getElementById('profilePicture').onchange  = function changePicture() {
        readURL(this);
        document.getElementById('btnChangePicture').classList.add('changing');
        document.getElementById('btnChangePicture').setAttribute('value', 'Confirm');
        document.getElementById('btnDiscard').classList.remove('d-none');
        document.getElementById('imgProfile').setAttribute('src', '');
    }

    document.getElementById('btnDiscard').onclick  = function discardPicture() {
        readURL(this);
        document.getElementById('btnChangePicture').classList.remove('changing');
        document.getElementById('btnChangePicture').setAttribute('value', 'Change');
        document.getElementById('btnDiscard').classList.add('d-none');
        document.getElementById('imgProfile').setAttribute('src', imgSrc);
        //document.getElementById('profilePicture').setValue('');
    }

    // document.getElementById('profilePicture').on('change', function () {
    //     readURL(this);
    //     document.getElementById('btnChangePicture').addClass('changing');
    //     document.getElementById('btnChangePicture').attr('value', 'Confirm');
    //     document.getElementById('btnDiscard').removeClass('d-none');
    //     // document.getElementById('imgProfile').attr('src', '');
    // });


    // document.getElementById('btnDiscard').on('click', function () {
    //     // if (document.getElementById('btnDiscard').hasClass('d-none')) {
    //     document.getElementById('btnChangePicture').removeClass('changing');
    //     document.getElementById('btnChangePicture').attr('value', 'Change');
    //     document.getElementById('btnDiscard').addClass('d-none');
    //     document.getElementById('imgProfile').attr('src', imgSrc);
    //     document.getElementById('profilePicture').val('');
    //     // }
    // });
});