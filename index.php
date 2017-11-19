<?php
include ("conectare.php");
include ("page_top.php");
include ("meniu.php");
?>

    <td valign="top">
    <h1>Prima pagina</h1>
    <b>Cele mai noi carti</b>
    <table cellpadding="5">
        <tr>

            <?php
            $sql = "SELECT id_carte,titlu,nume_autor,pret FROM cartti,autori WHERE carti.id_autor=autori.id_autor ORDER BY data DESC LIMIT 0,3";
            $resursa = mysqli_query($sql);
            while($row = mysqli_fetch_array($resursa))
            {
                /*deschidem celula tabelului html*/
                print '<td align="center">';
                $adresaImagine = "coperte".$row['id_carte'].".jpg";
                if(file_exists($adresaImagine))
                {
                    print '<img src="'.$adresaImagine.'" width="75" height="100"><br>';
                }
                else
                    print '<b><a href="carte.php?id_carte='.$row['id_carte'].'">'.$row['titlu'].'</a></b><br> de <i>'.$row['nume_autor'].'</i><br> Pret: '.row['pret'].'lei</td>';
            }
            ?>
        </tr>
    </table>
    <hr>
    <b>Cele mai populare carti</b>
    <table cellpadding="5">
        <tr>
<?php
$sqlVanzari = "SELECT id_carte,sum(nr_buc) AS bucatiVandute FROM vanzari GROUP BY id_carte ORDER BY bucatiVandute DESC LIMIT 0,3";
$resursaVanzari = mysqli_query($sqlVanzari);
while($rowVanzari = mysqli_fetch_array($resursaVanzari))
{
    $sqlCarte = "SELECT titlu,nume_autor,pret FROM carti,autori WHERE carti.id_autor=autori.id_autor AND id_carte=".$rowVanzari['id_carte'];
    $resursaCarte = mysqli_query($sqlCarte);
}
?>