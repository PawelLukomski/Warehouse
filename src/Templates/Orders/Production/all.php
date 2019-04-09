<?php
$articles = $var['articles'];
$status = [0=>"style='background: red;  color: #fff'", 1=>"style='background: orangered;  color: #fff'", 2=>"style='background: green;  color: #fff'"];
$statusName = [1=>'NIE ZREALIZOWANE', 2=>'ZREALIZOWANE'];
?>
<h1>Zamówienia</h1>
<section class="section_btn">
    <a href="/OrdersProduction/add" ><button class="btn_link">Dodaj Zamówienie</button></a>
</section>
<table>
    <tr>
        <th>NAZWA Produktu</th> <th> AKTUALNA ILOŚĆ</th> <th>Ilość do zrealizowania</th> <th>STATUS</th> <th>AKCJA</th>
    </tr>
    <?php
    foreach ($var['orders'] as $order)
    {

        echo "<tr>
                    <td " . $status[$order['status']] . ">" . $articles[$order['id_product']]['name'] . "</td>
                    <td ".$status[$order['status']].">" . $articles[$order['id_product']]['amount'] . "</td>
                    <td ".$status[$order['status']].">" . $order['amount'] . "</td>
                    
                    <td ".$status[$order['status']].">".$statusName[$order['status']]."</td>
        
                    <td ".$status[$order['status']]."><button class='btn_link' onclick='accept(".$order['id'].", ".$order['amount'].")'>ZREALIZUJ</button>
                        <br>
                        <a href='/OrdersProduction/Details/".$order['id']."'><button  style='background: #eee; color: #a31f1b' class='btn_link'>SZCZEGÓŁY</button> </a>
                    </td>
                  </tr>
            ";


    }
    ?>
</table>
<script type="text/javascript">
    function accept(id, amount) {
        var accepted = prompt("ILOŚĆ DO ZAAKCEPTOWANIA","");
        if(accepted >= amount)
        {
            window.location = "/OrdersProduction/edit/"+id;
        }
        else
        {
            var how = amount - accepted;
            window.location = "/OrdersProduction/edit/"+id+"/"+how;
        }
    }
</script>
