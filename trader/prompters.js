// id(s) of sections that are to be toggled
var ids = ['buy', 'sell', 'purchased', 'orderbook'];

// boolean flags, node item sections, node spans, and expandable switch nodes that are to be toggled
var flags = {};
var items = {};
var spans = {};
var expandables = {};

// run a loop to allow toggling of each section
for(var index = 0; index < ids.length; index++) {
    // id of current iteration
    var id = ids[index];

    // set flag toggle of current id to off
    flags[id] = false;

    // item of current id which is to set to display off
    items[id] = document.querySelector('tr.news#' + id);
    items[id].style.display = 'none';

    // span of current id
    spans[id] = document.querySelector('td.name span.arrow#' + id);

    // expandable section of current id
    expandables[id] = document.querySelector('tr.stock#' + id);
    // on clicking of expandable section of current id
    expandables[id].onclick = function() {
        // current id is set to that of current node
        var id = this.id;
        // if flag of current id is toggled off
        if(flags[id] == false) {
            // set style of span current id to transform 180 deg to show inverted arrow
            spans[id].style.transform = 'rotateX(180deg)';
            // set section item display to on
            items[id].style.display = 'block';
            // set text color to blue
            expandables[id].style.color = '#09f';
            // toggle flag to on
            flags[id] = true;
        }
        // if flag of current id is toggled on
        else {
            // set style of span current id to transform 0 deg to show non inverted arrow
            spans[id].style.transform = 'rotateX(0deg)';
            // set section item display to off
            items[id].style.display = 'none';
            // set text color to default
            expandables[id].style.color = null;
            // toggle flag to off
            flags[id] = false;
        }
    };
}