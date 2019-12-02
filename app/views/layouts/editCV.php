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
                                <input type="text" name="professional" />
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
                                       padding: 5px" placeholder="Image URL" name="avatar" />
                            </div>
                            <div class="editCV-input">
                                <p>Address</p>
                                <input type="text" name="address" />
                            </div>
                            <div class="editCV-input">
                                <p>Phone</p>
                                <input type="text" name="phone" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="editCV-profess" id = "profile">
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
        console.log(CV_ID);

        if(CV_ID == undefined){
            addEdu();
            addJob();
        }
        else{
            $.ajax({
            type: "GET",
            url: "/web-assignment/cv?CV_ID="+CV_ID,
            crossDomain: true,
            success: function(result){
                let result_parse =  JSON.parse(result);
                console.log(result_parse.cv);
                addDataToInput(result_parse.cv);
            },
        });
        }

        function addDataToInput(data){

            $(".editCV").data("template_ID", data["template_ID"])
            $(".editCV").data("CV_ID", data["CV_ID"])

            let infos = $(".editCV-personal").find("input").toArray();
            infos.forEach(function(info){
                let type = $(info).attr("name");
                let value = $(info).val(data[type]);
            })

            $("#profile .ck-content").val(data["about_me"]);

            let experiences = data["experiences"] || [];
            experiences.forEach(function(exp){
                addJob();
                let new_ele = $(".editCV-job").find("div[class*='projob']").last();

                $(new_ele).data("ID", exp["ID"]);

                let inputArr = $(new_ele).find("input").toArray();
                inputArr.forEach(function(input){
                    let type = $(input).attr("name");
                    let value = $(input).val(exp[type]);
                })
                //console.log($(new_ele));
                $(new_ele).find("textarea").val(exp["description"])
                
            })
        }

        $(".editCV-btn").click(function(e) {
            
            let infos = $(".editCV-personal").find("input").toArray();
            let jsonData = {};

            jsonData["CV_ID"] = $(".editCV").data("CV_ID") || undefined;
            jsonData["template_ID"] = $(".editCV").data("template_ID") || undefined;

            infos.forEach(function(info){
                let type = $(info).attr("name");
                let value = $(info).val();
                jsonData[type] = value;       
            })

            jsonData["about_me"] = $("#profile .ck-content").html();
            
            let experiences = $(".editCV-job").find("*[class*='projob']").toArray();

            let experiences_arr = []

            experiences.forEach(function(ex){
                let experience = {};
                let inputArr = $(ex).find("input").toArray();

                experience["ID"] = $(ex).data("ID") || undefined;

                inputArr.forEach(function(input){
                    let type = $(input).attr("name");
                    let value = $(input).val();
                    experience[type] = value;
                })

                experience["description"] = $(`.${$(ex).attr("class")} .ck-content`).html();
                experiences_arr.push(experience);
            })

            jsonData["experiences"] = experiences_arr;

            let eductions = $(".editCV-addEdu").find("*[class*='edu2edu']").toArray();

            let eductions_arr = []

            eductions.forEach(function(ex){
                let education = {};
                let inputArr = $(ex).find("input").toArray();

                education["ID"] = $(ex).data("ID") || undefined;

                inputArr.forEach(function(input){
                    let type = $(input).attr("name");
                    let value = $(input).val();
                    education[type] = value;
                })

                education["description"] = $(`.${$(ex).attr("class")} .ck-content`).html();
                eductions_arr.push(education);
            })
            jsonData["education"] = eductions_arr;
            console.log(jsonData);

            $.ajax({
                type: "POST",
                url: "/web-assignment/editCV",
                data: jsonData,
                crossDomain: true,
                success: function(result){
                    console.log(result);
                    // if(result){
                    //     window.location.href = "/web-assignment/previewCV?CV_ID="+result;
                    // }
                    
                },
            });
            e.preventDefault();
        })

        function addJob() {
            let idName = "job" + job.toString();
            let jobTitle = "title";
            let comName = "company";
            let start_date = "start_date";
            let end_date = "end_date";

            let dateTag = [
                createLabelTag("Start date:"),
                createInputTag("date", "Start date", "", start_date),
                createLabelTag("End date:"),
                createInputTag("date", "End date", "", end_date)
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

        function addEdu() {
            let idName = "edu" + edu.toString();
            let schoolName = "title";
            let majorName = "school-major";
            let start_date = "start_date";
            let end_date = "end_date";

            let dateTags = [
                createLabelTag("Start date:"),
                createInputTag("date", "Start date", "", start_date),
                createLabelTag("End date:"),
                createInputTag("date", "Start date", "", end_date)
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