<?php
?>
<h1>Dodaj Zamówienie</h1>
<div class="forms_container">
    <div class="form_main">
        <form method="post">
        <div>
            <h2>Wybierz produkt</h2>
            <select name="id_product">
                <?php
                    foreach ($var['products'] as $product)
                        echo "<option value='".$product['id']."'>".$product['name']."</option>";
                ?>
            </select>
        </div>
        <div>
            <h2>Ilość do zamówienia</h2>
            <input type='number' step='0.1' name='amount'>
        </div>
            <div>
                <button class="btn_link" name="add">Dodaj</button>
            </div>
        </form>
    </div>
</div>

