// This function is called when a tab is clicked and is responsible for displaying the corresponding content.
// It takes two parameters:
//   - evt: The event object representing the click event.
//   - cityName: The identifier of the tab content to be displayed.

function indexMenu(evt, cityName) {
  // Declare variables for tab content, tab links, and loop variable.
  var i, tabcontent, tablinks;

  // Get all elements with the class "tabcontent" (represents the content of each tab).
  tabcontent = document.getElementsByClassName("tabcontent");

  // Hide all tab content by setting their display property to "none".
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with the class "tablinks" (represents the tabs themselves).
  tablinks = document.getElementsByClassName("tablinks");

  // Remove the "active" class from all tab links.
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Display the tab content corresponding to the clicked tab.
  document.getElementById(cityName).style.display = "block";

  // Add the "active" class to the clicked tab to visually indicate it's active.
  evt.currentTarget.className += " active";
}

// Get the element with the id="defaultOpen" and simulate a click on it.
// This ensures that the content of the default-open tab is displayed initially.
document.getElementById("defaultOpen").click();
