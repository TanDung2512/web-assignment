<div class="browseCV">
  <header>
    <img class="logo" src="./app/assets/images/logo.png" alt="logo">
  </header>

  <div class="body">
    <div class="top">
      <h1>Select a Template</h1>
      <div class="progress_bar">
        <div class="circle circle--reached"></div>
        <div class="bar bar--reached"></div>
        <div class="circle circle--reached"></div>
        <div class="bar bar--reached"></div>
        <div class="circle circle--reached"></div>
      </div>
      <h3>To get started, select a resume template below.</h3>
    </div>

    <div class="bot">
      <div class="slider">
        <div>
          <div class="slide-item">
            <p>Paris</p>
            <img class="cv_template" src="https://www.my-resume-templates.com/wp-content/uploads/2019/07/67-best-cv-format.jpg">
          </div>
        </div>
        <div>
          <div class="slide-item">
            <p>London</p>
            <img class="cv_template" src="https://www.my-resume-templates.com/wp-content/uploads/2019/07/67-best-cv-format.jpg">
          </div>
        </div>
        <div>
          <div class="slide-item">
            <p>Paris</p>
            <img class="cv_template" src="https://www.my-resume-templates.com/wp-content/uploads/2019/07/67-best-cv-format.jpg">
          </div>
        </div>
        <div>
          <div class="slide-item">
            <p>New York</p>
            <img class="cv_template" src="https://www.my-resume-templates.com/wp-content/uploads/2019/07/67-best-cv-format.jpg">
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="linebreak"></div>
    <ul class="content">
      <li>Contact Us</li>
      <li>Privacy</li>
      <li>Disclaimer</li>
      <li>Terms of Service</li>
    </div>
  </footer>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
 $(document).ready(function() {
   $('.slider').slick({
     centerMode: true,
     centerPadding: '0px',
     slidesToShow: 3,
     speed: 500,
     focusOnSelect:true,
     arrows: true,
     prevArrow: '<img src="./app/assets/images/arrow-left.svg" class="slick-prev arrow arrow--prev">',
     nextArrow: '<img src="./app/assets/images/arrow-right.svg" class="slick-next arrow">',
     responsive: [{
       breakpoint: 768,
       settings: {
         arrows: true,
         centerMode: true,
         centerPadding: '0px',
         slidesToShow: 1
       }
     }, {
       breakpoint: 480,
       settings: {
         arrows: false,
         centerMode: true,
         centerPadding: '0px',
         slidesToShow: 1
       }
     }]
   });
 });
</script>