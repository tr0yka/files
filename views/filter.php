<? foreach($data as $elem): ?>
    <tr>
        <td><?=$elem['originalName']?></td>
        <td><?=$elem['fileType']?></td>
        <td><?=$elem['fileSize']?></td>
        <td><?=$elem['added']?></td>
    </tr>
<? endforeach; ?>
