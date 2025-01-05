 <!-- Main Contact Section -->
 <div class="contact-section tab-content flex-column" id="contact-section">
     <div class="profile-header">
         <img src="../../assets/images/Profile-Pics/<?php echo $ProfilePic ?>" class="profile-pic">
     </div>

     <?php
        if (!$profile_complete) {
        ?>
         <form method="POST" class="contact-form form flex active">
             <div class="form__container grid">
                 <!-- Email -->
                 <div class="input-group flex-column">
                     <label for="email">Email<span class="red">*</span></label>
                     <input type="email" id="email" value="<?php echo $email ?>">
                 </div>

                 <!-- OTP -->
                 <div class="input-group flex-column">
                     <label for="otp">OTP</label>
                     <input type="text" id="otp">
                 </div>
                 <!-- Send OTP -->
                 <div class="input-group flex-column">
                     <button class="Red-btn send-otp-btn disabled">Send OTP</button>
                 </div>

                 <!-- Mobile Number -->
                 <div class="input-group flex-column">
                     <label for="mobile-number">Mobile Number<span class="red">*</span></label>
                     <input type="text" id="mobile-number" value="<?php echo $mobile ?>">

                 </div>
                 <div class="msg text-center"></div>
                 <!-- Action Buttons -->
                 <div class="form-actions flex">
                     <button type="submit" id="save-contact-btn" class="save-btn Green-btn">Save</button>
                 </div>
             </div>
         </form>
     <?php
        } else {
        ?>
         <form method="POST" class="contact-form form flex active">
             <div class="form__container grid">
                 <!-- Email -->
                 <div class="input-group flex-column">
                     <label for="email">Email</label>
                     <input type="email" id="email" value="<?php echo $email ?>" readonly>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- OTP -->
                 <div class="input-group flex-column">
                     <label for="otp">OTP</label>
                     <input type="text" id="otp" readonly>
                 </div>
                 <!-- Send OTP -->
                 <div class="input-group flex-column">
                     <button class="Red-btn send-otp-btn disabled">Send OTP</button>
                 </div>

                 <!-- Mobile Number -->
                 <div class="input-group flex-column">
                     <label for="mobile-number">Mobile Number</label>
                     <input type="text" id="mobile-number" value="<?php echo $mobile ?>" readonly>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>
                 <div class="msg text-center"></div>
                 <!-- Action Buttons -->
                 <div class="form-actions flex">
                     <button type="button" class="cancel-btn Red-btn disabled">Cancel</button>
                     <button type="submit" id="save-contact-btn" class="save-btn Green-btn disabled">Save</button>
                 </div>
             </div>
         </form>
     <?php
        }
        ?>
 </div>