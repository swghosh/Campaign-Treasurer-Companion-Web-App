// select input node
var selectType = document.querySelector('select#type');

// inputs that can be switched from enable to display
var pcloseInput = document.querySelector('input[name=pclose]');
var ovalueInput = document.querySelector('input[name=ovalue]');
var sectorInput = document.querySelector('input[name=sector]');

// label of pclose 
var pcloseLabel = document.querySelector('label[for=pclose]');

// when select changes its value
selectType.onchange = function() {
    pcloseInput.value = ovalueInput.value = null;

    // if stock is selected set all to enabled and all display to on
    if(this.value === 'stock') {
        pcloseInput.disabled = null;
        sectorInput.disabled = null;

        pcloseInput.style.display = null;
        sectorInput.style.display = null;

        pcloseLabel.style.display = null;
    }
    // if commodity is selected set pclose, sector to disabled and all display to off
    else if(this.value === 'commodity') {
        pcloseInput.disabled = 'yes';
        sectorInput.disabled = 'yes';

        pcloseInput.style.display = 'none';
        sectorInput.style.display = 'none';

        pcloseLabel.style.display = 'none';
    }
    // if cryptocurrency is selected set pclose, sector to disabled and all display to off
    else if(this.value === 'cryptocurrency') {
        pcloseInput.disabled = 'yes';
        sectorInput.disabled = 'yes';

        pcloseInput.style.display = 'none';
        sectorInput.style.display = 'none';

        pcloseLabel.style.display = 'none';
    }
};