<?php
require_once("header.php");
?>
<div class="upgrade-vip">
    <form method = "POST" action = "upgrade">
        <p class="upgrade-title">Enter the code</p>
        <p class="upgrade-sub-title">
            If you have already purchased the VIP code, enter below to continue
        </p>
        <div class="upgrade-enter">
            <input name = "vip_code" type="text" placeholder="Enter the code..." />
            <button>Receive VIP</button>
        </div>
    </form>
    <?php 
        if(isset($_SESSION["error_code"])){
            echo "<p style='color:red'>".$_SESSION["error_code"]."</p>";
        }
    ?>
</div>
<script>
    $("#loading").css("display", "none");
</script>