 <!-- Main Profile Section -->
 <div class="profile-section tab-content active flex-column" id="profile-section">
     <div class="profile-header">
         <img src="../../assets/images/Avatar.jpg" class="profile-pic">
         <img src="../../assets/images/Camera-Icon.svg" class="camera-icon">
     </div>
     <form action="#" method="POST" class="profile-form form flex">
         <div class="form__container grid">
             <!-- Name -->
             <div class="input-group flex-column">
                 <label for="name">Name</label>
                 <input type="text" id="name" value="Rajkishor Thakur" readonly>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- Father's Name -->
             <div class="input-group flex-column">
                 <label for="father-name">Father's Name</label>
                 <input type="text" id="father-name" value="Binod Thakur" readonly>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- Gender -->
             <div class="input-group flex-column">
                 <label for="gender">Gender</label>
                 <select name="gender" id="gender" disabled>
                     <option value="Male" selected>Male</option>
                     <option value="Female">Female</option>
                 </select>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- Blood Group -->
             <div class="input-group flex-column">
                 <label for="blood-group">Blood Group</label>
                 <select id="blood-group" class="blood-group-select" disabled>
                     <option value="A+" selected>A+</option>
                     <option value="A-">A-</option>
                     <option value="B+">B+</option>
                     <option value="B-">B-</option>
                     <option value="AB+">AB+</option>
                     <option value="AB-">AB-</option>
                     <option value="O+">O+</option>
                     <option value="O-">O-</option>
                 </select>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- Date of Birth -->
             <div class="input-group flex-column">
                 <label for="dob">DOB</label>
                 <input type="text" id="dob" value="24/05/2004" readonly>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- Weight -->
             <div class="input-group flex-column">
                 <label for="weight">Weight</label>
                 <input type="text" id="weight" value="55 kg" readonly>
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