<div id="browseCV">
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
        
          <div class="slide-item">
            <p>Paris</p>
            <img class="cv_template" src="https://www.my-resume-templates.com/wp-content/uploads/2019/07/67-best-cv-format.jpg">
        </div>
        
          <div class="slide-item">
            <p>London</p>
            <img class="cv_template" src="https://www.my-resume-templates.com/wp-content/uploads/2019/07/67-best-cv-format.jpg">
        </div>
        
          <div class="slide-item">
            <p>Paris</p>
            <img class="cv_template" src="https://www.my-resume-templates.com/wp-content/uploads/2019/07/67-best-cv-format.jpg">
        </div>
        
          <div class="slide-item">
            <p>New York</p>
            <img class="cv_template" src="https://www.my-resume-templates.com/wp-content/uploads/2019/07/67-best-cv-format.jpg">
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
   var leftArrow = `
   <div class = "arrow arrow--prev">
      <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 60.075 60.075">
        <defs>
            <style>
                .cls-1{fill:#ff6f61}
            </style>
        </defs>
        <path id="arrow-alt-circle-left" d="M38.038 68.075a30.038 30.038 0 1 1 30.037-30.037 30.033 30.033 0 0 1-30.037 30.037zm14.05-35.367h-14.05v-8.587a1.455 1.455 0 0 0-2.483-1.03L21.711 37.008a1.44 1.44 0 0 0 0 2.047l13.844 13.917a1.453 1.453 0 0 0 2.483-1.03v-8.575h14.05a1.458 1.458 0 0 0 1.453-1.453v-7.752a1.458 1.458 0 0 0-1.453-1.454z" class="cls-1" transform="translate(-8 -8)"/>
    </svg>
  </div>
    `
    var rightArrow = `
  <div class = "arrow arrow--next">
    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 60.075 60.075">
        <defs>
            <style>
                .cls-1{fill:#ff6f61}
            </style>
        </defs>
        <path id="arrow-alt-circle-right" d="M38.038 8A30.038 30.038 0 1 1 8 38.038 30.033 30.033 0 0 1 38.038 8zm-14.05 35.367h14.05v8.587a1.455 1.455 0 0 0 2.483 1.03l13.844-13.917a1.44 1.44 0 0 0 0-2.047L40.521 23.092a1.453 1.453 0 0 0-2.483 1.03v8.587h-14.05a1.458 1.458 0 0 0-1.453 1.453v7.752a1.458 1.458 0 0 0 1.453 1.453z" class="cls-1" transform="translate(-8 -8)"/>
    </svg>
  </div>
    `
   $('.slider').slick({
     centerMode: true,
     centerPadding: '0px',
     slidesToShow: 3,
     speed: 500,
     focusOnSelect:true,
     adaptiveHeight: true,
     arrows: true,
     prevArrow: leftArrow,
     nextArrow:  rightArrow,
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