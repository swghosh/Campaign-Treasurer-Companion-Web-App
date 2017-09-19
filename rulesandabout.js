// flag to control toggle of about, rules section
var aboutFlag = false;
var rulesFlag = false;

// about, rules section whose visibility is to be toggled
var aboutItem = document.querySelector('tr.news#about');
var rulesItem = document.querySelector('tr.news#rules');

// about, rules item set display to none
aboutItem.style.display = 'none';
rulesItem.style.display = 'none';

// about, rules arrow span which will show toggle status of about, rules section
var aboutArrowSpan = document.querySelector('td.name span.arrow#about');
var rulesArrowSpan = document.querySelector('td.name span.arrow#rules');

// control toggle of about section
document.querySelector('tr.stock#about').onclick = function() {
    // if about section is toggled off
    if(aboutFlag == false) {
        // about arrow span transform 180 deg to show inverted arrow
        aboutArrowSpan.style.transform = 'rotateX(180deg)';
        // about item set display to on
        aboutItem.style.display = 'table-row';
        // about set text color as blue
        this.style.color = '#09f';
        // set about toggle flag
        aboutFlag = true;
    }
    // if about section is toggled on
    else {
        // about arrow span transform 0 deg to show not inverted arrow
        aboutArrowSpan.style.transform = 'rotateX(0deg)';
        // about item set display to off
        aboutItem.style.display = 'none';
        // about set text color as default
        this.style.color = null;
        // set about toggle flag
        aboutFlag = false;
    }
};

// control toggle of about section
document.querySelector('tr.stock#rules').onclick = function() {
    // if rules section is toggled off
    if(rulesFlag == false) {
        // rules arrow span transform 180 deg to show inverted arrow
        rulesArrowSpan.style.transform = 'rotateX(180deg)';
        // rules item set display to on
        rulesItem.style.display = 'table-row';
        // rules set text color as blue
        this.style.color = '#09f';
        // set rules toggle flag
        rulesFlag = true;
    }
    // if rules section is toggled on
    else {
        // rules arrow span transform 0 deg to show not inverted arrow
        rulesArrowSpan.style.transform = 'rotateX(0deg)';
        // rules item set display to off
        rulesItem.style.display = 'none';
        // rules set text color as default
        this.style.color = null;
        // set rules toggle flag
        rulesFlag = false;
    }
};