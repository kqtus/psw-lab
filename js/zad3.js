function changeBgColor(bgId) {   
    document.getElementById(bgId).style.color = document.getElementById("bg-color-selector").rgba;
}

function getMainDiv() {
    var main_div = document.getElementsByClassName("content_main_section_full")[0];
    return main_div;
}
function changeBgColor(color) {
    getMainDiv().style.background = color;
}

function changeFgColor(color) {
    getMainDiv().style.color = color;
}

function changeFont(font) {
    getMainDiv().style.fontFamily = font;
    console.log(getMainDiv().style.fontFamily);
}

function onBgColorSelChanged() {
    var bg_select = document.getElementById("bg_select");
    console.log("bg sel changed to " + bg_select.value);
    changeBgColor(bg_select.value);
}

function onFgColorSelChanged() {
    var fg_select = document.getElementById("fg_select");
    console.log("fg sel changed to " + fg_select.value);
    changeFgColor(fg_select.value);
}

function onFontSelChanged() {
    var font_select = document.getElementById("font_select");
    console.log("font sel changed to " + font_select.value);
    changeFont(font_select.value);
}