<section class = "preCV__container">
    <nav class = "preCV__header">
        <div class = "nav-back">
            <span>Back to editor</span>
        </div>
        <a>
            <div id="download_btn" class = "btn btn--orange">
                Download PDF
            </div>
        </a>
    </nav>
    <main>
        <div class = "template-cv__list">
            <div class  = "template-cv__item">
                <!-- <div class ="check-image"></div> -->
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
             <?php 
                include_once(__DIR__."/template.php");
            ?> 
        </section>
    </main>
</section>

<script>

$('#download_btn').click(function() {
    html2canvas(document.getElementById("template-cv"), {
        onrendered: function(canvas) {
            var doc = new jsPDF('p', 'mm', 'a4');
            var w = doc.internal.pageSize.width;
            var h = doc.internal.pageSize.height;

            var img = canvas.toDataURL(canvas, '#ffffff', {
                type: 'image/jpeg',
                encoderOptions: 1.0
            });
            doc.addImage(img, 'JPEG', 0, 0, w, h);
            doc.save('sample-file.pdf');
        }
    });
});

</script>