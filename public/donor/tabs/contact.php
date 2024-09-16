 <!-- Main Contact Section -->
 <div class="contact-section tab-content flex-column" id="contact-section">
     <div class="profile-header">
         <img src="../../assets/images/Avatar.jpg" class="profile-pic">
     </div>
     <form action="#" method="POST" class="contact-form form flex">
         <div class="form__container grid">
             <!-- Email -->
             <div class="input-group flex-column">
                 <label for="email">Email</label>
                 <input type="email" id="email" value="rajkishort596@gmail.com" readonly>
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
                 <input type="text" id="mobile-number" value="8789348522" readonly>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- Action Buttons -->
             <div class="form-actions flex">
                 <button type="button" class="cancel-btn Red-btn disabled">Cancel</button>
                 <button type="submit" class="save-btn Green-btn disabled">Save</button>
             </div>
         </div>
     </form>
 </div>