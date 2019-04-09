<?php
?>
<h1>Dodaj Artykuł</h1>
<form method="post">
    <div class="forms_container">
        <div class="form_main">
            <div>
                <h2>Nazwa artykułu</h2>
                <input type="text" name="name">
            </div>
            <div>
                <h2>Ilość początkowa</h2>
                <input style="width: 97%" name="amount" type="number" step="0.1">
            </div>
            <div>
                <h2>Jednostka</h2>
                <input type="text" name="unit">
            </div>
            <div>
                <h2>DO:</h2>
                <select name="type">
                    <option value="1">WYPRODUKOWANIA</option>*
                    <option value="0">ZAMÓWIENIA</option>
                </select>
            </div>
            <div>
                <h2>Kontrahent</h2>
                <select name="contractor">
                    <?php
                        foreach ($var['contractors'] as $contractor)
                        {
                            echo "<option value='".$contractor['id']."'>".$contractor['name']."</option>'";
                        }
                    ?>
                </select>
                <button class="btn_link" type="button" onclick="addContractor()">Dodaj nowego Kontrahenta</button>
                <div class="break"></div>
            </div>
            <div>
                <h2>Ilość minimalna</h2>
                <input style="width: 97%" name="minimum" type="number" step="0.1">
            </div>
            <div>
                <h2>Kategoria</h2>
                <select name="category">
                    <?php
                        foreach ($var['categories'] as $contractor)
                        {
                            echo "<option value='".$contractor['id']."'>".$contractor['name']."</option>'";
                        }
                    ?>
                </select>
                <button class="btn_link" type="button" onclick="addCategory()">Dodaj nową kategorie</button>
                <div class="break"></div>
            </div>
            <section class="section_btn">
                <a href="/Articles/"><button type="button" class="btn_link">Wróć</button></a><button name="add" class="btn_link">Dodaj</button>
            </section>

    </div>
        <div class="form_main" id="new">
            <div id="contr">

            </div>
            <div id="catego">

            </div>
        </div>
</div>
</form>
<div class="form_main" id="new">


</div>
<script type="text/javascript">
    function addContractor() {
        $("#contr").html("<div id=\"contractor_form\">\n" +
            "        <div>\n" +
            "            <input name=\"plus_contractor\" type=\"hidden\">\n" +
            "            <h2>Nazwa Kontrahenta</h2>\n" +
            "            <input type=\"text\" name=\"plus_name\">\n" +
            "        </div>\n" +
            "        <div>\n" +
            "            <h2>Adres</h2>\n" +
            "            <textarea name=\"address\"></textarea>\n" +
            "        </div>\n" +
            "        <div>\n" +
            "            <h2>Telefon</h2>\n" +
            "            <input type=\"text\" name=\"phone\">\n" +
            "        </div>\n" +
            "        <div>\n" +
            "            <h2>Adnotacja</h2>\n" +
            "            <textarea name=\"annotation\"></textarea>\n" +
            "        </div>\n" +
            "        <div class=\"section_btn\">\n" +
            "            <button type=\"button\" class=\"btn_link\" onclick=\"clearNew('contractor_form');\">Usuń formularz</button>\n" +
            "        </div>\n" +
            "    </div>");
    }
    function addCategory() {
        $("#catego").html("<div id=\"category_form\">\n" +
            "        <div>\n" +
            "            <input name=\"plus_category\" type=\"hidden\">\n" +
            "            <h2>Nazwa Kategorii</h2>\n" +
            "            <input type=\"text\" name=\"category_name\">\n" +
            "        </div>\n" +
            "        <div class=\"section_btn\">\n" +
            "            <button type=\"button\" class=\"btn_link\" onclick=\"clearNew('category_form');\">Usuń formularz</button>\n" +
            "        </div>\n" +
            "    </div>");
    }
    function clearNew(id) {
        $("#"+id).hide();
    }

</script>
