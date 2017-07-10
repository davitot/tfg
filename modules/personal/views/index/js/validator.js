$(document).on('ready', function () {
    $('#formPersonal').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre es obligatorio'
                    },
                    stringLength: {
                        min: 4,
                        message: 'El usuario debe contener al menos 5 caracteres'
                    }
                }
            },
            usuario: {
                validators: {
                    notEmpty: {
                        message: 'El usuario es obligatorio'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'El correo es obligatorio'
                    },
                    emailAddress: {
                        message: 'El correo electronico no es valido'
                    }
                }
            },
            cargo: {
                validators: {
                    notEmpty: {
                        message: 'El cargo es obligatorio'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'El password es obligatorio'
                    },
                    stringLength: {
                        min: 4,
                        message: 'El password debe contener al menos 4 caracteres'
                    }
                }
            },
            fechaAlta: {
                validators: {
                    notEmpty: {
                        message: 'La fecha de alta es obligatoria.'
                    },
                    date: {
                        format: 'DD-MM-YYYY',
                        message: 'La fecha de alta no es valida'
                    }
                }
            }
        }
    });

}
);
