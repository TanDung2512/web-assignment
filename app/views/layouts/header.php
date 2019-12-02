<header class="cv-header">
  <div class="page-wrapper d-flex ali-center">
    <a href="#" class="d-b">
      <img src="app/images/logo.jpg" alt="logo" class="logo-big" />
    </a>

    <nav class="category-menu d-flex ali-center">
      <ul class="d-flex mr-5 pr-1">
        <li>
          <a href="searchCV" class="txt--sub-heading">search CV</a>
        </li>
        <li>
          <a href="myCV" class="txt--sub-heading">My CV</a>
        </li>
        <li>
          <a href="#" class="txt--sub-heading">Guides</a>
        </li>
        <li>
          <a href="#" class="txt--sub-heading">FAQ</a>
        </li>
      </ul>
      <div class="toolkit">
        <!-- <button class="btn-secondary txt--sub-heading mr-2">Sign up</button>
        <button class="btn txt--sub-heading">Log in</button> -->
        <span>
          <?php 
          if (isset($_SESSION["user_mail"])) {
            echo strtok($_SESSION["user_mail"],"@");
          } else {
            echo "lmao";
          }
          ?>
        </span>
        <a id="logout" class="btn txt--sub-heading">Log out</a>
      </div>
    </nav>
  </div>

</header>
  <div class = "loading-wrapper" id = "loading">
    <div class="sk-chase">
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
    </div>
    </div>
<script>
$(document).ready(function(){
  $("#logout").on("click" ,function(e){
    $.ajax({
        url:"/web-assignment/logout-authen",
        type: "POST",
        crossDomain: true,
        data: {},
        success: function(result){
          document.location.href = '/web-assignment';
        }
    });
    e.preventDefault();
  });
});
</script>