 <!-- Dlete Expired Blood Units Section -->
 <div id="delete-expired" class="tab-content flex-column">
     <h3 class="ff-Merriweather">Delete Expired <span class="red">Blood</span> Units</h3>
     <div class="delete-expired-blood-container w-100 flex-column">
         <table>
             <thead>
                 <tr>
                     <th>Blood Group</th>
                     <th>Blood Units</th>
                     <th>Expiry Date</th>
                     <th>Condition</th>
                     <th>Select</th>
                 </tr>
             </thead>
             <tbody id="expired-blood-table">
                 <!-- Rows will be dynamically added here -->
             </tbody>
         </table>
         <div class="flex btn-container">
             <button class="Yellow-btn" id="select-all">
                 Select All
             </button>
             <button class="Red-btn" id="delete-expired-btn">
                 Delete
             </button>
         </div>
     </div>
 </div>