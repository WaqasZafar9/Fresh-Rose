document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById('contactForm');
    const firstName = document.getElementById("fname");
    const lastName = document.getElementById("lname");
    const email = document.getElementById("email");
    const subject = document.getElementById("subject");
    const message = document.getElementById("message");

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        
        if (!validateForm()) {
            showModal("Error", "Please fill in all fields correctly.");
            return;
        }

        sendEmail();
    });

    function validateForm() {
        return (
            firstName.value.trim() !== "" &&
            lastName.value.trim() !== "" &&
            emailRegex.test(email.value) &&
            subject.value.trim() !== "" &&
            message.value.trim() !== ""
        );
    }

    function sendEmail() {
        const bodyMessage = `
            <h3>Contact Us Form Submission</h3>
            <p><strong>First Name:</strong> ${firstName.value}</p>
            <p><strong>Last Name:</strong> ${lastName.value}</p>
            <p><strong>Email:</strong> ${email.value}</p>
            <p><strong>Subject:</strong> ${subject.value}</p>
            <p><strong>Message:</strong> ${message.value}</p>
        `;

        Email.send({
            Host: "smtp.elasticemail.com",
            Username: "waqaszafar771@gmail.com",
            Password: "DC844C8FF04A1F892FD7A8B411469FAD5DF7",
            To: 'waqaszafar771@gmail.com',
            From: email.value,
            Subject: subject.value,
            Body: bodyMessage
        }).then(response => {
            showModal("Success", "Message sent successfully!");
        }).catch(error => {
            showModal("Error", "There was an error sending the message: " + error);
        });
    }

    function showModal(title, message) {
        document.getElementById("resultModalLabel").textContent = title;
        document.getElementById("modalMessage").innerHTML = message;
        $('#resultModal').modal('show');
    }
});
