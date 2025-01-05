 <!-- Main Address Section -->
 <div class="address-section tab-content flex-column" id="address-section">
     <div class="profile-header">
         <img src="../../assets/images/Profile-Pics/<?php echo $ProfilePic ?>" class="profile-pic">
     </div>
     <?php
        if (!$profile_complete) {
        ?>
         <form method="POST" class="address-form form flex">
             <div class="form__container grid">
                 <!-- Country -->
                 <div class="input-group flex-column">
                     <label for="country">Country<span class="red">*</span></label>
                     <select type="text" id="country">
                         <option value="India" selected>India</option>
                     </select>

                 </div>

                 <!-- State Name -->
                 <div class="input-group flex-column">
                     <label for="state">State<span class="red">*</span></label>
                     <select type="text" id="state">
                         <option selected>Select state</option>
                         <option value="Bihar">Bihar</option>
                         <option value="Bihar">Uttar pradesh</option>
                         <option value="Bihar">Madhya pradesh</option>
                         <option value="Bihar">Jharkhand</option>
                     </select>

                 </div>

                 <!-- Area -->
                 <div class="input-group flex-column">
                     <label for="area">Area<span class="red">*</span></label>
                     <input type="text" id="area" value="<?php echo $area ?>">

                 </div>

                 <!-- Pincode -->
                 <div class="input-group flex-column">
                     <label for="pincode">Pincode<span class="red">*</span></label>
                     <input type="text" id="pincode" value="<?php echo $pincode ?>">

                 </div>

                 <!-- City -->
                 <div class="input-group flex-column">
                     <label for="city">City<span class="red">*</span></label>
                     <input type="text" id="city" value="<?php echo $city ?>">

                 </div>

                 <!-- Address -->
                 <div class="input-group flex-column">
                     <label for="address">Address<span class="red">*</span></label>
                     <textarea rows="3" type="text" id="address"><?php echo $address ?></textarea>
                 </div>
                 <div class="msg text-center"></div>
                 <!-- Action Buttons -->
                 <div class="form-actions flex">
                     <button type="submit" id="save-address-btn" class="save-btn Green-btn">Save</button>
                 </div>
             </div>
         </form>
     <?php
        } else {
        ?>
         <form method="POST" class="address-form form flex">
             <div class="form__container grid">
                 <!-- Country -->
                 <div class="input-group flex-column">
                     <label for="country">Country</label>
                     <select type="text" id="country" disabled>
                         <option value="India" selected>India</option>
                     </select>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- State Name -->
                 <div class="input-group flex-column">
                     <label for="state">State</label>
                     <select type="text" id="state" disabled>
                         <option value="Bihar" selected>Bihar</option>
                         <option value="Bihar">Uttar pradesh</option>
                         <option value="Bihar">Madhya pradesh</option>
                         <option value="Bihar">Jharkhand</option>
                     </select>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- Area -->
                 <div class="input-group flex-column">
                     <label for="area">Area</label>
                     <input type="text" id="area" value="<?php echo $area ?>" readonly>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- Pincode -->
                 <div class="input-group flex-column">
                     <label for="pincode">Pincode</label>
                     <input type="text" id="pincode" value="<?php echo $pincode ?>" readonly>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- City -->
                 <div class="input-group flex-column">
                     <label for="city">City</label>
                     <input type="text" id="city" value="<?php echo $city ?>" readonly>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>

                 <!-- Address -->
                 <div class="input-group flex-column">
                     <label for="address">Address</label>
                     <textarea rows="3" type="text" id="address" readonly> <?php echo $address ?></textarea>
                     <img src="../../assets/images/Edit-Icon.svg" class="edit-icon">
                 </div>
                 <div class="msg text-center"></div>
                 <!-- Action Buttons -->
                 <div class="form-actions flex">
                     <button type="button" class="cancel-btn Red-btn disabled">Cancel</button>
                     <button type="submit" id="save-address-btn" class="save-btn Green-btn disabled">Save</button>
                 </div>
             </div>
         </form>
     <?php
        }
        ?>
 </div>