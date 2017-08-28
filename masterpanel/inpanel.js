var selectType = document.querySelector('select#type');

var pcloseInput = document.querySelector('input[name=pclose]');
var ovalueInput = document.querySelector('input[name=ovalue]');
var sectorInput = document.querySelector('input[name=sector]');

var pcloseLabel = document.querySelector('label[for=pclose]');

selectType.onchange = function() {
    pcloseInput.value = ovalueInput.value = null;

    if(this.value === 'stock') {
        pcloseInput.disabled = null;
        sectorInput.disabled = null;

        pcloseInput.style.display = null;
        sectorInput.style.display = null;

        pcloseLabel.style.display = null;
    }
    else if(this.value === 'commodity') {
        pcloseInput.disabled = 'yes';
        sectorInput.disabled = 'yes';

        pcloseInput.style.display = 'none';
        sectorInput.style.display = 'none';

        pcloseLabel.style.display = 'none';
    }
    else if(this.value === 'cryptocurrency') {
        pcloseInput.disabled = null;
        sectorInput.disabled = null;

        pcloseInput.style.display = 'none';
        sectorInput.style.display = 'none';

        pcloseLabel.style.display = 'none';
    }
};