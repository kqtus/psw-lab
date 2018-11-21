
function createDiv() {
    var mainDiv = document.createElement("div");
    var node = document.createTextNode("Hey that's div!");
    mainDiv.appendChild(node);

    var body = document.getElementById("divs");
    body.appendChild(mainDiv);
}