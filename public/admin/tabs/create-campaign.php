<div id="create-campaign" class="tab-content">
    <div class="create-campaign-contaier flex-column w-100">
        <h3 class="ff-Merriweather text-center">Create Donation Campaign</h3>
        <p class="text-center">Start a new blood donation campaign by filling out the campaign details below. Make sure to specify the Address, date, and time to ensure successful donor participation.</p>
        <div class="msg"></div>
        <form id="CreateCampiagnForm" method="post" class="form flex-column w-100">
            <div class="form__container grid w-100">
                <div class="input-group flex-column">
                    <label for="campaignName">Campaign Name</label>
                    <input type="text" id="campaignName">
                </div>
                <div class="input-group flex-column">
                    <label for="cityName">City</label>
                    <input type="text" id="cityName" value="Darbhanga" readonly>
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
                    <input type="text" id="Address">
                </div>
                <div class="input-group flex-column w-100">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="5"></textarea>
                </div>
            </div>
            <button class="Red-btn w-100" id="Create-campaign" type="submit" name="CreateCampaign">Create Campaign</button>
        </form>
    </div>
</div>