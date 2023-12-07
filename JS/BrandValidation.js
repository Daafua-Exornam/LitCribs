// Function to determine if a field should be validated
function shouldBeValidated(field) {
    // Check if the field should be validated based on attributes like 'readonly,' 'disabled,' 'pattern,' and 'required.'
    return (
      !(field.getAttribute("readonly") || field.readonly) &&  // Field should not be readonly.
      !(field.getAttribute("disabled") || field.disabled) &&   // Field should not be disabled.
      (field.getAttribute("pattern") || field.getAttribute("required"))  // Field should have either a 'pattern' or 'required' attribute.
    );
  }
  
  // Function to perform instant validation on a field
  function instantValidation(field) {
    // Check if the field should be validated using the 'shouldBeValidated' function.
    if (shouldBeValidated(field)) {
      // Check if the field is invalid based on 'required' and 'pattern' attributes.
      var invalid =
        (field.getAttribute("required") && !field.value) ||  // Check if a required field is empty.
        (field.getAttribute("pattern") &&
          field.value &&
          !new RegExp(field.getAttribute("pattern")).test(field.value));  // Check if the field doesn't match the specified pattern.
  
      // Update the 'aria-invalid' attribute to reflect the field's validity.
      if (!invalid && field.getAttribute("aria-invalid")) {
        field.removeAttribute("aria-invalid");  // Remove 'aria-invalid' if the field is valid.
      } else if (invalid && !field.getAttribute("aria-invalid")) {
        field.setAttribute("aria-invalid", "true");  // Set 'aria-invalid' to 'true' if the field is invalid.
      }
    }
  }
  