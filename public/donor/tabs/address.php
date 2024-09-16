 <!-- Main Address Section -->
 <div class="address-section tab-content flex-column" id="address-section">
     <div class="profile-header">
         <img src="../../assets/images/Avatar.jpg" class="profile-pic">
     </div>
     <form action="#" method="POST" class="address-form form flex">
         <div class="form__container grid">
             <!-- Country -->
             <div class="input-group flex-column">
                 <label for="country">Country</label>
                 <input type="text" id="country" value="India" readonly>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- State Name -->
             <div class="input-group flex-column">
                 <label for="state">State</label>
                 <input type="text" id="state" value="Bihar" readonly>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- Area -->
             <div class="input-group flex-column">
                 <label for="area">Area</label>
                 <input type="text" id="area" value="Pupri" readonly>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- Pincode -->
             <div class="input-group flex-column">
                 <label for="pincode">Pincode</label>
                 <input type="text" id="pincode" value="843320" readonly>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- City -->
             <div class="input-group flex-column">
                 <label for="city">City</label>
                 <input type="text" id="city" value="Sitamarhi" readonly>
                 <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
             </div>

             <!-- Address -->
             <div class="input-group flex-column">
                 <label for="address">Address</label>
                 <textarea rows="3" type="text" id="address" readonly>Bhulan Chowk, Janakpur road, Pupri Nagar Parishad, Sitamarhi, Bihar, India</textarea>
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