// JavaScript to handle form validation and submission

document.getElementById('applicationForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission for validation
  
    let formValid = true;
  
    // Check if all required fields are filled
    const requiredFields = document.querySelectorAll('input[required], select[required]');
    requiredFields.forEach(function (field) {
      if (!field.value) {
        field.classList.add('is-invalid');
        formValid = false;
      } else {
        field.classList.remove('is-invalid');
      }
    });
  
    // If form is valid, you can proceed with submission
    if (formValid) {
      alert('Form successfully submitted!');
      // For example, you can redirect or send the form data via AJAX
      this.submit(); // Uncomment this line for actual submission
    }
  });
  
  // Optional: Add custom feedback to invalid fields
  document.querySelectorAll('input[required], select[required]').forEach(function (input) {
    input.addEventListener('input', function () {
      if (this.value) {
        this.classList.remove('is-invalid');
      } else {
        this.classList.add('is-invalid');
      }
    });
  });
  