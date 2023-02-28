function previewImage() {
    const image = document.querySelector('#image');
    const image_preview = document.querySelector('#image-prev');

    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);

    ofReader.onload = function (oFREvent) {
        image_preview.src = oFREvent.target.result;
    }
}

function previewImageStyle(img_prev, img) {
    const image = document.querySelector('#' + img);
    const image_preview = document.querySelector('#' + img_prev);

    const ofReader = new FileReader();
    ofReader.readAsDataURL(image.files[0]);

    ofReader.onload = function (oFREvent) {
        image_preview.style.backgroundImage = 'url(' + oFREvent.target.result + ')';
    }
}