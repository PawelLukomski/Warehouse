<?php
$contractor = $var['order'];
?>
<h1>Edytuj Kontrahenta</h1>
<div class="forms_container">
    <div class="form_main">
        <form method="post">
            <div>
                <h2>Nazwa Kontrahenta</h2>
                <input type="text" value="<?php echo $contractor['name'] ?>" name="name">
            </div>
            <div>
                <h2>Adres</h2>
                <textarea name="address"><?php echo $contractor['address'] ?></textarea>
            </div>
            <div>
                <h2>Telefon</h2>
                <input type="text" value="<?php echo $contractor['phone'] ?>" name="phone">
            </div>
            <div>
                <h2>Adnotacja</h2>
                <textarea name="annotation"><?php echo $contractor['annotation'] ?></textarea>
            </div>
            <section class="section_btn">
                <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>"><button type="button" class="btn_link">Wróć</button></a><button name="edit" class="btn_link">Edytuj</button>
            </section>
        </form>
    </div>
</div>
