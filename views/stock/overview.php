<?php

$title = "StockOverview"

?>

<link rel="stylesheet" href="/static/css/styles.inventory.css">
<main>
    <div class="content">
        <!-- Inventory Cards -->
        <div class="inventory-cards">
            <div class="card" data-quantity="80">
                <div class="level">
                    <div class="fill"></div>
                </div>
                <div class="quantity">80 KG</div>
                <div class="ingredient-name">Keeri Samba</div>
                <div class="recent-update">Recent stock update: 20/12/2022, 100KG</div>
            </div>

            <div class="card" data-quantity="20">
                <div class="level">
                    <div class="fill"></div>
                </div>
                <div class="quantity">20 KG</div>
                <div class="ingredient-name">Samba</div>
                <div class="recent-update">Recent stock update: 15/12/2022, 50KG</div>
            </div>

            <div class="card" data-quantity="10">
                <div class="level">
                    <div class="fill"></div>
                </div>
                <div class="quantity">10 KG</div>
                <div class="ingredient-name">Sugar</div>
                <div class="recent-update">Recent stock update: 10/12/2022, 25KG</div>
            </div>
            <div class="card" data-quantity="100">
                <div class="level">
                    <div class="fill"></div>
                </div>
                <div class="quantity">5 KG</div>
                <div class="ingredient-name">Chilly</div>
                <div class="recent-update">Recent stock update: 10/12/2022, 25KG</div>
            </div>
            <div class="card" data-quantity="80">
                <div class="level">
                    <div class="fill"></div>
                </div>
                <div class="quantity">10 KG</div>
                <div class="ingredient-name">Potato</div>
                <div class="recent-update">Recent stock update: 10/12/2022, 25KG</div>
            </div>
            <div class="card" data-quantity="70">
                <div class="level">
                    <div class="fill"></div>
                </div>
                <div class="quantity">12 KG</div>
                <div class="ingredient-name">Onion</div>
                <div class="recent-update">Recent stock update: 10/12/2022, 25KG</div>
            </div>

        </div>


        <!-- Search/Filter Section -->
        <div class="search-filter">
            <input type="text" placeholder="Ingredient Name">
            <lable>
                Type
                <select>
                    <option value="" selected>All</option>
                    <option value="vegitables">Vegitables</option>
                    <option value="spices">Spices</option>
                    <option value="spices">Rice</option>
                    <option value="meets">Meet</option>
                    <option value="other">Other</option>
                </select>
            </lable>
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
        <?php if (!empty($inventory)): ?>
        <table class="inventory-table">
            <thead>
                <tr>
                <th>ItemNo</th>
                    <th>Name</th>
                    <th>Quantities</th>
                    <th>Supplier</th>
                    <th>Recent Restock</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each inventory item -->
                <?php foreach ($inventory as $item): ?>
                    <tr>
                        <td><?php echo $item['IngredientId']; ?></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['quantity'] . '' . $item['measureUnit']; ?></td>
                        <td><?php echo $item['supplier']; ?></td>
                        <td><?php echo $item['updatedAt']; ?></td>
                        <?php
                            $status = "good";
                            if($item['quantity']>=$item['defaultLevel']){
                                echo '<td class="good">Good</td>';
                            }else if($item['quantity']>=$item['alertLevel']){
                                echo '<td class="mid">below average</td>';
                            }else if($item['quantity']> 0){
                                echo '<td class="low">Low</td>';
                            }else{
                                echo '<td class="low">Empty</td>';
                            }
                             ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No inventory data available.</p>
        <?php endif; ?>
    </div>

    <!-- java Script section -->
    <script>
    document.querySelectorAll('.card').forEach(card => {
        const quantity = card.getAttribute('data-quantity');
        const fill = card.querySelector('.fill');

        // Assuming 100 KG is the maximum for full height (100% height).
        const maxQuantity = 100;
        const fillHeight = (quantity / maxQuantity) * 100;

        // Set the fill height dynamically based on quantity.
        fill.style.height = fillHeight + '%';
    });
    </script>
</main>