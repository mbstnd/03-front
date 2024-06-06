document.addEventListener('DOMContentLoaded', function() {
    // Validación del formulario
    var form = document.getElementById('contactForm');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      } else {
        event.preventDefault();
        var formData = {
          name: document.getElementById('name').value,
          email: document.getElementById('email').value,
          address: document.getElementById('address').value,
          message: document.getElementById('message').value,
          terms: document.getElementById('terms').checked,
        };
        console.log('Form Data:', formData);

      }
      form.classList.add('was-validated');
    }, false);
  });
  

  