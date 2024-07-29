function sendToWhatsapp() {
    const number = "+923400166731";

    const firstName = document.getElementById('fname').value;
    const lastName = document.getElementById('lname').value;
    const date = document.getElementById('date').value;
    const email = document.getElementById('email').value;
    const countryCode = document.getElementById('country-code').value;
    const whatsappNumber = document.getElementById('whatsapp').value;
    const service = document.getElementById('treatment').value;
    const notes = document.getElementById('note').value;

    const message = encodeURIComponent(
        `🌹Fresh Rose Booking Form🌹\n\n🌿New booking alert:\n\n` +
        `👤 First Name: ${firstName} ${lastName}\n` +
        `📅 Date of visit: ${date}\n` +
        `📧 Email: ${email}\n` +
        `🌍 Country Code: ${countryCode}\n` +
        `📞 WhatsApp Number: ${whatsappNumber}\n` +
        `💇‍♀️ Service Required: ${service}\n` +
        `📝 Notes: ${notes}`
    );

    const url = `https://wa.me/${number}?text=${message}`;

    window.open(url, '_blank').focus();
}
