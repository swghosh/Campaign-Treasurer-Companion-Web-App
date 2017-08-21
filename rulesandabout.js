var aboutFlag = false;
var rulesFlag = false;

var aboutItem = document.querySelector('tr.news#about');
var rulesItem = document.querySelector('tr.news#rules');

aboutItem.style.display = 'none';
rulesItem.style.display = 'none';

var aboutArrowSpan = document.querySelector('td.name span.arrow#about');
var rulesArrowSpan = document.querySelector('td.name span.arrow#rules');

document.querySelector('tr.stock#about').onclick = function() {
    if(aboutFlag == false) {
        aboutArrowSpan.style.transform = 'rotateX(180deg)';
        aboutItem.style.display = 'table-row';
        this.style.color = '#09f';
        aboutFlag = true;
    }
    else {
        aboutArrowSpan.style.transform = 'rotateX(0deg)';
        aboutItem.style.display = 'none';
        this.style.color = null;
        aboutFlag = false;
    }
};

document.querySelector('tr.stock#rules').onclick = function() {
    if(rulesFlag == false) {
        rulesArrowSpan.style.transform = 'rotateX(180deg)';
        rulesItem.style.display = 'table-row';
        this.style.color = '#09f';
        rulesFlag = true;
    }
    else {
        rulesArrowSpan.style.transform = 'rotateX(0deg)';
        rulesItem.style.display = 'none';
        this.style.color = null;
        rulesFlag = false;
    }
};