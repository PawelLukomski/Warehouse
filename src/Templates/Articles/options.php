<?php
?>
<h1>Ruch Artykułu</h1>
<div class="forms_container">
    <div class="form_main">
        <form method="post">
            <div>
                <h2>Artykuł</h2>
                <select name="id_article">
                    <?php
                        foreach ($var['articles'] as $article)
                            echo "<option value='".$article['id']."'>".$article['name']." - [".$article['unit']."]</option>";
                    ?>
                </select>
            </div>
            <div class="break"></div>
            <select name="option">
                <option value="in" onclick="change('WEJŚCIE');">WEJŚCIE</option>
                <option value="out" onclick="change('WYJŚCIE');">WYJŚCIE</option>
            </select>
            <div>
                <h2>Ilość</h2>
                <input style="width: 97%" name="amount" type="number" step="0.1">
            </div>
            <section class="section_btn">
                <a href="/Contractors/"><button type="button" class="btn_link">Wróć</button></a><button id="accept" name="move" class="btn_link">Akceptuj </button>
            </section>
        </form>
    </div>
</div>
<script type="text/javascript">
    $("#accept").html("Akceptuj WEJŚCIE Artykułu");
    function change(text) {
        $("#accept").html('Akceptuj '+text+" Artykułu");
    }
</script>