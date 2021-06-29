$(document).ready(function () {

    // Custom method to validate username
    $.validator.addMethod("usernameRegex", function (value, element) {
        return this.optional(element) || /^[а-яА-ЯёЁa-zA-Z]{2,25}$/.test(value);
    }, "Имя должно содержать более двух и менее 25 символов, без каких-либо специальных символов и пробелов");

    $.validator.addMethod("lastusernameRegex", function (value, element) {
        return this.optional(element) || /^[а-яА-ЯёЁa-zA-Z]{2,25}$/.test(value);
    }, "Фамилия должна содержать более двух и менее 25 символов, без каких-либо специальных символов и пробелов");

    $.validator.addMethod("passwordRegex", function (value, element) {
        return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,12}$/.test(value);
    }, 'Пароль должен содержать содержать цифры и латинские буквы в нижнем и верхнем регистре, от 8 до 12 символов');

    $.validator.addMethod("phoneRegex", function (value, element) {
        return this.optional(element) || /^(\d[- ]?){7,10}$/.test(value);
    }, "Номер должен быть от 7 до 10 символов,без специальных символов");


    $(function () {
        var form = $("#myform")
        form.validate({
            onfocusout: function (element) {
                this.element(element);
                $(element).valid()
            },
            onkeyup: function (element) {
                $(element).valid()
                $('[name="' + element.name + '"]').val(element.value);

            },

            rules: {
                firstname: {
                    required: true,
                    usernameRegex: true,
                    minlength: 2,
                    maxlength: 25,
                },
                lastname: {
                    required: true,
                    lastusernameRegex: true,
                    minlength: 2,
                    maxlength: 25,
                },
                email: {
                    required: true,
                    minlength: 6,
                    maxlength: 255,
                    email: true,

                },
                phone_number: {
                    phoneRegex: true,
                    required: true,
                }
            },
            messages: {
                firstname: {
                    required: "Поле имени является обязательным для заполнения",
                    minlength: "Имя должно быть не менее 2 символов",
                    maxlength: "Имя может быть максимум 25 символов",
                },

                lastname: {
                    required: "Поле фамилии является обязательным для заполнения",
                    minlength: "Фамилия должна быть не менее 2 символов",
                    maxlength: "Фамилия может быть не более 25 символов",
                },
                email: {
                    required: "Поле электронной почты является обязательным для заполнения",
                    email: "Электронный адрес должен быть действительным адресом",
                },
                phone_number: {
                    required: "Поле телефонного номера является обязательным для заполнения",
                }

            },
            submitHandler: function (form, event) {
                event.preventDefault();
                $('.preloader').show();
                form.submit();
            }
        });
    });

    $(function () {
        var form = $("#myform2")
        form.validate({
            onfocusout: function (element) {
                this.element(element);
            },
            onkeyup: function (element) {
                $(element).valid();
                $('[name="' + element.name + '"]').val(element.value);

            },
            rules: {
                firstname: {
                    required: true,
                    usernameRegex: true,
                    minlength: 2,
                    maxlength: 25,
                },
                lastname: {
                    required: true,
                    lastusernameRegex: true,
                    minlength: 2,
                    maxlength: 25,
                },
                email: {
                    required: true,
                    minlength: 6,
                    maxlength: 255,
                    email: true,

                },
                phone_number: {
                    phoneRegex: true,
                    required: true,
                }
            },
            messages: {
                firstname: {
                    required: "Поле имени является обязательным для заполнения",
                    minlength: "Имя должно быть не менее 2 символов",
                    maxlength: "Имя может быть максимум 25 символов",
                },

                lastname: {
                    required: "Поле фамилии является обязательным для заполнения",
                    minlength: "Фамилия должна быть не менее 2 символов",
                    maxlength: "Фамилия может быть не более 25 символов",
                },
                email: {
                    required: "Поле электронной почты является обязательным для заполнения",
                    email: "Электронный адрес должен быть действительным адресом",
                },
                phone_number: {
                    required: "Поле телефонного номера является обязательным для заполнения",
                }

            },
            submitHandler: function (form, event) {
                $('.preloader').show();
                form.submit();
            }
        });
    });

});
