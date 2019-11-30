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
        <div>
          <img src="app/images/resum-1.png" />
          <div class="myCV-display-info">
            <p class="myCV-info-title">Untitled</p>
            <p class="myCV-info-date">Updated November, 01:05</p>
            <div>
              <p><a href="editCV"><i class="fas fa-pencil-alt myCV-icon" ></i>Edit</a></p>
              <p><i class="fas fa-arrow-down myCV-icon"></i>Download PDF</p>
              <p><i class="fas fa-trash-alt myCV-icon"></i>Delete</p>
            </div>
          </div>
        </div>
        <div>
          <img src="app/images/resum-1.png" />
          <div class="myCV-display-info">
            <p class="myCV-info-title">Untitled</p>
            <p class="myCV-info-date">Updated November, 01:05</p>
            <div>
              <p><i class="fas fa-pencil-alt myCV-icon"></i>Edit</p>
              <p><i class="fas fa-arrow-down myCV-icon"></i>Download PDF</p>
              <p><i class="fas fa-trash-alt myCV-icon"></i>Delete</p>
            </div>
          </div>
        </div>
      </div>

      <div>
      <i class="fas fa-chevron-left" style="color: #ff6f61;"></i> 1/2 <i class="fas fa-chevron-right myCV-icon"></i>
      </div>
    </div>
  </div>
</div>
