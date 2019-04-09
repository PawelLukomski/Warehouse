<?php
$articles = $var['articles'];
$status = [0=>"style='background: red;  color: #fff'", 1=>"style='background: orangered;  color: #fff'", 2=>"style='background: green;  color: #fff'"];
$statusName = [0=>'NIE<br>ZAMÓWIONE', 1=>'ZAMÓWIONE', 2=>'DOSTARCZONE'];
?>
<h1>Zamówienia</h1>
<div class="section_btn">
    <a href="/Orders/add"><button class="btn_link">Dodaj zamówienie</button> </a>
</div>
<table>
    <tr>
        <th>NAZWA ARTYKUŁU</th> <th> AKTUALNA ILOŚĆ</th> <th>ZAMÓWIONO</th> <th>JEDNOSTKA</th> <th>MINIMALNA ILOŚĆ</th> <th>Kontrahent</th><th>STATUS</th> <th>AKCJA</th>
    </tr>
    <?php
    foreach ($var['orders'] as $order)
    {

            echo "<tr>
                    <td " . $status[$order['status']] . ">" . $articles[$order['id_article']]['name'] . "</td>
                    <td ".$status[$order['status']].">" . $var['amount'][$articles[$order['id_article']]['id']] . "</td>
                    <td ".$status[$order['status']].">".$order['amount']."</td>
                    <td ".$status[$order['status']].">" . $articles[$order['id_article']]['unit'] . "</td>
                    <td ".$status[$order['status']].">" . $articles[$order['id_article']]['minimum'] . "</td>
                    <td ".$status[$order['status']].">" . $var['order'][$articles[$order['id_article']]['id']]['name'] . "<br> <a href='/Contractors/edit/" . $var['order'][$articles[$order['id_article']]['id']]['id'] . "'><button>Przejdź do kontrahenta</button> </a> </td>
                    
                    <td ".$status[$order['status']].">".$statusName[$order['status']]."</td>
        
                    <td ".$status[$order['status']].">ZMIEŃ NA:<Br>
                        <form method='post' action='/Orders/edit/" . $order['id'] . "'>
                            <select name='status'>
                                <option onclick='this.form.submit();' value='0'>NIE ZAMÓWIONE</option>     
                                <option onclick='howMuch(".$order['id'].")' value='1'>ZAMÓWIONE</option>     
                                <option onclick='this.form.submit();' value='2'>DOSTARCZONE</option>     
                            </select>
                        </form>
                    </td>
                  </tr>
            ";


    }
    ?>
</table>
<script type="text/javascript">
    function howMuch(id) {
        var person = prompt("Wprowadź liczbę do zamówienia", "");
        if(person != null)
        {
            window.location = "/Orders/order/"+id+"/"+person;
        }
    }
</script>
