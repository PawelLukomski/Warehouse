<?php
?>
<h1>Szczegóły zamówienia</h1>
<h2 class="h2_name"> Nazwa zamówionego produktu: [<?php echo $var['product']['name']; ?>]</h2>
<h2 class="h2_name"> Zamówiona ilość produktu: [<?php echo $var['order']['amount']; ?>]</h2>
<div class="break"></div>
<h2 class="h2_name">Artykuły do wytworzenia produktu</h2>
<table class="sortable">
    <tr>
        <th>Nazwa artykułu</th> <th>Aktualna ilość</th> <th>Potrzebna do wyprodukowania tego produktu</th> <th>Po wypordukowaniu zostanie</th> <th>Dopuszczalny stan<br> w magazynie</th> <th>Proponowana ilość do zamówienia</th> <th>Akcja</th>
    </tr>
<?php
foreach ($var['articles'] as $article)
{
    $preferAmount = $article['minimum'] + (($var['order']['amount']*$var['amounts'][$article['id']])*2);
    $howLeft = $var['amount'][$article['id']] - ($var['order']['amount'] * $var['amounts'][$article['id']]);
    echo "
    <tr>
        <td>".$article['name']."</td>
        <td>".$var['amount'][$article['id']]."</td>
        <td>".$var['order']['amount'] * $var['amounts'][$article['id']]."</td>
        <td>".$howLeft."</td>
        <td>".$article['minimum']."</td>
        <td>".$preferAmount." [".$article['unit']."]</td>
        <td> <button class='btn_link'>ZAMÓW</button> </td>
    </tr>
    
    ";
}
?>
</table>
