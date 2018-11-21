var hint = document.getElementById("stats_btn_hint");

document.getElementById('stats_btn').addEventListener('focus', function() {
    hint.style.visibility = "visible";
}, true);

document.getElementById('stats_btn').addEventListener('blur', function() {
    hint.style.visibility = "hidden";
}, true);
