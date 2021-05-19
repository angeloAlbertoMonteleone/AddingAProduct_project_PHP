document.addEventListener('DOMContentLoaded', function() {

  // - option selects
  const select1 = document.getElementById('item1');
  const select2 = document.getElementById('item2');
  const select3 = document.getElementById('item3');

  // - option forms
  const form1 = document.querySelector(".option_1");
  const form2 = document.querySelector(".option_2");
  const form3 = document.querySelector(".option_3");

  // - inputs
  const option_1_input = document.getElementById("input_option_1");
  const option_2_input = document.getElementById("input_option_2");
  const option_3_input = document.querySelector('.option_3').getElementsByTagName(
    'input');

  // - navbar buttons
  const addProductBtn = document.querySelector('.btn.btn-outline-success');
  const cancelBtn = document.querySelector('.btn.btn-outline-danger');

  // - form
  const form = document.getElementById('form_addingProduct');


  // onclick on the first measure option
  select1.addEventListener('click', function() {
    if (form3.style.display === "block" || form2.style.display ===
      "block") {
      form3.style.display = "none";
      form2.style.display = "none";
    }
    option_2_input.value = "";
    option_3_input.height.value = "";
    option_3_input.width.value = "";
    option_3_input.lenght.value = "";

    form1.style.display = "block";
  });


  // onclick on the second measure option
  select2.addEventListener('click', function() {
    if (form3.style.display === "block" || form1.style.display ===
      "block") {
      form3.style.display = "none";
      form1.style.display = "none";
    }

    option_1_input.value = "";
    option_3_input.height.value = "";
    option_3_input.width.value = "";
    option_3_input.lenght.value = "";

    form2.style.display = "block";
  });


  // onclick on the third measure option
  select3.addEventListener('click', function() {
    if (form1.style.display === "block" || form2.style.display ===
      "block") {
      form1.style.display = "none";
      form2.style.display = "none";
    }

    option_1_input.value = "";
    option_2_input.value = "";

    form3.style.display = "block";
  });


  // button Handlers
  addProductBtn.addEventListener('submit', function(e) {
    e.preventDefault();
    return false;
  });

  cancelBtn.addEventListener('click', function(e) {
    e.preventDefault();
    document.location.href = './product-list-page.php';
  });

  cancelBtn.addEventListener('submit', function(e) {
    e.preventDefault();
  });



});
