<form action="dataMahasiswa.php" method="post">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?php echo $_POST['nama'] ?? ''; ?>"><br>

    <label>Email:</label>
    <input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>"><br>

    <label>NIM:</label>
    <input type="text" name="nim" value="<?php echo $_POST['nim'] ?? ''; ?>"><br>

    <label>Password:</label>
    <input type="text" name="password" value="<?php echo $_POST['password'] ?? ''; ?>"><br>

    <input type="submit" value="Submit">
</form>