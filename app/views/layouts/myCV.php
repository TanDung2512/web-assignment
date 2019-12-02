<?php
  require_once("header.php");
?>
<div class="myCV" id="myCV">
  <div class="myCV-body">
    <div class="myCV-content">
      <p class="myCV-title">Dashboard</p>

      <div class="myCV-navbar">
        <div class="myCV-nav">
          <!-- <span class="myCV-nav-resume">Resume</span> -->
          <!-- <span class="myCV-nav-CV">Cover Letter</span> -->
        </div>
        <a href="browseCV"><button class="myCV-createNew">+ Create New</button></a>
        
      </div>

      <div class="myCV-displayCV">
      
      
      <?php 
      GLOBAL $cvs;
      foreach($cvs as $cv) { ?>
        <div>
          <img src="app/images/resum-1.png" />
          <div class="myCV-display-info">
            <p class="myCV-info-title">
            <?php echo $cv->fullname."_".$cv->CV_ID; ?>
            </p>
            <p class="myCV-info-date">
              Created at <?php echo $cv->date_created; ?>
            </p>
            <div>
              <p><?php echo '<a href="editCV?CV_ID=' . $cv->CV_ID . '">' ?><i class="fas fa-pencil-alt myCV-icon" ></i>Edit</a></p>
              <p><i class="fas fa-arrow-down myCV-icon"></i>Download PDF</p>
              <p><i class="fas fa-trash-alt myCV-icon"></i>Delete</p>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
      <div>
      <i class="fas fa-chevron-left" style="color: #ff6f61;"></i> 1/2 <i class="fas fa-chevron-right myCV-icon"></i>
      </div>
    </div>
  </div>
</div>
