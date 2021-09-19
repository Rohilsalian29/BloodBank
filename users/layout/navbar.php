 <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Blood Bank Management System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="<?php
                        if (isset($setHomeActive)) {
                            echo $setHomeActive;
                        } else {
                            echo '';
                        }
                        ?>"><a href="index.php">Home</a></li>
                        <!-- <li class="<?php if(isset($setMemberActive)){ echo $setMemberActive; } else { echo ''; } ?>">
                            <a href="donor.php">Members</a>
                        </li> -->
                        <li   class="<?php if(isset($setAboutActive)) {echo $setAboutActive;} else {echo '';} ?>">
                            <a href="about.php">About us</a>
                        </li>
                        
                        <li class="<?php if(isset($setJoinUsActive)){ echo $setJoinUsActive; } else { echo ''; } ?>">
                            <a href="register.php">Donor Registration</a>
                        </li>
                        
                        <li class="<?php if(isset($setAvailabilityActive)) {echo $setAvailabilityActive;} else {echo '';} ?>">
                            <a href="donorSearch.php">Donor Search</a>
                        </li>
                        
                        <li class="">
                            <a href="../index.php">Admin</a>
                        </li>

                        <li class="<?php if(isset($setContactActive)) {echo $setContactActive;} else {echo '';} ?>">
                            <a href="contact.php">Contact</a>
                      </li>
                        
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	</br></br>