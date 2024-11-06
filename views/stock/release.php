<?php

$title = "ReleaseItems"

?>

<link rel="stylesheet" href="/static/css/styles.inventory.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<main>
    <div class="content">
        <div class="order-select">
            <label for="order">Select the Order</label>
            <select id="order">
                <option value="001234">001334 #3 Chicken Fried rice - 10/04/2024</option>
                <option value="001234">000123 #2 Mix Fried rice - 10/10/2024</option>
                <option value="001234">001123 #3 Idi appa - 10/22/2024</option>
                <option value="001234">001222 #1 Fish rice - 10/14/2024</option>
            </select>
        </div>

        <div class="order-details">
            <p><strong>Order ID:</strong> 001334</p>
            <p><strong>Address:</strong> 2/20 Nawan path, Ja-Ela</p>
            <p><strong>Package:</strong> #3 (chicken fried rice) Customized</p>
            <p><strong>Quantity:</strong> 50 people</p>
            <p><strong>Includes:</strong> Cashew Curry, Chilly Paste, Crispy Chicken, Vegetable Chops, Caramel Pudding
            </p>
        </div>

        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Supplier</th>
                    <th>Current Quantities</th>
                    <th>Used Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Samba Rice</td>
                    <td>Araliya</td>
                    <td><span class="quantity">100</span> <span class="unit">KG</span></td>
                    <td><input type="text" class="restock-input" value="100"></td>
                    <td><button class="delete-btn">🗑</button></td>
                </tr>
                <tr>
                    <td>Vegitable Oil</td>
                    <td>Akith</td>
                    <td><span class="quantity">180</span> <span class="unit">L</span></td>
                    <td><input type="text" class="restock-input" value="20"></td>
                    <td><button class="delete-btn">🗑</button></td>
                </tr>
                <!-- Add more rows here -->
            </tbody>
        </table>
        <div class="btns">
            <button class="fa fa-plus add-row-btn"></button>
            <button class="update-btn">Update +</button>
        </div>
    </div>

    <script>
        // Functionality for adding a new row dynamically
document.querySelector('.add-row-btn').addEventListener('click', function() {
    const tableBody = document.querySelector('.inventory-table tbody');
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>New Supplier</td>
        <td>Booking packages</td>
        <td><span class="quantity">0</span> <span class="unit">KG</span></td>
        <td><input type="text" class="restock-input" value="0"></td>
        <td><button class="delete-btn">🗑</button></td>
    `;
    tableBody.appendChild(newRow);
    attachDeleteHandler(newRow.querySelector('.delete-btn'));
});

// Functionality for delete buttons
function attachDeleteHandler(deleteBtn) {
    deleteBtn.addEventListener('click', function() {
        const row = this.closest('tr');
        row.remove();
    });
}

// Attach delete functionality to initial rows
document.querySelectorAll('.delete-btn').forEach(attachDeleteHandler);

// Placeholder update button action
document.querySelector('.update-btn').addEventListener('click', function() {
    alert('Updated successfully!');
});

    </script>
</main>