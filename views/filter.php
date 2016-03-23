<? foreach($data as $elem): ?>
    <tr>
        <td><a title="<? echo htmlspecialchars_decode($elem['comment']) ?>" href="/main/download/?file=<?=$elem['id']?>"><?=$elem['originalName']?></a></td>
        <td><?=$elem['fileType']?></td>
        <td><?=$elem['fileSize']?></td>
        <td><?=$elem['added']?></td>
        <td><? echo substr(htmlspecialchars_decode($elem['description']), 0, 200);?></td>
        <? if($_SERVER['REMOTE_ADDR'] = '127.0.0.1'): ?>
            <td><a href="/main/delete/?file=<?=$elem['id'];?>">Удалить</a></td>
        <? endif; ?>
    </tr>
<? endforeach; ?>
