// This function checks if a field should be validated based on its attributes.
function shouldBeValidated(field) {
    return (
      // Check if the field is not set as readonly or disabled, and has a pattern or is required.
      !(field.getAttribute("readonly") || field.readonly) &&
      !(field.getAttribute("disabled") || field.disabled) &&
      (field.getAttribute("pattern") || field.getAttribute("required"))
    );
  }
  
  // This function performs instant validation on a field.
  function instantValidation(field) {
    if (shouldBeValidated(field)) {
      // Check if the field is required and empty, or if it has a pattern and does not match the pattern.
      var invalid =
        (field.getAttribute("required") && !field.value) ||
        (field.getAttribute("pattern") &&
          field.value &&
          !new RegExp(field.getAttribute("pattern")).test(field.value));
  
      // Add or remove the 'aria-invalid' attribute based on the validation result.
      if (!invalid && field.getAttribute("aria-invalid")) {
        field.removeAttribute("aria-invalid"); // Field is valid, remove 'aria-invalid'.
      } else if (invalid && !field.getAttribute("aria-invalid")) {
        field.setAttribute("aria-invalid", "true"); // Field is invalid, set 'aria-invalid'.
      }
    }
  }
  