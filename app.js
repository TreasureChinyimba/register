document.getElementById("registrationForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    var fullName = document.getElementById("fullName").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
  
    document.getElementById("fullNameDisplay").textContent = "Full Name: " + fullName;
    document.getElementById("emailDisplay").textContent = "Email: " + email;
    document.getElementById("messageDisplay").textContent = "Message: " + message;
  
    document.getElementById("registrationForm").style.display = "none";
    document.getElementById("submittedData").style.display = "block";
  });
  
  document.getElementById("editButton").addEventListener("click", function() {
    document.getElementById("registrationForm").style.display = "block";
    document.getElementById("submittedData").style.display = "none";
  });
  