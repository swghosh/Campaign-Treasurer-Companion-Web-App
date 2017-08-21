var ids = ['addnews', 'addstock', 'removestock', 'updateprice', 'reversetransaction', 'grantfunds', 'deductfunds'];

var flags = {};
var items = {};
var spans = {};
var expandables = {};

for(var index = 0; index < ids.length; index++) {
    var id = ids[index];

    flags[id] = false;

    items[id] = document.querySelector('tr.news#' + id);
    items[id].style.display = 'none';

    spans[id] = document.querySelector('td.name span.arrow#' + id);

    expandables[id] = document.querySelector('tr.stock#' + id);
    expandables[id].onclick = function() {
        var id = this.id;
        if(flags[id] == false) {
            spans[id].style.transform = 'rotateX(180deg)';
            items[id].style.display = 'table-row';
            expandables[id].style.color = '#09f';
            flags[id] = true;
        }
        else {
            spans[id].style.transform = 'rotateX(0deg)';
            items[id].style.display = 'none';
            expandables[id].style.color = null;
            flags[id] = false;
        }
    };
}