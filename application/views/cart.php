<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>

<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a href="<?= base_url(); ?>" class="navbar-brand">Junk Food Order</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#junkfoodorder-navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="junkfoodorder-navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="<?= base_url('home/cart'); ?>" class="nav-link">Keranjang <i class="fas fa-shopping-cart"></i></a></li>
            </ul>
        </div>
    </nav>

    <div class="container bg-light mt-3 py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($this->cart->contents() as $items) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $items['name']; ?></td>
                            <td><?= $items['qty']; ?></td>
                            <td><?= 'Rp. ' . number_format($items['subtotal'], '0', ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3"></td>
                        <td><?= 'Rp. ' . number_format($this->cart->total(), '0', ',', '.'); ?></td>
                    </tr>
                </table>
                <a href="<?= base_url(); ?>" class="btn btn-primary">Lanjutkan Belanja</a>
                <a href="<?= base_url('order'); ?>" class="btn btn-success">Order</a>
            </div>
        </div>

    </div>

    <script src="<?= base_url('assets/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>

</body>

</html>