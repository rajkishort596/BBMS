<!-- Add Blood Units Section -->
<div id="add-blood" class="tab-content active flex-column">
    <h3 class="ff-Merriweather">Add <span class="red">Blood</span> Units</h3>
    <div class="msg"></div>
    <form action="" method="post" class="form flex-column" id="AddBloodForm">
        <div class="form__container grid">
            <div class="input-group flex-column">
                <label for="blood-group">Blood Group</label>
                <select name="BloodGroup" id="blood-group" required>
                    <!-- Adding blood types -->
                    <option value="" selected disabled>Select Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <img src="../../assets/images/white-drop.svg">
            </div>
            <div class="input-group flex-column">
                <label for="expiry-date">Expiry Date</label>
                <input type="date" id="expiry-date" name="ExpiryDate">
            </div>
            <div class="input-group flex-column">
                <label for="blood-units">Blood Units</label>
                <input type="number" id="blood-units" name="BloodUnits">
            </div>
        </div>
        <button class="Red-btn" type="submit" name="AddBlood" id="AddBlood">Add Blood</button>
    </form>
</div>