<?php
?>
<h1>Dodaj Kontrahenta</h1>
    <div class="forms_container">
        <div class="form_main">
        <form method="post">
            <div>
                <h2>Nazwa Kontrahenta</h2>
                <input type="text" name="name">
            </div>
            <div>
                <h2>Adres</h2>
                <textarea name="address"></textarea>
            </div>
            <div>
                <h2>Telefon</h2>
                <input type="text" name="phone">
            </div>
            <div>
                <h2>Adnotacja</h2>
                <textarea name="annotation"></textarea>
            </div>
            <section class="section_btn">
                <a href="/Contractors/"><button type="button" class="btn_link">Wróć</button></a><button name="add" class="btn_link">Dodaj</button>
            </section>
        </form>
    </div>
</div>
