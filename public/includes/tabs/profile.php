 <!-- Main Profile Section -->
 <div class="profile-section tab-content active flex-column" id="profile-section">
     <?php
        if (!$profile_complete) {
        ?>
         <h2 class="profile-header-text text-center ">Complete your profile</h2>
         <form method="POST" class="form profile-pic-form flex-column" enctype="multipart/form-data">
             <div class="profile-header">
                 <img src="../../assets/images/Profile-Pics/<?php echo $ProfilePic ?>" id="preImg" class="profile-pic">
                 <img src="../../assets/images/Camera-Icon.svg" class="camera-icon">
                 <input type="file" id="profilePic">
             </div>
             <button id="upload-pic" class="Red-btn upload-btn">upload</button>
         </form>

         <form method="POST" class="profile-form form flex">
             <div class="form__container grid">
                 <!-- Name -->
                 <div class="input-group flex-column">
                     <label for="name">Name<span class="red">*</span></label>
                     <input type="text" id="name" value="<?php echo $name ?>">

                 </div>

                 <!-- Father's Name -->
                 <div class="input-group flex-column">
                     <label for="father-name">Father's Name<span class="red">*</span></label>
                     <input type="text" id="father-name" value="<?php echo $fatherName ?>">

                 </div>

                 <!-- Gender -->
                 <div class="input-group flex-column">
                     <label for="gender">Gender<span class="red">*</span></label>
                     <select name="gender" id="gender">
                         <option disabled selected>Select gender</option>
                         <option value="Male" <?php if ($gender == 'Male') {
                                                    echo 'selected';
                                                } ?>>Male</option>
                         <option value="Female" <?php if ($gender == 'Female') {
                                                    echo 'selected';
                                                } ?>>Female</option>
                     </select>

                 </div>

                 <!-- Blood Group -->
                 <div class="input-group flex-column">
                     <label for="blood-group">Blood Group<span class="red">*</span></label>
                     <select id="blood-group" class="blood-group-select">
                         <option selected disabled>Select blood group</option>
                         <option value="A+" <?php if ($bloodGroup == 'A+') {
                                                echo 'selected';
                                            } ?>>A+</option>
                         <option value="A-" <?php if ($bloodGroup == 'A-') {
                                                echo 'selected';
                                            } ?>>A-</option>
                         <option value="B+" <?php if ($bloodGroup == 'B+') {
                                                echo 'selected';
                                            } ?>>B+</option>
                         <option value="B-" <?php if ($bloodGroup == 'B-') {
                                                echo 'selected';
                                            } ?>>B-</option>
                         <option value="AB+" <?php if ($bloodGroup == 'AB+') {
                                                    echo 'selected';
                                                } ?>>AB+</option>
                         <option value="AB-" <?php if ($bloodGroup == 'AB-') {
                                                    echo 'selected';
                                                } ?>>AB-</option>
                         <option value="O+" <?php if ($bloodGroup == 'O+') {
                                                echo 'selected';
                                            } ?>>O+</option>
                         <option value="O-" <?php if ($bloodGroup == 'O-') {
                                                echo 'selected';
                                            } ?>>O-</option>
                     </select>

                 </div>

                 <!-- Date of Birth -->
                 <div class="input-group flex-column">
                     <label for="dob">DOB<span class="red">*</span></label>
                     <input type="date" id="dob" value="<?php echo $dob ?>">

                 </div>

                 <!-- Weight -->
                 <div class="input-group flex-column">
                     <label for="weight">Weight (kg)<span class="red">*</span></label>
                     <input type="text" id="weight" value="<?php echo $weight ?>">

                 </div>
                 <div class=" text-center msg"></div>
                 <!-- Action Buttons -->
                 <div class="form-actions flex">
                     <button type="submit" id="save-profile-btn" class="save-btn Green-btn">Save</button>
                     <!-- <button id="next-btn" class="next-btn Red-btn tab-link" data-target="address-section">Next</button> -->
                 </div>
             </div>
         </form>
     <?php
        } else {
        ?>
         <form method="POST" class="form profile-pic-form flex-column" enctype="multipart/form-data">
             <div class="profile-header">
                 <img src="../../assets/images/Profile-Pics/<?php echo $ProfilePic ?>" id="preImg" class="profile-pic">
                 <img src="../../assets/images/Camera-Icon.svg" class="camera-icon">
                 <input type="file" id="profilePic">
             </div>
             <button id="upload-pic" class="Red-btn upload-btn disabled">upload</button>
         </form>
         <form method="POST" class="profile-form form flex" enctype="multipart/form-data">
             <div class="form__container grid">
                 <!-- Name -->
                 <div class="input-group flex-column">
                     <label for="name">Name</label>
                     <input type="text" id="name" value="<?php echo $name ?>" readonly>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- Father's Name -->
                 <div class="input-group flex-column">
                     <label for="father-name">Father's Name</label>
                     <input type="text" id="father-name" value="<?php echo $fatherName ?>" readonly>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- Gender -->
                 <div class="input-group flex-column">
                     <label for="gender">Gender</label>
                     <select name="gender" id="gender" disabled>
                         <option disabled selected>Select gender</option>
                         <option value="Male" <?php if ($gender == 'Male') {
                                                    echo 'selected';
                                                } ?>>Male</option>
                         <option value="Female" <?php if ($gender == 'Female') {
                                                    echo 'selected';
                                                } ?>>Female</option>
                     </select>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- Blood Group -->
                 <div class="input-group flex-column">
                     <label for="blood-group">Blood Group</label>
                     <select id="blood-group" class="blood-group-select" disabled>
                         <option selected disabled>Select blood group</option>
                         <option value="A+" <?php if ($bloodGroup == 'A+') {
                                                echo 'selected';
                                            } ?>>A+</option>
                         <option value="A-" <?php if ($bloodGroup == 'A-') {
                                                echo 'selected';
                                            } ?>>A-</option>
                         <option value="B+" <?php if ($bloodGroup == 'B+') {
                                                echo 'selected';
                                            } ?>>B+</option>
                         <option value="B-" <?php if ($bloodGroup == 'B-') {
                                                echo 'selected';
                                            } ?>>B-</option>
                         <option value="AB+" <?php if ($bloodGroup == 'AB+') {
                                                    echo 'selected';
                                                } ?>>AB+</option>
                         <option value="AB-" <?php if ($bloodGroup == 'AB-') {
                                                    echo 'selected';
                                                } ?>>AB-</option>
                         <option value="O+" <?php if ($bloodGroup == 'O+') {
                                                echo 'selected';
                                            } ?>>O+</option>
                         <option value="O-" <?php if ($bloodGroup == 'O-') {
                                                echo 'selected';
                                            } ?>>O-</option>
                     </select>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- Date of Birth -->
                 <div class="input-group flex-column">
                     <label for="dob">DOB</label>
                     <input type="date" id="dob" value="<?php echo $dob ?>" readonly>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- Weight -->
                 <div class="input-group flex-column">
                     <label for="weight">Weight (kg)</label>
                     <input type="text" id="weight" value="<?php echo $weight ?>" readonly>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>
                 <div class=" text-center msg"></div>
                 <!-- Action Buttons -->
                 <div class="form-actions flex">
                     <button type="button" class="cancel-btn Red-btn disabled">Cancel</button>
                     <button type="submit" id="save-profile-btn" class="save-btn Green-btn disabled">Save</button>
                 </div>
             </div>
         </form>
     <?php
        }
        ?>

 </div>