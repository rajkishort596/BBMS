 <!-- Main Password Section -->
 <div class="password-section tab-content flex-column" id="password-section">
     <div class="profile-header">
         <img src="../../assets/images/Avatar.jpg" class="profile-pic">
     </div>
     <form action="#" method="POST" class="password-form form flex">
         <div class="form__container grid">
             <!-- Password -->
             <div class="input-group flex-column">
                 <label for="password">Password</label>
                 <input type="password" id="password" value="pizza123" readonly>
                 <img src="../../assets/images/Close-Eye.svg" class="eye-icon close" onclick="showPassword('close')">
                 <img src="../../assets/images/Open-Eye.svg" class="eye-icon open" onclick="showPassword('open')">
             </div>
             <p class="info text-center">
                 Do your Password have been compromised? Don’t worry you can change your Password in two easy steps.
             </p>
             <!-- Action Buttons -->
             <div class="form-actions flex">
                 <button type="submit" class="Change-btn Red-btn">Change Password</button>
             </div>
         </div>
     </form>
 </div>