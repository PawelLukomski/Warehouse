<?php
?>
<h1>Wszyscy Kontrahenci</h1>
<div class="section_btn">
    <a href="/Contractors/Add/"><button class="btn_link">Dodaj Kontrahenta</button></a>
</div>
<table class="sortable">
    <thead>
        <tr>
            <th>NAZWA</th> <th>Adres</th> <th>Telefon</th> <th>Adnotacja</th> <th>AKCJA</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($var['contractors'] as $contractor)
        {
            echo "<tr>
                    <td>".$contractor['name']."</td>
                    <td>".$contractor['address']."</td>
                    <td>".$contractor['phone']."</td>
                    <td>".$contractor['annotation']."</td>
                    <td>
                        <a href='/Contractors/edit/".$contractor['id']."'><button class='btn_link'>Edytuj</button></a>
                        <a href='/Contractors/delete/".$contractor['id']."'><button class='btn_link'>Usuń</button></a>
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