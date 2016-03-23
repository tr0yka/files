<div id="table_container">
    <table id="file_list">
        <thead>
            <tr>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <? foreach($data as $elem){?>
            <td><?=$elem?></td>
            <?}?>
            </tr>
        </tbody>
    </table>
</div>