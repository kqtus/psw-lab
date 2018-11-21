document.onkeydown = keydown;


function addScaledDiv(width, height, color, borderRadius, text) {
    var parent_div = document.getElementById("scaled_divs");

    var square = document.createElement("button");
    square.textContent = text;
    square.style.width = width.toString() + "px";
    square.style.height = height.toString() + "px";
    square.style.background = color;
    square.style.borderRadius = borderRadius.toString() + "px";
    parent_div.appendChild(square); 
    console.log(square);   
}


function createScaledDiv(screenX, screenY, scale, text) {
    var color = "#000000";
    var cornerRadius = 0;

    console.log({ screenX, screenY });

    if (screenX <= 200)
        color = "#b6d0f9";
    else if (screenX <= 400)
        color = "#86b2f9";
    else if (screenX <= 600)
        color = "#5f98f4";
    else 
        color = "#4286f4";
    
    if (screenY <= 200)
        cornerRadius = 0;
    else if (screenY <= 400)
        cornerRadius = 2;
    else if (screenY <= 600)
        cornerRadius = 4;
    else 
        cornerRadius = 8;

    addScaledDiv(80 * scale, 40 * scale, color, cornerRadius, text);
}

function keydown(e) {
    if (!e)
        e = event;
    
    console.log('key_event');

    if (e.keyCode == 77) {
        var scale = 1;
        if (e.altKey) scale = 2;
        if (e.ctrlKey) scale = 3;
        if (e.shiftKey) scale = 4;

        console.log('Adding div while mouse at ' + event.clientX + " " + event.clientY);
        createScaledDiv(window.screenX, window.screenY, scale, "btn");
    }

    // mousemove, mouseover, mouseout
}