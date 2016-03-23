<? foreach($data as $elem): ?>
    <tr>
        <td><?=$elem['originalName']?></td>
        <td><?=$elem['fileType']?></td>
        <td><?=$elem['fileSize']?></td>
        <td><? $data = new Datetime($elem['added']); echo $data->format('d-m-Y H:i:s'); ?></td>
    </tr>
<? endforeach; ?>
