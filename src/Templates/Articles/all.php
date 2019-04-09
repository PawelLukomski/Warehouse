<?php
?>
<h1>Wszystkie Artykuły</h1>
<div class="section_btn">
    <a href="/Articles/Add/"><button class="btn_link">Dodaj artykuł</button></a>
</div>
<table class="sortable">
    <thead>
        <tr>
            <th id="byName">NAZWA ARTYKUŁU</th> <th onclick="sortTableN(1)">ILOŚĆ</th> <th>JEDNOSTKA</th> <th>KATEGORIA</th> <th>MINIMUM</th> <th>AKCJA</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($var['articles'] as $article)
        {
            $amount = preg_replace("/\./m", ".", $var['amount'][$article['id']]);
            echo "<tr id='".$article['id']."'>
                    <td>".$article['name']."</td>
                    <td>".$amount."</td>
                    <td>".$article['unit']."</td>
                    <td>".$var['category'][$article['id']]['name']."</td>
                    <td>".$article['minimum']."</td>
                    <td>
                        <a href='/Articles/edit/".$article['id']."'><button class='btn_link'>Edytuj</button></a>
                        <button onclick='Confirm(".$article['id'].")' class='btn_link'>Usuń</button>
                    </td>
                  </tr>
            ";
        }
    ?>
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function () {
        sorttable.makeSortable(newTableObject);
    });
</script>
<script>
    function Confirm(id) {
        var is = confirm("Na pewno chcesz usunąć artykuł?");
        if(is == true)
        {
            window.location = "/Articles/delete/"+id;
        }
        else
        {
            alert("Artykuł NIE został usunięty.");
        }
    }
</script>