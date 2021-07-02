<center><h1>filtrer classe par niveau</h1></center>
<table class="table mt-5 container table-bordered">
    <thead>
    <tr>
        <th>libelle</th>
        <th>niveau</th>
        <th>filiere</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ac as  $info):?>
        <tr>
            <td><?= $info["libelleClass"] ?></td>
            <td><?= $info["niveauClass"] ?></td>
            <td><?= $info["filiereClass"] ?></td>
        </tr>
    <?php  endforeach;?>


    </tbody>
</table>