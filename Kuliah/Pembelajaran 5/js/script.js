const keyword = document.querySelector('.keyword');
const tombolCari = document.querySelector('.tombol-cari');
const container = document.querySelector('.container');

// menghilangkan tombol cari
tombolCari.style.display = 'none';

// event pencarian
keyword.addEventListener('keyup', function() {
  // ajax fetch
  fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));
});