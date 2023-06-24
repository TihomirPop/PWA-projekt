document.getElementById('form').onsubmit = function(e) {
    var nemojPoslat = false;

    var naslov = document.getElementById('naslov');
    var naslovError = document.getElementById('naslovError');
    if(naslov.value.length < 5 || naslov.value.length > 30){
        naslov.style.border = '2px dashed red';
        naslovError.innerHTML = 'naslov vijesti mora imati 5 do 30 znakova <br>';
        nemojPoslat = true;
    }
    else{
        naslov.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        naslovError.innerHTML = '';
    }

    var sazetak = document.getElementById('sazetak');
    var sazetakError = document.getElementById('sazetakError');
    if(sazetak.value.length < 10 || sazetak.value.length > 100){
        sazetak.style.border = '2px dashed red';
        sazetakError.innerHTML = 'kratki sadržaj vijesti mora imati 10 do 100 znakova <br>';
        nemojPoslat = true;
    }
    else{
        sazetak.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        sazetakError.innerHTML = '';
    }

    var tekst = document.getElementById('tekst');
    var tekstError = document.getElementById('tekstError');
    if(tekst.value.length == 0){
        tekst.style.border = '2px dashed red';
        tekstError.innerHTML = 'sadržaj vijesti ne smije biti prazan <br>';
        nemojPoslat = true;
    }
    else{
        tekst.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        tekstError.innerHTML = '';
    }

    var kategorija = document.getElementById('kategorija');
    var kategorijaError = document.getElementById('kategorijaError');
    if(kategorija.selectedIndex == 0){
        kategorija.style.border = '2px dashed red';
        kategorijaError.innerHTML = 'kategorija mora biti odabrana <br>';
        nemojPoslat = true;
    }
    else{
        kategorija.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        kategorijaError.innerHTML = '';
    }

    var slika = document.getElementById('slika');
    var slikaError = document.getElementById('slikaError');
    if(slika.value.length == 0){
        slika.style.border = '2px dashed red';
        slikaError.innerHTML = 'slika mora biti odabrana <br>';
        nemojPoslat = true;
    }
    else{
        slika.style.border = 'var(--bs-border-width) solid var(--bs-border-color)';
        slikaError.innerHTML = '';
    }


    if(nemojPoslat)
        e.preventDefault();
}
