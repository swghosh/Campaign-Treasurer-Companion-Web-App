var selectType = document.querySelector('select#type');

var pcloseInput = document.querySelector('input[name=pclose]');
var lcircuitInput = document.querySelector('input[name=lcircuit]');
var ucircuitInput = document.querySelector('input[name=ucircuit]');
var ovalueInput = document.querySelector('input[name=ovalue]');
var sectorInput = document.querySelector('input[name=sector]');

var pcloseLabel = document.querySelector('label[for=pclose]');
var lcircuitLabel = document.querySelector('label[for=lcircuit]');
var ucircuitLabel = document.querySelector('label[for=ucircuit]');

selectType.onchange = function() {
    pcloseInput.value = lcircuitInput.value = ucircuitInput.value = ovalueInput.value = null;

    if(this.value === 'stock') {
        pcloseInput.disabled = null;
        lcircuitInput.disabled = null;
        ucircuitInput.disabled = null;
        sectorInput.disabled = null;

        pcloseInput.style.display = null;
        lcircuitInput.style.display = null;
        ucircuitInput.style.display = null;
        sectorInput.style.display = null;

        pcloseLabel.style.display = null;
        lcircuitLabel.style.display = null;
        ucircuitLabel.style.display = null;
    }
    else if(this.value === 'commodity') {
        pcloseInput.disabled = 'yes';
        lcircuitInput.disabled = null;
        ucircuitInput.disabled = null;
        sectorInput.disabled = 'yes';

        pcloseInput.style.display = 'none';
        lcircuitInput.style.display = null;
        ucircuitInput.style.display = null;
        sectorInput.style.display = 'none';

        pcloseLabel.style.display = 'none';
        lcircuitLabel.style.display = null;
        ucircuitLabel.style.display = null;
    }
    else if(this.value === 'cryptocurrency') {
        pcloseInput.disabled = null;
        lcircuitInput.disabled = null;
        ucircuitInput.disabled = null;
        sectorInput.disabled = null;

        pcloseInput.style.display = 'none';
        lcircuitInput.style.display = 'none';
        ucircuitInput.style.display = 'none';
        sectorInput.style.display = 'none';

        pcloseLabel.style.display = 'none';
        lcircuitLabel.style.display = 'none';
        ucircuitLabel.style.display = 'none';
    }
};