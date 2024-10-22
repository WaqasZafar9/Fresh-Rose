<?php
include ('session_start.php');
if (!isset($_SESSION['id'])) {
  header("Location: login.html");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Fresh Rose</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700" />
  <link rel="stylesheet" href="fonts/icomoon/style.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/jquery-ui.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/owl.theme.default.min.css" />
  <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css" />
  <link rel="stylesheet" href="css/aos.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" />
  <script type="text/javascript" src="whatsappbutton/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="whatsappbutton/floating-wpp.css">
    <script type="text/javascript" src="whatsappbutton/floating-wpp.min.js"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif
        }
    </style>
</head>

<body>
  <div class="site-wrap">
    <!-- Site Mobile Menu -->
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <!-- Header -->
    <header class="site-navbar py-1" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-6 col-xl-2" data-aos="fade-down">
            <h1 class="mb-0">
              <a href="index.html" class="text-black h2 mb-0">Fresh <span style="color: red">Rose</span></a>
            </h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="about.html">About</a></li>
                <li class="active"><a href="booking.html">Book Online</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="#" class="pl-0 pr-3 text-black"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3 text-black"><span class="icon-instagram"></span></a>
                </li>
                <li class="ml-3">
                  <a href="logut.php" class="btn btn-primary text-white">Logout</a>
                </li>
              </ul>
            </div>
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px">
              <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Slider -->
    <div class="slide-one-item home-slider owl-carousel">
      <div class="site-blocks-cover inner-page-cover" style="background-image: url(images/bg2.jpg)" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h2 class="text-white font-weight-light mb-2 display-1">
                Online <span style="color: green">Booking</span>
              </h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Booking Form -->
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-7 mb-5">
            <form method="post"
              class="p-5 bg-white" name="Bookings">
              <h2 class="mb-4 site-section-heading">Book Now</h2>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">First Name</label>
                  <input type="text" id="fname" name="First Name" class="form-control" placeholder="First Name"
                    required />
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Last Name</label>
                  <input type="text" id="lname" name="Last Name" class="form-control" placeholder="Last Name"
                    required />
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="date">Date</label>
                  <input type="text" id="date" name="Date" class="form-control datepicker px-2"
                    placeholder="Date of visit" required />
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" id="email" name="Email" class="form-control" placeholder="Email" required />
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-4 mb-3 mb-md-0">
                  <label class="text-black" for="country-code">Country Code</label>
                  <select name="Country Code" id="country-code" class="form-control">
                    <option value="92">+92</option>
                    <option value="1">+1</option>
                    <option value="44">+44</option>
                    <!-- Add more country codes as needed -->
                  </select>
                </div>
                <div class="col-md-8 mb-3 mb-md-0">
                  <label class="text-black" for="whatsapp">WhatsApp Number</label>
                  <input type="text" id="whatsapp" name="Number" class="form-control" placeholder="WhatsApp Number"
                    required />
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="treatment">Service You Want</label>
                  <select name="Service" id="treatment" class="form-control" required>
                    <option value="Styling">Styling</option>
                    <option value="Makeup">Makeup</option>
                    <option value="Hydra facial">Hydra facial</option>
                    <option value="Facial">Facial</option>
                    <option value="Wax full body">Wax full body</option>
                    <option value="Mani pedi">Mani pedi</option>
                    <option value="Hair treatment">Hair treatment</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="note">Notes</label>
                  <textarea name="note" id="note" cols="30" rows="5" class="form-control"
                    placeholder="Write your notes or questions here..." required></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send" name="submit" class="btn btn-primary py-2 px-4 text-white" />
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5">
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">
                Street 16 near Muhammadi park, Wahdat Colony, Gujranwala
              </p>
              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+92 323 7490876</a></p>
              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">info@example.com</a></p>
              <div style="height: 300px; width: 100%" class="mb-4">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3377.8349551527276!2d74.20054847563716!3d32.15475227392988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzLCsDA5JzE3LjEiTiA3NMKwMTInMTEuMiJF!5e0!3m2!1sen!2s!4v1721645743285!5m2!1sen!2s"
                  width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
          <div id="myButton"></div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About Fresh Rose</h3>
              <p>
                A fresh rose embodies the essence of natural beauty and
                elegance. Its vibrant petals and captivating fragrance
                symbolize love, passion, and grace. Fresh roses can brighten
                any space, adding a touch of charm and sophistication.
              </p>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Quick Menu</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="index.html">Home</a></li>
                  <li><a href="about.html">Course</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                  <li><a href="booking.html">Booking</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="mb-5">
              <h3 class="footer-heading mb-2">
                Feel Free to ask any question
              </h3>
              <form action="contact.html" method="get">
                <div class="input-group mb-3">
                  <button class="btn btn-primary text-white" type="submit" id="button-addon2">
                    Get a quote now >>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="mb-5">
              <a href="https://www.facebook.com" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="https://www.twitter.com" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="https://www.instagram.com/freshrosesalon?utm_source=qr&igsh=MWc3ZHJkdmh2b2Zraw=="
                class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="https://www.linkedin.com" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
  <script src="//code.jquery.com/jquery-latest.min.js"></script>
  <script type="text/javascript" src="whatsappbutton/floating-wpp.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="text/javascript">
    $(function () {
        $('#myButton').floatingWhatsApp({
            phone: '+923215953600',
            popupMessage: 'Hello, do you want to book an appointment?',
            message: "I'd like to Book an appointment",
            showPopup: true,
            showOnIE: false,
            headerTitle: 'Welcome!',
            headerColor: 'green',
            backgroundColor: 'green',
            buttonImage: '<img src="whatsappbutton/whatsapp.svg" />'
        });
    });
</script>
  <script>
    const scriptURL =
      "https://script.google.com/macros/s/AKfycbz2dnBehzFkOmFzZYu5spEVS2ONU98c8H4ny1g3K2fPzCYhlS0WpRQY2MRPz6Iq3z6vqw/exec";
    const form = document.forms["Bookings"];

    form.addEventListener("submit", (e) => {
      e.preventDefault();

      const firstName = document.getElementById("fname").value;
      const lastName = document.getElementById("lname").value;
      const date = document.getElementById("date").value;
      const email = document.getElementById("email").value;
      const countryCode = document.getElementById("country-code").value;
      const whatsappNumber = document.getElementById("whatsapp").value;
      const service = document.getElementById("treatment").value;
      const notes = document.getElementById("note").value;

      // Send data to Google Sheets
      fetch(scriptURL, { method: "POST", body: new FormData(form) })
        .then((response) => {
          form.reset();
          Swal.fire({
            title: "Success!",
            text: "We got your details, Now you will be redirect to Whatsapp, Please Wait",
            icon: "success",
            showConfirmButton: false,
            timer: 1000,
            willClose: () => {
              sendToWhatsapp(
                firstName,
                lastName,
                date,
                email,
                countryCode,
                whatsappNumber,
                service,
                notes
              );
            },
          });
        })
        .catch((error) => console.error("Error!", error.message));
    });

    function sendToWhatsapp(
      firstName,
      lastName,
      date,
      email,
      countryCode,
      whatsappNumber,
      service,
      notes
    ) {
      const number = "+923215953600";

      const message = `🌹 *𝐅͟𝐫͟𝐞͟𝐬͟𝐡͟ ͟𝐑͟𝐨͟𝐬͟𝐞͟ ͟𝐁͟𝐨͟𝐨͟𝐤͟𝐢͟𝐧͟𝐠͟ ͟𝐅͟𝐨͟𝐫͟𝐦͟* 🌹\n\n🌿 *𝙉𝙚𝙬 𝙗𝙤𝙤𝙠𝙞𝙣𝙜 𝙖𝙡𝙚𝙧𝙩:*\n\n` +
        `👤 > *First Name:* ${firstName} ${lastName}\n\n` +
        `📅 > *Date of visit:* ${date}\n\n` +
        `📧 > *Email:* ${email}\n\n` +
        `🌍 > *Country Code:* +${countryCode}\n` +
        `📞 > *WhatsApp Number:* ${whatsappNumber}\n\n` +
        `💇‍♀️ > *Service Required:* ${service}\n\n` +
        `📝 > *Notes:* ${notes}`;

      const url = `https://wa.me/${number}?text=${encodeURIComponent(message).replace(/%0A/g, "%0D%0A")}`;

      window.location.href = url;
    }

  </script>
</body>

</html>