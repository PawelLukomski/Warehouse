<?php
?>
<h1>Dodaj Zamówienie</h1>
<div class="forms_container">
    <div class="form_main">
        <form method="post">
            <div>
                <h2>Wybierz Artykuł</h2>
                <select name="id_article">
                    <?php
                        foreach ($var['articles'] as $article)
                            echo "<option value='".$article['id']."'>".$article['name']." [".$article['unit']."]</option>";
                    ?>
                </select>
            </div>
            <div>
                <h2>Ilość</h2>
                <input style="width: 97%" name="amount" type="number" step="0.1">
            </div>
            <section class="section_btn">
                <a href="/Orders/"><button type="button" class="btn_link">Wróć</button></a><button name="add" class="btn_link">Dodaj</button>
            </section>
        </form>
    </div>
</div>
