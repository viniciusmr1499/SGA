$(document).ready(function() {
    $('.select2').select2();
});

$("[name=quantidade]").mask("000000000000");
$("[name=matricula]").mask("00000000");
$("[name=codigo]").mask("00000");

$("[name=nomeCompleto]").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
    translation: {
      'A': {
        pattern: /[ a-z-A-Z]/, optional: true
      }
    }
});

$("[name=setor]").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
  translation: {
    'A': {
      pattern: /[ a-z-A-Z]/, optional: true
    }
  }
});

$("[name=colaborador]").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
  translation: {
    'A': {
      pattern: /[ a-z-A-Z]/, optional: true
    }
  }
});

$("[name=equipamento]").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
  translation: {
    'A': {
      pattern: /[ a-z-A-Z]/, optional: true
    }
  }
});

$("[name=referencia]").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
  translation: {
    'A': {
      pattern: /[ a-z-A-Z]/, optional: true
    }
  }
});

$("[name=endereco]").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
  translation: {
    'A': {
      pattern: /[ a-z-A-Z-0-9]/, optional: true
    }
  }
});


$("[name=utilizacao]").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
  translation: {
    'A': {
      pattern: /[a-z-A-Z-0-9]/, optional: true
    }
  }
});

$("[name=cargo]").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
  translation: {
    'A': {
      pattern: /[ a-z-A-Z]/, optional: true
    }
  }
});

  
$("[name=email]").mask('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', {
  translation: {
    'A': {
      pattern: /[+@._a-z-0-9]/, optional: true
    }
  }
});

