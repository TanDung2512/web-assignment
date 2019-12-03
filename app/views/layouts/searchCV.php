<?php
  require_once("header.php");
?>
<div class="myCV" id="myCV">
    <div class="myCV-body">
        <div class="myCV-content">
            <div class="myCV-navbar" style="justify-content: flex-end;">
                <div>
                    <input
                        id = "search-input"
                        type="text"
                        placeholder="Search . . ."
                        required
                    />
                </div>
            </div>
            <div class="searchCV-displayCV">
            <?php 
                if (count($_REQUEST["cv-list"]) == 0){
                    echo "<p>There is no CV yet</p>";
                }
                foreach($_REQUEST["cv-list"] as $cv): 
            ?>
                    <div>
                        <img src="app/images/resum-1.png" />
                        <div class="searchCV-display-info">
                            <p class="searchCV-info-title"><?php echo $cv->fullname."_".$cv->CV_ID ?></p>
                            <p class="searchCV-info-date" style="margin-bottom:5px;" >Created at <?php echo $cv->date_created ?></p>
                            <p class="searchCV-info-date">Posted by: <span><?php echo $cv->fullname ?></span></p>
                            <div>
                                <p>
                                    <?php echo '<a href="previewCV?CV_ID=' . $cv->CV_ID . '"' ?>
                                        ><i class="fas fa-eye myCV-icon"></i>View</a
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>    
            </div>

            <div>
                <i class="fas fa-chevron-left" style="color: #ff6f61;"></i> 1/2
                <i class="fas fa-chevron-right myCV-icon"></i>
            </div>
        </div>
    </div>
</div>

<script>
    $("#loading").css("display", "none");
    $("#search-input").on("keypress",function(e){
        if(e.which == 13) {
            console.log($(this))
            window.location.href = "/web-assignment/searchCV?key_word="+$(this).val();
        };
    })

</script>