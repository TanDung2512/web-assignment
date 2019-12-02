<section class = "preCV__container">
    <nav class = "preCV__header">
        <a>
            <div id="download_btn" class = "btn btn--orange">
                Download PDF
            </div>
        </a>
    </nav>
    <main>        
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
            doc.save('cv.pdf');
        }
    });
});

</script>