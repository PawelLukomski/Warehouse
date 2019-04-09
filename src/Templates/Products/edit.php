<?php
$product = $var['product'];
?>
<h1>Edutyj produkt</h1>
<div class="forms_container">
    <div class="form_main">
        <form method="post" ENCTYPE="multipart/form-data">
            <div>
                <h2>Nazwa produktu</h2>
                <input type="text" value="<?php echo $product['name']; ?>" name="name">
            </div>
            <div>
                <h2>Edytuj materiały</h2>
                <button type="button" onclick="addArt()" class="btn_link">Dodaj materiał</button>
                <div id="articles" style="padding-left: 50px;">
                    <div id="template_form">
                        <h2>Edytuj Artykuł</h2>
                        <?php
                            $counter = 0;
                            foreach ($var['articles_product'] as $articleP)
                            {
                                echo "<div id='existed".$articleP['id']."'><select name=\"article[".$articleP['id']."][id_product]\">
                                    <div id=\"options\">";
                                        foreach ($var['articles'] as $article) {
                                            if($article['id'] === $articleP['id_article'])
                                                echo "<option value='" . $article['id'] . "' selected>" . $article['name'] . "</option>";
                                            else
                                                echo "<option value='" . $article['id'] . "'>" . $article['name'] . "</option>";
                                        }
                                    echo "
                                    </div>
                                </select>
                                
                                <h2>Ilość potrzebna na produkt</h2>
                                <input type='number' step='0.1' value='".$articleP['amount']."' name='article[".$articleP['id']."][amount]'>
                                <button type='button' class='btn_link' style='width: 100px;' onclick='removeExist(".$articleP['id'].")'>USUŃ</button>
                                </div>";
                                $counter++;
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div>
                <h2>Ilość początkowa</h2>
                <input type='number' value="<?php echo $product['amount']; ?>" step='0.1' name='amount'>
            </div>
            <div>
                <h2>Adnotacja produktu</h2>
                <textarea name="annotation"><?php echo $product['annotation']; ?></textarea>
            </div>
            <div>
                <h2>Załączone pliki</h2>
                <button type="button" class="btn_link" onclick="addFile()">Dodaj plik</button>
                <div id="rest_files">

                </div>
            </div>
            <div class="section_btn">
                <button class="btn_link" name="edit">Dodaj</button>
            </div>
        </form>
    </div>
    <div class="form_main">
        <h2>Załączone pliki:</h2>
        <ul>
            <?php
                foreach ($var['files'] as $file)
                    echo "<a href='//".__DIR__."/../../../resources/files/".$file['file']."'><li>".$file['file']."</li><br></a>";
            ?>
        </ul>
    </div>

</div>
<script type="text/javascript">

    var counter = 1;

    function removeExist(id) {
        $("#existed"+id).html("<input type='hidden' value='"+id+"' name='to_remove[]'>");
    }

    function addArt() {
        $("#articles").append("<div id=\"article-box"+counter+"\">\n" +
            "<div class=\"break\"></div>"+
            "                    <h2>Wybierz Artykuł</h2>\n"+
            "                    <select name=\"article[new"+counter+"][id_product]\">\n"+
            "                        <div id=\"options\">\n"+
            <?php
            foreach ($var['articles'] as $article)
                echo "\"<option value='".$article['id']."'>".$article['name']."</option>\"+";
            ?>
            "                        </div>\n"+
            "                    </select>\n"+
            "                    <h2>Ilość potrzebna na produkt</h2>\n"+
            "                    <input type='number' step='0.1' name='article[new"+counter+"][amount]'>\n"+
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
