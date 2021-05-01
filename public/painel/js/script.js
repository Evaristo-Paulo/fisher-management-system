/*setTimeOut tempo para desaparecer mensagens de erro*/
setTimeout(() => {
    $('.x_title .alert').alert('close').removeClass("fadeInDown").addClass(" fadeOutDown");
}, 3000); //depois de 3 segundos

/* Validar modal mudar senha */
var password = document.querySelector('#password')
var confirmPassword = document.querySelector('#password-same')
var messageConfirmPassword = document.querySelector('.validation-same-password')
var closeModal = document.querySelector('.close-modal')
var form = document.querySelector('.modal-full-body')

confirmPassword.addEventListener('blur', (e) => {
    if (confirmPassword.value == password.value) {
        messageConfirmPassword.innerHTML = ''
    } else {
        messageConfirmPassword.innerHTML = 'Senhas não coencidem'
    }

    form.addEventListener('submit', (e) => {
        if (confirmPassword.value != password.value || confirmPassword.legnth > 5) {
            e.preventDefault();
        }
    })
})

/* Popular província */
$(function () {
    $('#province').on('change', function (e) {
        var province_id = e.target.value;
        $('#municipe').empty();
        //Ajax
        $.get('/ajax-subcat?province_id=' + province_id, function (data) {
            $('#municipe').append(
                '<option selected disabled>Selecionar município</option>')
            $.each(data, function (index, subcatObj) {
                console.log(index)
                $('#municipe').append('<option value="' + subcatObj.id +
                    '">' + subcatObj.name + '</option>')
            });
        });
    });
});
/* Popular especie */
$(function () {
    $('#specie').on('change', function (e) {
        var specie_id = e.target.value;
        $('#resource').empty();
        //Ajax
        $.get('/ajax-specie-resource?specie_id=' + specie_id, function (data) {
            $('#resource').append(
                '<option selected disabled>Selecionar recurso</option>')
            $.each(data, function (index, subcatObj) {
                console.log(index)
                $('#resource').append('<option value="' + subcatObj.id +
                    '">' + subcatObj.name + '</option>')
            });
        });
    });
});

var loadingAjax = document.getElementById('loading-ajax')

$(".registar-pescado").click(function (event) {
    event.preventDefault();

    let fisher = $("select[name=fisher]").val();
    let weight = $("input[name=weight]").val();
    let specie = $("select[name=specie]").val();
    let resource = $("select[name=resource]").val();
    let state = $("select[name=conservation]").val();
    let date = $("input[name=fishing-date]").val();
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/armadores/atribuicao-de-captura",
        type: "POST",
        data: {
            fisher: fisher,
            weight: weight,
            specie: specie,
            resource: resource,
            state: state,
            date: date,
            _token: _token
        },
        beforeSend: function () {
            console.log('Carregando o loading ...');
            document.querySelector('#spinner-ajax').style.display = 'block'
        },
        success: function (response) {
            console.log(response);
            if (response) {
                document.querySelector('#spinner-ajax').style.display = 'none'
                document.querySelector('#success-msg-ajax').style.display = 'block'
                document.querySelector('#success-msg-ajax').innerHTML = 'Captura atribuída com sucesso'
                setTimeout(() => {
                    document.querySelector('#success-msg-ajax').style.display = 'none'
                    $("#ajaxForm")[0].reset();
                }, 3000);
            }
        },
        error: function (response) {
            console.log(response);
            if (response) {
                document.querySelector('#spinner-ajax').style.display = 'none'
                document.querySelector('#error-msg-ajax').style.display = 'block'
                document.querySelector('#error-msg-ajax').innerHTML = 'Erro ao atribuir captura, verique os dados introduzidos'
                setTimeout(() => {
                    document.querySelector('#error-msg-ajax').style.display = 'none'
                }, 3000);
            }
        }
    });
});

var btnModalAlteraPhoto = document.querySelector('.modal-alteracao-fotografia')
var modalPhoto = document.querySelector('#fisher-new-photo')
var closeModalPhoto = document.querySelector('#fisher-new-photo .close-modal')
btnModalAlteraPhoto.addEventListener('click', (e) => {
    modalPhoto.style.display = 'flex'
})
closeModalPhoto.addEventListener('click', (e) => {
    modalPhoto.style.display = 'none'
})


var btnModalAlteraSenha = document.querySelector('.modal-alteracao-senha')
var modal = document.querySelector('#user-new-password')
var closeModal = document.querySelector('#user-new-password .close-modal')
btnModalAlteraSenha.addEventListener('click', (e) => {
    modal.style.display = 'flex'
})
closeModal.addEventListener('click', (e) => {
    modal.style.display = 'none'
})
