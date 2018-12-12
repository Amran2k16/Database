// CodeSort = document.getElementById('CodeSort');
// TitleSort = document.getElementById('TitleSort');

// document.getElementById('CodeSort').addEventListener('click', displayDate);

// function displayDate() {
//   console.log('Hello');
// }

function catalogueFunction(elmnt, code) {
  window.location.href = 'moduleCatalogue.php?sortBy=' + code;
}

function moduleFunction(elmnt, code) {
  window.location.href = 'module.php?sortBy=' + code;
}
