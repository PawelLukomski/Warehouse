<?php
?>
<h1>Dodaj Produkt</h1>
<div class="forms_container">
    <div class="form_main">
        <form method="post" ENCTYPE="multipart/form-data">
        <div>
            <h2>Nazwa produktu</h2>
            <input type="text" name="name">
        </div>
        <div>
            <h2>Dodaj materiał</h2>
            <button type="button" onclick="addArt()" class="btn_link">Dodaj</button>
            <div id="articles" style="padding-left: 50px;">
                <div id="template_form">
                    <h2>Wybierz Artykuł</h2>
                    <select name="article[0][id_product]">
                        <div id="options">
                            <?php
                                foreach ($var['articles'] as $article)
                                    echo "<option value='".$article['id']."'>".$article['name']."</option>";
                            ?>
                        </div>
                    </select>
                    <h2>Ilość potrzebna na produkt</h2>
                    <input type='number' step='0.1' name='article[0][amount]'>
                </div>
            </div>
        </div>
            <div>
                <h2>Ilość początkowa</h2>
                <input type='number' step='0.1' name='amount'>
            </div>
        <div>
            <h2>Adnotacja produktu</h2>
            <textarea name="annotation"></textarea>
        </div>
        <div>
            <h2>Załączone pliki</h2>
            <button type="button" class="btn_link" onclick="addFile()">Dodaj plik</button>
            <input type="file" name="file[0]">
            <div class="break"></div>
            <div id="rest_files">

            </div>
        </div>
        <div class="section_btn">
            <button class="btn_link" name="add">Dodaj</button>
        </div>
    </form>
    </div>

</div>
<script type="text/javascript">

    var counter = 1;

    function addArt() {
        $("#articles").append("<div id=\"article-box"+counter+"\">\n" +
            "<div class=\"break\"></div>"+
"                    <h2>Wybierz Artykuł</h2>\n"+
"                    <select name=\"article["+counter+"][id_product]\">\n"+
"                        <div id=\"options\">\n"+
            <?php
            foreach ($var['articles'] as $article)
                echo "\"<option value='".$article['id']."'>".$article['name']."</option>\"+";
            ?>
"                        </div>\n"+
"                    </select>\n"+
"                    <h2>Ilość potrzebna na produkt</h2>\n"+
"                    <input type='number' step='0.1' name='article["+counter+"][amount]'>\n"+
"                <button style='width: 100px' class='btn_link' type='button' onclick='removeArt("+counter+")'>Confnij artykuł</button></div>" +
            "<div class=\"break\"></div>");
        counter++;
    }

    function removeArt(idRm) {
        $("#article-box"+idRm).remove();
    }

    var fileCount = 1;
    function addFile() {
        $("#rest_files").append("<div id='file"+fileCount+"'><div class=\"break\"></div><input type=\"file\" name=\"file["+fileCount+"]\"><button type='button' onclick='removeMe("+fileCount+")' id='btn"+fileCount+"' class='btn_link' style='width: 100px;'>Usuń plik</button><div class=\"break\"></div> </div>");
        fileCount++;
    }
    function removeMe(idFile) {
        $("#file"+idFile).remove();
    }
</script>
