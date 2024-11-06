<?php

$title = "ReStock"

?>

<link rel="stylesheet" href="/static/css/styles.inventory.css">

<main>
    <div class="content">
        <!-- Updated Items Section -->
        <div class="update-box">
            <div class="list">You haven't updated any item levels yet!</div>
            <button>Update +</button>
        </div>

        <!-- Search/Filter Section -->
        <div class="search-filter">
            <input type="text" placeholder="Ingredient Name">
            <label>
                Type
                <select>
                    <option value="" selected>All</option>
                    <option value="vegitables">Vegitables</option>
                    <option value="spices">Spices</option>
                    <option value="spices">Rice</option>
                    <option value="meets">Meet</option>
                    <option value="other">Other</option>
                </select>
            </label>
            <label class="checkbox-label">
                <input type="checkbox" class="custom-checkbox">
                <span class="checkbox-text">
                    Low<br>
                    <span class="checkbox-subtext">(Show items running low)</span>
                </span>
            </label>
            <button>Search</button>
        </div>

        <!-- Inventory Table -->
        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Recent Restock</th>
                    <th>Supplier</th>
                    <th>Quantities</th>
                    <th>Status</th>
                    <th>Restock Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Keeri samba</td>
                    <td>20/12/2023</td>
                    <td>Araliyas</td>
                    <td>180KG</td>
                    <td class="good">Good</td>
                    <td><input type="number" class="restock-input" data-item="Keeri samba"></td>
                </tr>
                <tr>
                    <td>Parippu</td>
                    <td>21/12/2023</td>
                    <td>Gunasena</td>
                    <td>3KG</td>
                    <td class="low">Low</td>
                    <td><input type="number" class="restock-input" data-item="Parippu"></td>

                </tr>
                <tr>
                    <td>Chilly Powdee</td>
                    <td>04/12/2023</td>
                    <td>Harischandra</td>
                    <td>4KG</td>
                    <td class="low">Low</td>
                    <td><input type="number" class="restock-input" data-item="Chilly Powder"></td>
                </tr>
                <tr>
                    <td>Suger</td>
                    <td>10/01/2024</td>
                    <td>Gunasena</td>
                    <td>30KG</td>
                    <td class="good">Low</td>
                    <td><input type="number" class="restock-input" data-item="Sugar"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- java Script section -->
    <script>
    document.querySelectorAll('.restock-input').forEach(input => {
        input.addEventListener('input', function() {
            const itemName = this.getAttribute('data-item');
            const restockAmount = this.value;

            const updatedList = document.querySelector('.update-box .list');

            if (!restockAmount) {
                updatedList.innerHTML = "You haven't updated any item levels yet!";
            } else {
                let existingItem = document.querySelector(
                    `.update-box .list-item[data-item="${itemName}"]`);

                if (existingItem) {
                    existingItem.textContent = `${itemName}: ${restockAmount}`;
                } else {
                    let newItem = document.createElement('div');
                    newItem.classList.add('list-item');
                    newItem.setAttribute('data-item', itemName);
                    newItem.textContent = `${itemName}: ${restockAmount}`;
                    updatedList.appendChild(newItem);
                }
            }
        });
    });
    </script>
</main>