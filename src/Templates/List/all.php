<?php
?>
<h1>Lista artykułów do wyprodukowania</h1>
<table class="sortable">
    <thead>
    <tr>
        <th>NAZWA</th> <th>Ilość do wyprodukowania</th> <th>AKCJA</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($var['orders'] as $order)
    {
        echo "<tr>
                    <td>".$var['articles'][$order['id_article']]['name']."</td>
                    <td>".$order['amount']."</td>
                    <td>
                        <button onclick='accept(".$order['id'].", ".$order['amount'].")' class='btn_link'>Zaakceptuj</button>
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
    function accept(id, amount) {
        var how = prompt("Ilość do zaakceptowania", "");
        if(how >= amount)
        {
            window.location = "/List/accept/"+id;
        }
        else
        {
            var left = amount - how;
            alert("Zostało do wyprodukowania: "+left);
            window.location = "/List/edit/"+id+"/"+left;
        }
    }
</script>
