document.getElementById('form').onsubmit = function(e) {
    var nemojPoslat = false;

    var ime = document.getElementById('ime');
    var imeError = document.getElementById('imeError');
    if(ime.value.length == 0){
        ime.style.border = '2px dashed red';
        imeError.innerHTML = 'ime ne smije biti prazno <br>';
        nemojPoslat = true;
    }
    else{
        ime.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        imeError.innerHTML = '';
    }

    var prezime = document.getElementById('prezime');
    var prezimeError = document.getElementById('prezimeError');
    if(prezime.value.length == 0){
        prezime.style.border = '2px dashed red';
        prezimeError.innerHTML = 'prezime ne smije biti prazno <br>';
        nemojPoslat = true;
    }
    else{
        prezime.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        prezimeError.innerHTML = '';
    }

    var username = document.getElementById('username');
    var usernameError = document.getElementById('usernameError');
    if(username.value.length == 0){
        username.style.border = '2px dashed red';
        usernameError.innerHTML = 'korisničko ime ne smije biti prazno <br>';
        nemojPoslat = true;
    }
    else{
        username.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        usernameError.innerHTML = '';
    }

    var pass = document.getElementById('pass');
    var passError = document.getElementById('passError');
    if(pass.value.length == 0){
        pass.style.border = '2px dashed red';
        passError.innerHTML = 'lozinka ne smije biti prazna <br>';
        nemojPoslat = true;
    }
    else{
        pass.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        passError.innerHTML = '';
    }

    var passRep = document.getElementById('passRep');
    var passRepError = document.getElementById('passRepError');
    if(passRep.value.length == 0){
        passRep.style.border = '2px dashed red';
        passRepError.innerHTML = 'ponovi lozinku ne smije biti prazno <br>';
        nemojPoslat = true;
    }
    else if(passRep.value != pass.value){
        passRep.style.border = '2px dashed red';
        passRepError.innerHTML = 'lozinke nisu iste <br>';
        nemojPoslat = true;
    }
    else{
        passRep.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        passRepError.innerHTML = '';
    }


    if(nemojPoslat)
        e.preventDefault();
}
