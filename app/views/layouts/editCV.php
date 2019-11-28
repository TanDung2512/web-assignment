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
      </textarea
            >
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
                        <p>Full Name</p>
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
                        <input
                            type="text"
                            onchange="loadFile(event)"
                            style="width: 244px;
                                   height: 45px;     
                                   border: none;
                                   background: #EBEDF0;
                                   margin-top: 31px;
                                   color: black;
                                   padding: 5px"
                            placeholder="Image URL"
                        />
                        <script>
                            var loadFile = function(event) {
                                var output = document.getElementById("output");
                                // output.src = URL.createObjectURL(event.target.files[0]);
                                console.log(event.target.value);
                                output.src = event.target.value;
                            };
                        </script>
                    </div>
                    <div class="editCV-input">
                        <p>Address</p>
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
            <p class="editCV-tag-title">Profile</p>
            <div>
                <form action="editCV" method="post">
                    <textarea name="content" id="editor">
            &lt;p&gt;Enter your Professional Summary here.&lt;/p&gt;
        </textarea
                    >
                    <!-- <p><input type="submit" value="Submit" name="submit-btn" /></p> -->
                </form>
                <script>
                    ClassicEditor.create(document.querySelector("#editor"), {
                        removePlugins: [
                            "Link",
                            "ImageUpload",
                            "Table",
                            "MediaEmbed"
                        ]
                    }).catch(error => {
                        console.error(error);
                    });
                    // ClassicEditor.builtinPlugins.map(plugin =>
                    //     console.log(plugin.pluginName)
                    // );
                </script>
            </div>
        </div>

        <div class="editCV-profess editCV-job">
            <p class="editCV-tag-title">Working Experience</p>
            <p class="editCV-sub-info">
                Include your last 10 years of relevant experience and dates in
                this section. List your most recent position first.
            </p>
            <div>
                <div class="editCV-input">
                    <input type="text" placeholder="Job title" />
                </div>
                <div class="editCV-input">
                    <input
                        type="text"
                        placeholder="Company's name, Date (from - to)"
                    />
                </div>
                <div>
                    <form action="editCV" method="post">
                        <textarea name="content2" id="editor2">
                                    &lt;p&gt;Enter your Employment History here.&lt;/p&gt;
                                </textarea
                        >
                    </form>
                </div>
            </div>
            <script>
                ClassicEditor.create(document.querySelector("#editor2"), {
                    removePlugins: [
                        "Link",
                        "ImageUpload",
                        "Table",
                        "MediaEmbed"
                    ]
                }).catch(error => {
                    console.error(error);
                });
            </script>

            <script>
                var job = 1;
                function addJob() {
                    let idName = "job" + job.toString();
                    $(".editCV-job").append(
                        "<div class=" +
                            "pro" +
                            idName +
                            '> <div class="editCV-input"> <input type="text" placeholder="Job title" style="margin-top:15px"/> </div> <div class="editCV-input"> <input type="text" placeholder="Company name, Date (from - to)" /> </div> <div> <form action="editCV" method="post"> <textarea name="content2" id=' +
                            idName +
                            "> &lt;p&gt;Enter your Employment History here.&lt;/p&gt; </textarea > </form> </div><div style='text-align:end'><button onclick=deleteThis('" +
                            idName +
                            '\')><i class="fas fa-trash-alt" style="color:#ff6f61"></i></button> </div></div>'
                    );
                    ClassicEditor.create(
                        document.querySelector("#job" + job.toString()),
                        {
                            removePlugins: [
                                "Link",
                                "ImageUpload",
                                "Table",
                                "MediaEmbed"
                            ]
                        }
                    ).catch(error => {
                        console.error(error);
                    });
                    job += 1;
                }
                function deleteThis(event) {
                    $(".pro" + event).remove();
                }
            </script>
        </div>
        <p class="editCV-add" onclick="addJob()">
            + Add Working Experience
        </p>

        <div class="editCV-profess editCV-addEdu">
            <p class="editCV-tag-title">Education</p>
            <p class="editCV-sub-info">
                If relevant, include your most recent educational achievements
                and the dates here
            </p>
            <div>
                <div class="editCV-input">
                    <input type="text" placeholder="School's name" />
                </div>
                <div class="editCV-input">
                    <input type="text" placeholder="Major" />
                </div>
                <div>
                    <form action="editCV" method="post">
                        <textarea name="content3" id="editor3">
                                    &lt;p&gt;Enter your Education here.&lt;/p&gt;
                                </textarea
                        >
                    </form>
                </div>
            </div>
            <script>
                ClassicEditor.create(document.querySelector("#editor3"), {
                    removePlugins: [
                        "Link",
                        "ImageUpload",
                        "Table",
                        "MediaEmbed"
                    ]
                }).catch(error => {
                    console.error(error);
                });
            </script>

            <script>
                var edu = 1;
                function addEdu() {
                    let idName = "edu" + edu.toString();
                    $(".editCV-addEdu").append(
                        "<div class=" +
                            "edu2" +
                            idName +
                            '> <div class="editCV-input"> <input type="text" placeholder="School name" style="margin-top:15px"/> </div> <div class="editCV-input"> <input type="text" placeholder="Major" /> </div> <div> <form action="editCV" method="post"> <textarea name="content2" id=' +
                            idName +
                            "> &lt;p&gt;Enter your Education here.&lt;/p&gt; </textarea > </form> </div><div style='text-align:end'><button onclick=deleteThis2('" +
                            idName +
                            '\')><i class="fas fa-trash-alt" style="color:#ff6f61"></i></button> </div></div>'
                    );
                    ClassicEditor.create(
                        document.querySelector("#edu" + edu.toString()),
                        {
                            removePlugins: [
                                "Link",
                                "ImageUpload",
                                "Table",
                                "MediaEmbed"
                            ]
                        }
                    ).catch(error => {
                        console.error(error);
                    });
                    edu += 1;
                }
                function deleteThis2(event) {
                    $(".edu2" + event).remove();
                }
            </script>
        </div>
        <p class="editCV-add" onclick="addEdu()">+ Add Education</p>

        <div class="editCV-profess">
            <p class="editCV-tag-title">Skills</p>
            <p class="editCV-sub-info">
                If relevant, include your most useful skills to your job here
            </p>
            <div>
                <form action="editCV" method="post">
                    <textarea name="content4" id="editor4">
                  &lt;p&gt;Enter your skills here.&lt;/p&gt;
              </textarea
                    >
                    <!-- <p><input type="submit" value="Submit" name="submit-btn" /></p> -->
                </form>
                <script>
                    ClassicEditor.create(document.querySelector("#editor4"), {
                        removePlugins: [
                            "Link",
                            "ImageUpload",
                            "Table",
                            "MediaEmbed"
                        ]
                    }).catch(error => {
                        console.error(error);
                    });
                </script>
            </div>
        </div>

        <div class="editCV-btn">
            <a href="previewCV">
                <button type="button">
                    Preview and Download
                    <img
                        src="https://img.icons8.com/office/30/000000/document.png"
                    />
                </button>
            </a>
        </div>
    </div>
</div>
