<?php 

require '../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM tb_login
                WHERE
                nama LIKE '%$keyword%' OR
                username LIKE '%$keyword%' OR
                no_hp LIKE '%$keyword%' OR
                tgl_lahir LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%'";
$user = query($query);

?>

<table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>

                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center" style="width:200px;">Nama</th>
                            <th scope="col" class="text-center" style="width:200px;">Username</th>
                            <th scope="col" class="text-center">No. Hp</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Alamat</th>
                            <th scope="col" class="text-center" style="width:60px;">Aksi</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php $i=1;?>
                        <?php foreach ($user as $row): ?>
                        <tr>
                            <th class="text-center"><?= $i; ?></th>
                            <td class="text-center"><?= $row ["nama"]; ?></td>
                            <td class="text-center"><?= $row["username"]; ?></td>
                            <td class="text-center"><?= $row ["no_hp"]; ?></td>
                            <td class="text-center"><?= $row ["email"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td class="text-center" style="Width:78px;">
                                <a href="ubah.php?id=<?= $row["id"] ?>"">
                            <span class="fa fa-pencil-square-o"></span>
                                </a>
                                <a href="hapus.php?id=<?= $row["id"] ?>"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data user?')">
                                    <span class="fa fa-user-times"></span>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>