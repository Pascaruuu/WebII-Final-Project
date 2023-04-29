let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}



// Contact form

$(document).ready(function() {
  $('#contact-form').submit(function(e) {
    e.preventDefault(); // prevent the form from submitting normally
    
    var form_data = $(this).serialize(); // serialize the form data
    
    $.ajax({
      type: 'POST',
      url: 'http://localhost:8000/process.php', // replace with the URL of your processing script
      data: form_data
    })
    .done(function(response) {
      alert(response); // show success message
      $('#contact-form')[0].reset(); // reset the form
    })
    .fail(function() {
      alert('Error sending message. Please try again later.'); // show error message
    });
  });
});
