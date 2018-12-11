
var div_cnt = 0;
var mainDiv = document.createElement("div");
var body = document.getElementById("divs");

body.appendChild(mainDiv);

function createDiv() {
    if (div_cnt % 3 == 0) {
        var element_node = document.createElement("div");
        var text_node = document.createTextNode("inner div no " + div_cnt.toString() + "!");
        element_node.appendChild(text_node);
        element_node.id = "inner_div";
        mainDiv.appendChild(element_node);
    }
    else if (div_cnt % 3 == 1) {
        var node = document.createTextNode("outter div no " + div_cnt.toString() + "!");
        node.id = "outer_id";
        var inner_node = document.getElementById("inner_div");
        console.log(inner_node);
        mainDiv.removeChild(inner_node);
        mainDiv.appendChild(node);
    }
    else if (div_cnt % 3 == 2) {
        var node = document.createElement("div");
        node.innerText = "new node";
        node.id = "new_id" + div_cnt.toString();
        mainDiv.insertBefore(node, document.getElementById("outer_id"));
    }
    div_cnt++;
}