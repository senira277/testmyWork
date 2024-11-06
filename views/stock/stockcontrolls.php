<?php

$title = "StockControlls"

?>

<link rel="stylesheet" href="/static/css/styles.inventory.css">

<main>
    <div class="form-section">
        <div class="form-container">
            <h2>Add New Item</h2>
            <form id="addItemForm" method="post" action="/stock/add-item">
                <div class="line-inputs">
                    <label for="itemName">Item Name:</label>
                    <span>should be a unique name</span>
                    <input type="text" id="itemName" name="itemName" required>
                </div>
                <div class="line-inputs">
                    <label for="itemType">Item Type:</label>
                    <select id="itemType" name="itemType">
                        <option value="vegitables">Vegitables</option>
                        <option value="spices">Spices</option>
                        <option value="spices">Rice</option>
                        <option value="meets">Meet</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="line-inputs">
                    <label for="measureUnit">Measuring Unit:</label>
                    <select id="measureUnit" name="measureUnit">
                        <option value="kg">Kelogram (KG)</option>
                        <option value="liters">Liters (l)</option>
                        <option value="num">In numbers</option>
                    </select>
                </div>
                <div class="line-inputs">
                    <label for="supplier">Supplier:</label>
                    <span>If there is a default supplier (optional)</span>
                    <input type="text" id="supplier" name="supplier">
                </div>
                <div class="level-inputs">
                    <div>
                        <label for="defaultLevel">Default Level:</label>
                        <span>The quantity the should keep normally</span>
                        <input type="number" id="defaultLevel" name="defaultLevel" required>
                    </div>
                    <div>
                        <label for="alertLevel">Give Alerts When:</label>
                        <span>The lowest quantity (Input more than 1 to get alerts )</span>
                        <input type="number" id="alertLevel" name="alertLevel" required>
                    </div>
                </div>
                <button type="submit">
                    <span></span>
                    Add Item</button>
            </form>
        </div>

        <div class="form-container">
            <h2>Update Item</h2>
            <form id="updateItemForm" method="post" action="/stock/update-item">
                <div class="line-inputs">
                    <label for="itemName">Item Name:</label>
                    <span>should be a unique name</span>
                    <input type="text" id="itemName" name="itemName" required>
                </div>
                <div class="line-inputs">
                    <label for="itemType">Item Type:</label>
                    <select id="itemType" name="itemType">
                        <option value="vegitables">Vegitables</option>
                        <option value="spices">Spices</option>
                        <option value="spices">Rice</option>
                        <option value="meets">Meet</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="line-inputs">
                    <label for="measuringUnit">Measuring Unit:</label>
                    <select id="measuringUnit" name="measuringUnit">
                        <option value="kg">Kelogram (KG)</option>
                        <option value="liters">Liters (l)</option>
                        <option value="num">In numbers</option>
                    </select>
                </div>
                <div class="line-inputs">
                    <label for="supplier">Supplier:</label>
                    <span>If there is a default supplier (optional)</span>
                    <input type="text" id="supplier" name="supplier">
                </div>
                <div class="level-inputs">
                    <div>
                        <label for="defaultLevel">Default Level:</label>
                        <span>The quantity the should keep normally</span>
                        <input type="number" id="defaultLevel" name="defaultLevel" required>
                    </div>
                    <div>
                        <label for="alertQuantity">Give Alerts When:</label>
                        <span>The lowest quantity (Input more than 1 to get alerts )</span>
                        <input type="number" id="alertQuantity" name="alertQuantity" required>
                    </div>
                </div>
                <button type="submit">
                    <span></span>
                    Update Item</button>
            </form>
        </div>
    </div>
    <div class="track-items">
        <h2>Select Main Items to be quick track</h2>
        <div class="select-items">
            <div class="">
                <label for="itemName1">#1 Item Name:</label>
                <select id="itemName1" name="itemName1">
                    <option value="vegitables">Vegitables</option>
                    <option value="spices">Spices</option>
                    <option value="spices">Rice</option>
                    <option value="meets">Meet</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="">
                <label for="itemName1">#2 Item Name:</label>
                <select id="itemName1" name="itemName1">
                    <option value="vegitables">Vegitables</option>
                    <option value="spices">Spices</option>
                    <option value="spices">Rice</option>
                    <option value="meets">Meet</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="">
                <label for="itemName1">#3 Item Name:</label>
                <select id="itemName1" name="itemName1">
                    <option value="vegitables">Vegitables</option>
                    <option value="spices">Spices</option>
                    <option value="spices">Rice</option>
                    <option value="meets">Meet</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="">
                <label for="itemName1">#4 Item Name:</label>
                <select id="itemName1" name="itemName1">
                    <option value="vegitables">Vegitables</option>
                    <option value="spices">Spices</option>
                    <option value="spices">Rice</option>
                    <option value="meets">Meet</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="">
                <label for="itemName1">#5 Item Name:</label>
                <select id="itemName1" name="itemName1">
                    <option value="vegitables">Vegitables</option>
                    <option value="spices">Spices</option>
                    <option value="spices">Rice</option>
                    <option value="meets">Meet</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="">
                <label for="itemName1">#6 Item Name:</label>
                <select id="itemName1" name="itemName1">
                    <option value="vegitables">Vegitables</option>
                    <option value="spices">Spices</option>
                    <option value="spices">Rice</option>
                    <option value="meets">Meet</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
    </div>
</main>
