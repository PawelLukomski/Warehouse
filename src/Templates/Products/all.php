<?php
?>
<h1>Wszystkie Produkty</h1>
<div class="section_btn">
    <a href="/Products/Add/"><button class="btn_link">Dodaj artykuł</button></a>
</div>
<table class="sortable">
    <thead>
    <tr>
        <th id="byName">NAZWA PRODUKTU</th> <th>ILOŚĆ</th> <th>Ostatni czas zmiany ilości</th> <th>Adnotacje</th> <th>AKCJA</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($var['products'] as $product)
    {
        //$amount = preg_replace("/\./m", ".", $var['amount'][$product['id']]);
        echo "<tr id='".$product['id']."'>
                    <td>".$product['name']."</td>
                    <td>".$product['amount']."</td>
                    <td>".$product['last_inner_date']."</td>
                    <td>".$product['annotation']."</td>
                    <td>
                        <a href='/Products/edit/".$product['id']."'><button class='btn_link'>Edytuj</button></a>
                        <button onclick='Confirm(".$product['id'].")' class='btn_link'>Usuń</button>
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
        var is = confirm("Na pewno chcesz usunąć produkt?");
        if(is == true)
        {
            window.location = "/Products/delete/"+id;
        }
        else
        {
            alert("Produkt NIE został usunięty.");
        }
    }
</script>