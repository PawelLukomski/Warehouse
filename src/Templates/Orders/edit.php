<?php
$order = $var['order'];
?>
<h1>Edytuj Artykuł</h1>
<div class="forms_container">
    <div class="form_main">
        <form method="post">
            <div>
                <h2>Nazwa artykułu</h2>
                <input type="text" name="name" value="<?php echo $order['name'] ?>">
            </div>
            <div>
                <h2>Jednostka</h2>
                <input type="text" value="<?php echo $order['unit'] ?>" name="unit">
            </div>
            <div>
                <h2>Kontrahent</h2>
                <select name="contractor">
                    <?php
                    foreach ($var['contractors'] as $contractor)
                    {
                        if($order['contractor_id'] == $contractor['id'])
                            echo "<option value='".$contractor['id']."' selected>".$contractor['name']."</option>'";
                        else
                            echo "<option value='".$contractor['id']."'>".$contractor['name']."</option>'";
                    }
                    ?>
                </select>
            </div>
            <div>
                <h2>Ilość minimalna</h2>
                <input style="width: 97%" name="minimum" value="<?php echo $order['minimum'] ?>" type="number" step="0.1">
            </div>
            <div>
                <h2>Kategoria</h2>
                <input type="text" value="<?php echo $order['category'] ?>" name="category">
            </div>
            <section class="section_btn">
                <a href="/Articles/"><button type="button" class="btn_link">Wróć</button></a><button name="edit" class="btn_link">Edytuj</button>
            </section>
        </form>
    </div>
</div>
