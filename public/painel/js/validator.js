jQuery.extend(jQuery.validator.messages, {
    required: "Este campo &eacute; requerido.",
    remote: "Por favor, corrija este campo.",
    email: "Por favor, forne&ccedil;a um endere&ccedil;o eletr&ocirc;nico v&aacute;lido.",
    url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
    date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
    dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
    number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.",
    digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
    creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito &atilde;o.",
    equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
    accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
    maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
    minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
    rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
    range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
    max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
    min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}."),
    extension: jQuery.validator.format("Por favor, forne&ccedil;a uma extens&atilde;o v&aacute;lida. ")
});

$(document).ready(function () {
    if ($('#form').length > 0) {


        /* Alfanumérico incluíndo rastag (#) */
        jQuery.validator.addMethod("alphanumeric", function (value, element) {
            return this.optional(element) || /^[\w.]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras, números e underscores (#).");

        /* Apenas Letra */
        jQuery.validator.addMethod("alphabetic", function (value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras.");

        /* Apenas Letra e acentuação  */
        jQuery.validator.addMethod("alphabetic", function (value, element) {
            return this.optional(element) || /^(?i)^(?:(?![×Þß÷þø])[-'0-9a-zÀ-ÿ])+$/i.test(value);
        }, "Por favor, forne&ccedil;a um valor válido");

        /* Adicionar posição das letras  no bI/NI */
        jQuery.validator.addMethod("posicaoletraBINIF", function (value, element) {
            return this.optional(element) || /^.{2}[CFE]+$/i.test(value);
        }, "Por favor, forne&ccedil;a um valor válido");

        /* */
        jQuery.validator.addMethod("letternumber", function (value, element) {
            return this.optional(element) || /^[A-Za-z0-9]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras e números.");

        /* Acentuação e cedilhas sem número */
        jQuery.validator.addMethod("acentuacaoCedilhaSemNumero", function (value, element) {
            return this.optional(element) || /^[a-z0-9áàâãéèêíïóôõöúçñ ]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras.");

        /* Acentuação e cedilhas sem número */
        jQuery.validator.addMethod("fieldDistrito", function (value, element) {
            return this.optional(element) || /^[a-z0-9áàâãéèêíïóôõöúçñ ]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras.");





        jQuery.validator.addMethod("BINIFValidation", function (value, element) {
            return this.optional(element) || /^[A-Za-z0-9]+$/i.test(value);
        }, "Por favor, forne&ccedil;a um valor válido");


        jQuery.validator.addMethod("withoutsignal", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
        }, "Por favor,sem sinais especiais.");

        $('#form').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                bi: {
                    BINIFValidation: true,
                    maxlength: 14,
                    minlength: 14
                },
                phone: {
                    required: true,
                    minlength: 18
                },
                province: {
                    required: true
                },
                municipe: {
                    required: true
                },
                resource: {
                    required: true
                },
                specie: {
                    required: true
                },
                weight: {
                    required: true
                },
                year: {
                    required: true
                },
                fisherType: {
                    required: true
                },
                email: {
                    email: true
                },
                password: {
                    minlength: 6,
                    letternumber: true
                },
                role: {
                    required: true,
                }
            }
        });
    }
});


$(document).ready(function () {
    if ($('#demo-form2').length > 0) {


        /* Alfanumérico incluíndo rastag (#) */
        jQuery.validator.addMethod("alphanumeric", function (value, element) {
            return this.optional(element) || /^[\w.]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras, números e underscores (#).");

        /* Apenas Letra */
        jQuery.validator.addMethod("alphabetic", function (value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras.");

        /* Apenas Letra e acentuação  */
        jQuery.validator.addMethod("alphabetic", function (value, element) {
            return this.optional(element) || /^(?i)^(?:(?![×Þß÷þø])[-'0-9a-zÀ-ÿ])+$/i.test(value);
        }, "Por favor, forne&ccedil;a um valor válido");

        /* Adicionar posição das letras  no bI/NI */
        jQuery.validator.addMethod("posicaoletraBINIF", function (value, element) {
            return this.optional(element) || /^.{2}[CFE]+$/i.test(value);
        }, "Por favor, forne&ccedil;a um valor válido");

        /* */
        jQuery.validator.addMethod("letternumber", function (value, element) {
            return this.optional(element) || /^[A-Za-z0-9]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras e números.");

        /* Acentuação e cedilhas sem número */
        jQuery.validator.addMethod("acentuacaoCedilhaSemNumero", function (value, element) {
            return this.optional(element) || /^[a-z0-9áàâãéèêíïóôõöúçñ ]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras.");

        /* Acentuação e cedilhas sem número */
        jQuery.validator.addMethod("fieldDistrito", function (value, element) {
            return this.optional(element) || /^[a-z0-9áàâãéèêíïóôõöúçñ ]+$/i.test(value);
        }, "Por favor, forne&ccedil;a apenas letras.");





        jQuery.validator.addMethod("BINIFValidation", function (value, element) {
            return this.optional(element) || /^[A-Za-z0-9]+$/i.test(value);
        }, "Por favor, forne&ccedil;a um valor válido");


        jQuery.validator.addMethod("withoutsignal", function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
        }, "Por favor,sem sinais especiais.");

        $('#demo-form2').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                bi: {
                    BINIFValidation: true,
                    maxlength: 14,
                    minlength: 14
                },
                phone: {
                    required: true,
                    minlength: 18
                },
                province: {
                    required: true
                },
                municipe: {
                    required: true
                },
                resource: {
                    required: true
                },
                specie: {
                    required: true
                },
                weight: {
                    required: true
                },
                year: {
                    required: true
                },
                fisherType: {
                    required: true
                },
                email: {
                    email: true,
                    required: true
                },
                password: {
                    minlength: 6,
                    letternumber: true
                },
                roles: {
                    required: true,
                }
            }
        });
    }
});


$(document).ready(function () {
    if ($('#login-validator').length > 0) {
        $('#login-validator').validate({
            rules: {
                email: {
                    email: true,
                    required: true
                },
                password: {
                    minlength: 3,
                    letternumber: true
                },
            }
        });
    }
});
