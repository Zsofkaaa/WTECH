
const baseName = "{{ $slug }}";
const imageFolder = "/Pictures/";
let currentIndex = 1;
const maxImages = 5;

function changeImage(direction) {
    let newIndex = currentIndex + direction;
    if (newIndex < 1) newIndex = maxImages;
    if (newIndex > maxImages) newIndex = 1;

    const testImg = new Image();
    testImg.src = imageFolder + baseName + newIndex + ".jpg";

    testImg.onload = function () {
        document.getElementById('activeImage').src = testImg.src;
        currentIndex = newIndex;
    };

    testImg.onerror = function () {
            // Ha nincs kép, próbáljuk a következőt
        changeImage(direction > 0 ? 1 : -1);
    };
}
