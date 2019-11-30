<?php
  require_once("header.php");
?>
    <form action="fake" method="POST">
        <div class="editCV" id="editCV">
            <div class="editCV-content">
                <div class="editCV-title-container">
                    <textarea rows="1" cols="20" class="editCV-title" name="cv-title">
                        Untitled
                    </textarea>
                </div>

                <div class="editCV-personal">
                    <p class="editCV-tag-title">Personal Details</p>
                    <div class="editCV-per">
                        <div class="editCV-per-col1">
                            <div class="editCV-input">
                                <p>Job title</p>
                                <input type="text" name="job-title" />
                            </div>
                            <div class="editCV-input">
                                <p>Full Name</p>
                                <input type="text" name="fullname" />
                            </div>
                            <div class="editCV-input">
                                <p>Email</p>
                                <input type="email" name="email" />
                            </div>
                        </div>
                        <div class="editCV-per-col2">
                            <div class="editCV-img">
                                <img id="output" src="app/images/avatar.png" />
                                <input type="text" onchange="loadFile(event)" style="width: 244px;
                                       height: 45px;     
                                       border: none;
                                       background: #EBEDF0;
                                       margin-top: 31px;
                                       color: black;
                                       padding: 5px" placeholder="Image URL" name="image-url" />
                            </div>
                            <div class="editCV-input">
                                <p>Address</p>
                                <input type="text" name="address" />
                            </div>
                            <div class="editCV-input">
                                <p>Phone</p>
                                <input type="text" name="phone-num" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="editCV-profess">
                    <p class="editCV-tag-title">Profile</p>
                    <div>
                        <textarea name="content" id="editor">
                        &lt;p&gt;Enter your Professional Summary here.&lt;/p&gt;
                    </textarea>
                        <!-- <p><input type="submit" value="Submit" name="submit-btn" /></p> -->
                    </div>
                </div>

                <div class="editCV-profess editCV-job">
                    <p class="editCV-tag-title">Working Experience</p>
                    <p class="editCV-sub-info">
                        Include your last 10 years of relevant experience and dates in this section. List your most recent position first.
                    </p>
                </div>
                <p class="editCV-add" onclick="addJob()">
                    + Add Working Experience
                </p>

                <div class="editCV-profess editCV-addEdu">
                    <p class="editCV-tag-title">Education</p>
                    <p class="editCV-sub-info">
                        If relevant, include your most recent educational achievements and the dates here
                    </p>
                </div>
                <p class="editCV-add" onclick="addEdu()">+ Add Education</p>

                <div class="editCV-profess">
                    <p class="editCV-tag-title">Skills</p>
                    <p class="editCV-sub-info">
                        If relevant, include your most useful skills to your job here
                    </p>
                    <div>
                        <textarea name="content4" id="editor4">
                      &lt;p&gt;Enter your skills here.&lt;/p&gt;
                  </textarea>
                        <!-- <p><input type="submit" value="Submit" name="submit-btn" /></p> -->
                    </div>
                </div>

                <div class="editCV-btn">
                    <a href="previewCV">
                        <button type="submit" name="edit-btn">
                            Preview and Download
                        <img
                            src="https://img.icons8.com/office/30/000000/document.png"
                        />
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </form>


    <script type="text/javascript">
        //initial run
        var job = 1;
        var edu = 1;
        addEdu();
        addJob();

        $(".editCV-btn").click(function(e) {
            console.log($(".editCV-personal").find("input"));
            e.preventDefault();
        })

        var loadFile = function(event) {
            var output = document.getElementById(
                "output"
            );
            // output.src = URL.createObjectURL(event.target.files[0]);
            console.log(event.target.value);
            output.src = event.target.value;
        };


        ClassicEditor.create(
            document.querySelector("#editor"), {
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

        function addJob() {
            let idName = "job" + job.toString();
            let jobTitle = "profess-title" + job.toString();
            let comName = "profess-company" + job.toString();
            let startDate = "profess-startDate" + job.toString();
            let endDate = "profess-endDate" + job.toString();

            let dateTag = [
                createLabelTag("Start date:"),
                createInputTag("date", "Start date", "", startDate),
                createLabelTag("End date:"),
                createInputTag("date", "Start date", "", endDate)
            ]

            let wrapperEdit = document.createElement("div");
            $(wrapperEdit).addClass("pro" + idName);
            $(wrapperEdit).append(
                createEditTagCV(createInputTag("text", "Job title", "margin-top: 15px", jobTitle)),
                createEditTagCV(createInputTag("text", "Company name", "", comName)),
                createEditTagCV(dateTag),
                createTextArea(idName, "Enter your Employment History here."),
                createDeleteTag("text-align:end", idName, deleteThis)
            )

            $(".editCV-job").append(wrapperEdit)

            ClassicEditor.create(
                document.querySelector("#job" + job.toString()), {
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

        function deleteThis(event, value) {
            $(".pro" + value).remove();
            event.preventDefault();
        }

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

        function addEdu() {
            let idName = "edu" + edu.toString();
            let schoolName = "school-name" + edu.toString();
            let majorName = "school-major" + edu.toString();
            let startDate = "profess-startDate" + edu.toString();
            let endDate = "profess-endDate" + edu.toString();

            let dateTags = [
                createLabelTag("Start date:"),
                createInputTag("date", "Start date", "", startDate),
                createLabelTag("End date:"),
                createInputTag("date", "Start date", "", endDate)
            ]

            let wrapperEdit = document.createElement("div");
            $(wrapperEdit).addClass("edu2" + idName)
                .append(
                    createEditTagCV(createInputTag("text", "School name", "margin-top: 15px", schoolName)),
                    createEditTagCV(createInputTag("text", "Major name", "", majorName)),
                    createEditTagCV(dateTags),
                    createTextArea(idName, "Enter your Education here."),
                    createDeleteTag("text-align:end", idName, deleteThis2)
                )
            $(".editCV-addEdu").append(wrapperEdit)

            ClassicEditor.create(
                document.querySelector("#edu" + edu.toString()), {
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

        function deleteThis2(event, value) {
            $(".edu2" + value).remove();
            event.preventDefault();
        }

        ClassicEditor.create(
            document.querySelector("#editor4"), {
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

        function createEditTagCV(buttonTag) {
            var editCVInputTag = document.createElement("div");
            $(editCVInputTag).addClass("editCV-input");
            $(editCVInputTag).append(buttonTag);
            return editCVInputTag;
        }

        function createInputTag(type, placeholder, style, id) {
            var inputTag = document.createElement("input");
            $(inputTag).attr("placeholder", placeholder || "");
            $(inputTag).attr("type", type || "text");
            $(inputTag).attr("style", style || "");
            $(inputTag).attr("name", id || "");
            return inputTag
        }

        function createLabelTag(content) {
            var label = document.createElement("label");
            $(label).append(content);
            $(label).css("margin-right", "0.5rem");
            return label;
        }

        function createTextArea(idName, placeholder) {
            var textAreaTag = document.createElement("textarea");
            $(textAreaTag).attr("id", idName);
            $(textAreaTag).attr("name", idName);
            $(textAreaTag).attr("id", idName);
            $(textAreaTag).append("&lt;p&gt;" + placeholder + "&lt;/p&gt;");

            return textAreaTag;
        }

        function createDeleteTag(wrapperStyle, idName, funcBtn) {

            var wrapper = document.createElement("div");
            $(wrapper).attr("style", wrapperStyle);

            var button = document.createElement("button");
            $(button).on("click", function(e) {
                funcBtn(e, idName)
            });

            var icon = document.createElement("i");
            $(icon).addClass("fas fa-trash-alt")
                .css("color", "#ff6f61")
                .css("margin-top", "10px");
            button.append(icon);
            wrapper.append(button);
            return wrapper;
        }
    </script>