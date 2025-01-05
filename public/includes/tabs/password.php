 <!-- Main Password Section -->
 <div class="password-section tab-content flex-column" id="password-section">
     <div class="profile-header">
         <img src="../../assets/images/Profile-Pics/<?php echo $ProfilePic ?>" class="profile-pic">
     </div>
     <!-- Step 1: Current Password -->
     <form method="POST" class="password-form form flex active">
         <div class="form__container grid">
             <!-- Password -->
             <div class="input-group flex-column">
                 <label for="password">Password</label>
                 <input type="password" id="password" value="***********" readonly>
                 <!-- <img src="../../assets/images/Close-Eye.svg" class="eye-icon close" onclick="showPassword('close')">
                 <img src="../../assets/images/Open-Eye.svg" class="eye-icon open" onclick="showPassword('open')"> -->
             </div>
             <p class="info text-center">
                 Do your Password have been compromised? Don’t worry you can change your Password in two easy steps.
             </p>
             <!-- Action Button -->
             <div class="form-actions flex">
                 <button class="Change-btn Red-btn">Change Password</button>
             </div>
         </div>
     </form>
     <!-- Step 2: Email Confirmation -->
     <form method="POST" class="password-form form flex  ">
         <div class="form__container grid">
             <p class="info text-center">
                 Please Enter Your Email and we’ll send you a 4-digit
                 verification code .
             </p>
             <!-- Email -->
             <div class="input-group flex-column">
                 <label for="email">Please Enter Your Email <span class="red">*</span></label>
                 <input type="email" id="email" required>
                 <span class="error email-error red"></span>
             </div>
             <!-- Action Button -->
             <div class="form-actions flex">
                 <button type="submit" class="get-code-btn Red-btn">Get Code</button>
             </div>
         </div>
     </form>
     <!-- Step 3: Enter Code -->
     <form method="POST" class="password-form form flex ">
         <div class="form__container grid">
             <div class="info">
                 <h4 class="info title text-center">Enter Confirmation Code</h4>
                 <p class="info text-center">
                     We,ve sent a code to <span class="bold">rajkishort596@gmail.com</span>
                 </p>
             </div>
             <!-- Otp field -->
             <div class="input-group flex-column">
                 <div class="otp-container flex">
                     <input type="text" maxlength="1" class="otp-input" id="otp1">
                     <input type="text" maxlength="1" class="otp-input" id="otp2">
                     <input type="text" maxlength="1" class="otp-input" id="otp3">
                     <input type="text" maxlength="1" class="otp-input" id="otp4">
                 </div>
                 <span class="error otp-error red text-center"></span>
             </div>

             <!-- Action Button -->
             <div class="form-actions flex-column">
                 <button type="submit" class="get-code-btn Red-btn">confirm</button>
                 <p>
                     Did't recieve the Email?
                     <a href="#" class="resend">click to resend</a>
                 </p>
             </div>
         </div>
     </form>
     <!-- Step 4: Create New Password -->
     <form method="POST" class="password-form form flex ">
         <div class="form__container grid">
             <div class="info">
                 <h4 class="info title text-center">Create a new password</h4>
                 <p class="info text-center">
                     Please choose a password that has’t been used before. Must be atleast 8 character.
                 </p>
             </div>
             <!-- creat new password -->
             <div class="input-group flex-column">
                 <label for="new-password">Choose a new Password</label>
                 <input type="password" id="new-password" required>
                 <img src="../../assets/images/Close-Eye.svg" class="eye-icon close" onclick="showPassword(this, 'close')">
                 <img src="../../assets/images/Open-Eye.svg" class="eye-icon open" style="display: none;" onclick="showPassword(this, 'open')">
             </div>
             <div class="input-group flex-column">
                 <label for="confirm-password">Confirm your password</label>
                 <input type="password" id="confirm-password" required>
                 <img src="../../assets/images/Close-Eye.svg" class="eye-icon close" onclick="showPassword(this, 'close')">
                 <img src="../../assets/images/Open-Eye.svg" class="eye-icon open" style="display: none;" onclick="showPassword(this, 'open')">
             </div>

             <!-- Action Button -->
             <div class="form-actions flex-column">
                 <button type="submit" class="get-code-btn Red-btn">Change</button>
             </div>
         </div>
     </form>
     <div class="carousel-indicators flex w-100">
         <span class="dot active"></span>
         <span class="dot"></span>
         <span class="dot"></span>
         <span class="dot"></span>
     </div>
 </div>