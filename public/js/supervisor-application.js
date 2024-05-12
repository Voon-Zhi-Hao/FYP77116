$(document).ready(function() {

  function fetchUserData(supervisorName) {
    $.ajax({
      url: '/api/user-data', // Replace with your actual route for fetching user data
      type: 'GET',
      success: function(data) {
        // Handle successful response and store user data
        console.log('User Data:', data); // For debugging purposes

        // Access retrieved data and assign to variables
        var supervisor = supervisorName;
        var studentName = data.name;
        var program = data.programme; // Adjust property names based on your user model
        var phone = data.phone;
        var email = data.email;

        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        console.log('Supervisor ID:', supervisor);

        // Send AJAX request with application data using the retrieved user data
        $.ajax({
          url: '/supervisor/apply', // Replace with your actual route
          type: 'POST',
          data: {
            _token: csrfToken,
            supervisor_name: supervisor,
            student_name: studentName,
            program: program,
            phone: phone,
            email: email
          },
          success: function(response) {
            // Handle successful request (e.g., display confirmation message)
            alert('Application Sent!');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            // Handle errors (e.g., display an error message)
            alert('Error sending application: ' + errorThrown);
          }
        });
      },
      error: function(error) {
        console.error('Error fetching user data:', error);
        // Handle errors appropriately (e.g., display an error message)
      }
    });
  }

  $('.btn-primary').click(function() {
    var supervisorName = $(this).closest('.supervisor-name').find('h3').text().trim();
    fetchUserData(supervisorName); // Call the function to fetch user data
  });
});

function showTab(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
  };

  window.onload = function() {
    showTab(null, 'Software Engineering'); // Call without event object and tabName
  };