<div id="create-campaign" class="tab-content">
    <div class="create-campaign-contaier flex-column w-100">
        <h3 class="ff-Merriweather text-center">Create Donation Campaign</h3>
        <p class="text-center">Start a new blood donation campaign by filling out the campaign details below. Make sure to specify the Address, date, and time to ensure successful donor participation.</p>

        <form id="CreateCampiagnForm" method="post" class="form flex-column w-100">
            <div class="form__container grid w-100">
                <div class="input-group flex-column">
                    <label for="campaignName">Campaign Name</label>
                    <input type="text" id="campaignName">
                </div>
                <div class="input-group flex-column">
                    <label for="cityName">City</label>
                    <select type="text" id="cityName">
                        <option value="" disabled>Select city</option>
                        <?php
                        foreach ($cities as $city) {
                            echo "<option value='{$city}'>{$city}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group flex-column">
                    <label for="startingDate">Starting Date</label>
                    <input type="date" id="startingDate">
                </div>
                <div class="input-group flex-column">
                    <label for="endingDate">Ending Date</label>
                    <input type="date" id="endingDate">
                </div>
                <div class="input-group flex-column">
                    <label for="organizerName">Organizer Name</label>
                    <input type="text" id="organizerName">
                </div>
                <div class="input-group flex-column">
                    <label for="Address">Address</label>
                    <select type="text" id="Address">
                        <option selected disabled value="#">Select Address</option>
                        <?php
                        foreach ($locations as $location) {
                            echo "<option value='{$location}'>{$location}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group flex-column w-100">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="5"></textarea>
                </div>
            </div>
            <div class="msg text-center"></div>
            <button class="Red-btn w-100" id="Create-campaign-btn">Create Campaign</button>
        </form>
    </div>
</div>