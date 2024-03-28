<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>

<h1><?php echo $title; ?></h1>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Target</th>
            <th>Max Limit</th>
            <!-- Tambahkan kolom lain sesuai kebutuhan -->
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($simple_queue)) { ?>
            <?php foreach ($simple_queue as $key => $queue) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $queue['name']; ?></td>
                    <td><?php echo $queue['target']; ?></td>
                    <td><?php echo $queue['max_limit']; ?></td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="4">No data available</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
