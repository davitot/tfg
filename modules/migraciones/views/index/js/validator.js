$(document).on('ready', function () {
    $('#feditarTarea').bootstrapValidator({
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
            apellidos: {
                validators: {
                    notEmpty: {
                        message: 'Los apellidos son obligatorios'
                    }
                }
            },
            estadoInicial: {
                validators: {
                    notEmpty: {
                        message: 'El estado inicial es obligatorio'
                    }
                }
            },
            estadoFinal: {
                validators: {
                    notEmpty: {
                        message: 'El estado final es obligatorio'
                    }
                }
            },
            comunidad: {
                validators: {
                    notEmpty: {
                        message: 'La comunidad es obligatoria'
                    }
                }
            },
            provincia: {
                validators: {
                    notEmpty: {
                        message: 'La provincia es obligatoria'
                    }
                }
            },
            sede: {
                validators: {
                    notEmpty: {
                        message: 'La sede es obligatoria'
                    }
                }
            },
            fechaInicio: {
                validators: {
                    notEmpty: {
                        message: 'La fecha de Inicio es obligatoria.'
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
