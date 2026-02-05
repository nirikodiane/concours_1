<table>
  <tr style="font-weight: bold;background:lightgrey;">
  <td>Epreuves</td>
  <td>Date</td>
  <td>Heures</td>
    </tr>
    <tr>
    <td>Ecrite</td>
    <td><?php echo $dateConcours['Premier_Date']; ?></td>
    <td>14h00 à 15h30</td>
    </tr>
    <tr>
    <td>Orale</td>
    <td><?php echo $dateConcours['Premier_Date']."<br/>".$dateConcours['Deuxiem_Date']; ?></td>
    <td>à partir de 15h30<br/>à partir de 08h00</td>
    </tr>
</table>