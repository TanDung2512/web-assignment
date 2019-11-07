<?php
    if (isset($_POST['submit-btn']))
    {
      $editor_data = $_POST["content"];
    echo $editor_data;}
?>

<?php
  require_once("header.php");
?>
<div class="editCV" id="editCV">
  <div class="editCV-content">
    <div class="editCV-title-container">
      <textarea rows="1" cols="20" class="editCV-title">
        Untitled
      </textarea>
    </div>

    <div class="editCV-personal">
      <p class="editCV-tag-title">Personal Details</p>
      <div class="editCV-per">
        <div class="editCV-per-col1">
          <div class="editCV-input">
            <p>Job title</p>
            <input type="text" />
          </div>
          <div class="editCV-input">
            <p>First Name</p>
            <input type="text" />
          </div>
          <div class="editCV-input">
            <p>Email</p>
            <input type="email" />
          </div>
        </div>
        <div class="editCV-per-col2">
          <div class="editCV-img">
            <img id="output" src="app/images/avatar.png" />
            <input type="file" accept="image/*" onchange="loadFile(event)" />
            <script>
              var loadFile = function(event) {
                var output = document.getElementById("output");
                output.src = URL.createObjectURL(event.target.files[0]);
              };
            </script>
          </div>
          <div class="editCV-input">
            <p>Last Name</p>
            <input type="text" />
          </div>
          <div class="editCV-input">
            <p>Phone</p>
            <input type="text" />
          </div>
        </div>
      </div>
    </div>

    <div class="editCV-profess">
      <p class="editCV-tag-title">Professional Sumary</p>
      <div>
        <form action="editCV" method="post">
          <textarea name="content" id="editor">
            &lt;p&gt;Enter your Professional Sumary here.&lt;/p&gt;
        </textarea
          >
          <!-- <p><input type="submit" value="Submit" name="submit-btn" /></p> -->
        </form>
        <script>
          ClassicEditor.create(document.querySelector("#editor")).catch(
            error => {
              console.error(error);
            }
          );
        </script>
      </div>
    </div>

    <div class="editCV-profess">
      <p class="editCV-tag-title">Employment History</p>
      <p class="editCV-sub-info">
        Include your last 10 years of relevant experience and dates in this
        section. List your most recent position first.
      </p>
      <div>
        <form action="editCV" method="post">
          <textarea name="content2" id="editor2">
              &lt;p&gt;Enter your Employment History here.&lt;/p&gt;
          </textarea>
          <!-- <p><input type="submit" value="Submit" name="submit-btn" /></p> -->
        </form>
        <script>
          ClassicEditor.create(document.querySelector("#editor2")).catch(
            error => {
              console.error(error);
            }
          );
        </script>
      </div>
    </div>

    <div class="editCV-profess">
      <p class="editCV-tag-title">Education</p>
      <p class="editCV-sub-info">
        If relevant, include your most recent educational achievements and the
        dates here
      </p>
      <div>
        <form action="editCV" method="post">
          <textarea name="content3" id="editor3">
                &lt;p&gt;Enter your Education here.&lt;/p&gt;
            </textarea
          >
          <!-- <p><input type="submit" value="Submit" name="submit-btn" /></p> -->
        </form>
        <script>
          ClassicEditor.create(document.querySelector("#editor3")).catch(
            error => {
              console.error(error);
            }
          );
        </script>
      </div>
    </div>

    <div class="editCV-profess">
      <p class="editCV-tag-title">Websites & Social Links</p>
      <p class="editCV-sub-info">
        You can add links to websites you want hiring managers to see! Perhaps
        It will be a link to your portfolio, LinkedIn profile, or personal
        website
      </p>
      <div>
        <form action="editCV" method="post">
          <textarea name="content4" id="editor4">
                  &lt;p&gt;Enter your Websites & Social Links here.&lt;/p&gt;
              </textarea
          >
          <!-- <p><input type="submit" value="Submit" name="submit-btn" /></p> -->
        </form>
        <script>
          ClassicEditor.create(document.querySelector("#editor4")).catch(
            error => {
              console.error(error);
            }
          );
        </script>
      </div>
    </div>

    <div class="editCV-btn">
      <button type="button">
        Preview and Download
        <img src="https://img.icons8.com/office/30/000000/document.png" />
      </button>
    </div>
  </div>
</div>
