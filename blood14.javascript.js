function submitForm(event) {
    event.preventDefault(); // Prevent default form submission
    
    // Form validation
    var form = document.getElementById("donationForm");
    var name = form.elements["name"].value;
    var email = form.elements["email"].value;
    var bloodGroup = form.elements["blood_group"].value;
    var contact = form.elements["contact"].value;
    var city = form.elements["city"].value;
    var lastDonationDate = form.elements["last_donation_date"].value;

    // Check if any field is empty
    if (name === "" || email === "" || bloodGroup === "" || contact === "" || city === "" || lastDonationDate === "") {
        alert("Please fill out all fields.");
        return;
    }

    // Validate email format
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.match(emailPattern)) {
        alert("Please enter a valid email address.");
        return;
    }

    // Validate contact number format
    var contactPattern = /^\d{10}$/;
    if (!contact.match(contactPattern)) {
        alert("Please enter a valid 10-digit contact number.");
        return;
    }

    // Display success message
    document.getElementById("successMessage").style.display = "block";
}
