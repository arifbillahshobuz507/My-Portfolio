document.addEventListener("DOMContentLoaded", function() {
    var editorElements = document.querySelectorAll('.editor');
    editorElements.forEach(function(element) {
        ClassicEditor
            .create(element)
            .catch(error => {
                console.error(error);
            });
    });
});