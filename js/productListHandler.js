document.addEventListener('DOMContentLoaded', function() {

  const addProductBtn = document.querySelector('.btn.btn-outline-success');
  const massDeleteBtn = document.querySelector('.btn.btn-outline-danger');

  const form = document.getElementById('form');
  const product = document.querySelector('.product');

  addProductBtn.addEventListener('click', function(e) {
    e.preventDefault();
    document.location.href = './adding-a-product-page.php';
  });

  massDeleteBtn.addEventListener('submit', function(e) {
    e.preventDefault();
  });


});
