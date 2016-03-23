<div id="table_container">
    <table id="file_list">
        <thead>
            <tr>
                <th>Название файла</th>
                <th>Тип файла</th>
                <th>Размер файла</th>
                <th>Дата добавления</th>
            </tr>
        </thead>
        <tbody>

            <? foreach($data as $elem){?>
                <tr>
                    <td><?=$elem['originalName']?></td>
                    <td><?=$elem['fileType']?></td>
                    <td><?=$elem['fileSize']?></td>
                    <td><?=$elem['added']?></td>
                </tr>
            <?}?>

        </tbody>
    </table>
</div>