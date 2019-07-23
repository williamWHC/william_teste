function validCpf(cpf) {
    cpf = cpf.replace('.','');
    cpf = cpf.replace('.','');
    cpf = cpf.replace('-','');

    if (cpf.length === 11) {
        return true;
    }

    return false;
}

function validOfAge(date) {

    if (date.length <= 0) {
        alert('data da nascimento não pode ser vazia');
        return false;
    }

    date = date.replace('-','/');

    var birthDate = new Date(date);
    var todayDate = new Date();

    var thisYear = 0;

    if (todayDate.getMonth() < birthDate.getMonth()) {
        thisYear = 1;
    } else if ((todayDate.getMonth() === birthDate.getMonth()) && todayDate.getDate() < birthDate.getDate()) {
        thisYear = 1;
    }

    var age = todayDate.getFullYear() - birthDate.getFullYear() - thisYear;

    if(age < 18) {
        return false;
    }

    return true;
}