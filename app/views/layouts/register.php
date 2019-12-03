
<div class="container" id="signup-container">
    <a href="/web-assignment/" class="d-b">
      <img src="app/assets/images/logo-02.png" alt="logo" class="logo-big" />
    </a>
    <div class="login-wrapper">
        <h2 class="txt--big-heading">Sign up</h2>
        <p class="">Fast and very easy</p>
        <form  class="form-control">
            <input type="email" name="email" id="email" placeholder="Email" />
            <div class="invalid-wrapper">
                <p class="invalid hidden">
                    The email address you supplied is invalid.
                </p>
            </div>
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Password"
            />
            <div class="invalid-wrapper">
                <p class="invalid hidden">Your password is too simple.</p>
            </div>
            <input
                type="password"
                name="password2"
                id="password2"
                placeholder="Confirm Password"
            />
            <div class="invalid-wrapper">
                <p class="invalid hidden">Your password is not match.</p>
            </div>
            <div class="form-bottom mt-5">
                <a href="login"> Already have an account? <b> Sign in</b></a>
                <a id="signup" class="btn pl-2">Sign up</a>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function(){
  $("#loading").css("display", "none");
  $("#signup").on("click" ,function(e){
    $("#loading").css("display", "block");
    $.ajax({
        url:"/web-assignment/register-authen",
        type: "POST",
        crossDomain: true,
        data: {
            mail: $("#email").val(),
            password: $("#password").val(),
            password2: $("#password2").val(),
        },
        success: function(result){
            if (result == 1) {
                document.location.href = '/web-assignment/landing';
            } else {
                window.reload();
            }
        }
    });
    e.preventDefault();
  });
});
</script>