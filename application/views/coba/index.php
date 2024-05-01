<html>
<head>
    <title>SPK Input Nilai</title>
</head>
<body>
    <h1>SPK - Input Nilai</h1>
    <form method="post" action="<?php echo site_url('Coba/check_range'); ?>">
        <label>Masukkan nilai:</label>
        <input type="number" name="value" required>
        <input type="submit" value="Cek Nilai">
    </form>
</body>
</html>
