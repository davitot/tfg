$(document).on('ready', function () {
  $('#formLogin').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      usuario: {
        validators: {
          notEmpty: {
            message: 'El nombre de usuario es obligatorio'
          }
        }
      },
      pass: {
        validators: {
          notEmpty: {
            message: 'La contraseña es requerida'
          }
        }
      }
    }
  });
}
);
