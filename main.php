<?php
    session_start();
    include('dbconnect.php');
    if(isset($_SESSION['views']))
    {
        echo "SELAMAT DATANG, ",$_SESSION['nama'];
        ?>
            <form action="insert.php" method="post">
                <input type="text" name="username" required placeholder="Username">
                <input type="text" name="nama" required placeholder="Nama Lengkap">
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="paswd" required placeholder="Password">
                <input type="submit" value="Simpan">
            </form>
        <?php
        $rs = $k->query("SELECT * FROM users");
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        ?>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
        <?php
        $i = 1;
        foreach($data as $value)
        {
        ?>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $value['nama']?></td>
                <td><?php echo $value['username']?></td>
                <td><?php echo $value['email']?></td>
                <td><?php echo $value['active']==1?"Aktif":"Tidak aktif"?></td>
                <td><a href="edit.php?urut=<?php echo $value['id']?>">Edit</a> | <a href="delete.php?urut=<?php echo $value['id']?>">Delete</a></td>
            </tr>
        <?php
            $i++;
        }
        ?>
        </table>
        <?php
    }
    else
    {
        echo "session belum diset";
        echo '<a href="session.php">Set session di sini</a>';
    }
