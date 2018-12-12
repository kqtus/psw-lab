var feedback_form = document.getElementById("feedback_form");

feedback_form.addEventListener('submit', function() {
    alert('You are about to submit form.');
}, true);

feedback_form.addEventListener('reset', function() {
    confirm('You are about to reset form.');
}, true);
