const imgBox = document.querySelector('.img-review');
const imgFile = document.querySelector('#image');

imgFile.addEventListener('change', (event) => {
    const fileList = event.target.files;
    const reader = new FileReader();
    reader.readAsDataURL(fileList[0]);

    reader.onload = (e) => {
        imgBox.src = e.target.result;
    };
});