const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

tombolCari.style.display = 'none';


function previewImage(){
  const foto = document.querySelector('.foto')
  const imgPreview = document.querySelector('.img-preview')

  const oFreader = new FileReader();

  oFreader.readAsDataURL(foto.files[0])

  oFreader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
}

//event ketika menuliskan keyword
keyword.addEventListener('keyup', function(){
  //ajax
  //xmlhttprequest
  // const xhr = new XMLHttpRequest();

  // xhr.onreadystatechange = function(){
  //   if(xhr.readyState == 4 && xhr.status == 200) {
  //     // console.log(xhr.responseText)
  //     container.innerHTML = xhr.responseText
  //   }
  // }

  // xhr.open('get','ajax/ajax_cari.php?keyword=' + keyword.value);
  // xhr.send();

  //fetch
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));

})
