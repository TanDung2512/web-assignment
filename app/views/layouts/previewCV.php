<section class = "preCV__container">
    <nav class = "preCV__header">
        <div class = "nav-back">
            <span>Back to editor</span>
        </div>
        <a>
            <div class = "btn btn--orange">
                Download PDF
            </div>
        </a>
    </nav>
    <main>
        <div class = "template-cv__list">
            <div class  = "template-cv__item">
                <img src = "./app/assets/images/cv.jpg"/>
            </div>
            <div class  = "template-cv__item">
                <img src = "./app/assets/images/cv.jpg"/>
            </div>
            <div class  = "template-cv__item">
                <img src = "./app/assets/images/cv.jpg"/>
            </div>
            <div class  = "template-cv__item">
                <img src = "./app/assets/images/cv.jpg"/>
            </div>
            <div class  = "template-cv__item">
                <img src = "./app/assets/images/cv.jpg"/>
            </div>
            <div class  = "template-cv__item">
                <img src = "./app/assets/images/cv.jpg"/>
            </div>
            
        </div>
        
        <section class = "template-cv__review">
        </section>
    </main>
</section>

<script>
    $.ajax({
        type: "GET",
        url: "/web-assignment/cv?CV_ID="+CV_ID,
        crossDomain: true,
        success: function(result){
            let result_parse = JSON.parse(result);  
            let template_cv_parse = JSON.parse(result_parse.template_cv);  
            $(".template-cv__review").append(template_cv_parse.template_html);  
            genCV(result_parse.cv);
        }
    })

    function genCV(data) {
        console.log(data);
        console.log(data["experiences"])
        $(".personal").toArray().forEach(function(element) {
            let key = $(element).data("cvType");
            if (!key) return;
            if (key === "avatar") {
                $(element).attr("src", data[key])
            } 
            if(key === "about_me"){
                $(element).html(data[key]);
            }else {
                $(element).text(data[key]);
            }
        });
        
        let listOfExTag = data["experiences"].map(function(element) {
            console.log(element)
            return createSectionCVTag(element, "cv-experience");
        })

        let listOfEduTag = data["education"] && data["education"].map(function(element) {
            return createSectionCVTag(element, "cv-education");
        })
        $("#section-education .cv-education-list").append(listOfEduTag || "");
        $("#section-working-experience .cv-experience-list").append(listOfExTag || "");
    }

    function createSectionCVTag(data, prefixClass) {

        let titleTag = document.createElement("h3");
        $(titleTag).addClass(prefixClass + "-item__title")
            .append(data.title || "");

        let subTitleTag = document.createElement("h4");
        $(subTitleTag).addClass(prefixClass + "-item__subtitle")
            .append(data.start_date + " - " + data.end_date || "");

        let descriptionTag = document.createElement("div");
        $(descriptionTag).addClass(prefixClass + "-item__description")
            .append($.parseHTML(data.description) || "");

        let sectionCV = document.createElement("li");
        $(sectionCV).addClass(prefixClass + "-list")
            .append(titleTag, subTitleTag, descriptionTag);

        return sectionCV;
    }
</script>
