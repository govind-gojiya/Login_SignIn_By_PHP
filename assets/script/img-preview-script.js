const inputFile = document.getElementById('user--Folder');
const inputImg = document.getElementById('selected--Img');

inputFile.addEventListener("change", function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
            inputImg.setAttribute('src', this.result);
        });

        reader.readAsDataURL(file);
    }
});