<table id="draf" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nisn</th>
            <th>Alamat</th>
            <th>No hp</th>
            <th>date Cretaed</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="murid">
        <?php foreach ($murid as $mr) : ?>
            <tr>
                <td><?= $mr['id']; ?></td>
                <td><?= $mr['nama']; ?></td>
                <td><?= $mr['nisn']; ?></td>
                <td><?= $mr['alamat']; ?></td>
                <td><?= $mr['nohp']; ?></td>
                <td><?= $mr['created_at']; ?></td>
                <td>
                    <a href="#" id="view" class="btn btn-info"> View</a>
                    <a href="#" id="edit" class="btn btn-warning"> Edit</a>
                    <a href="#" id="delete" class="btn btn-danger"> Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>