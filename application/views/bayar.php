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
                <form action="<?= base_url('order/bayarsekarang'); ?>" method="post">
                    <h5>Data Pembelian</h5>
                    <table class="table table-sm table-striped">
                        <?php foreach ($this->cart->contents() as $row) : ?>
                            <tr>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['qty']; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>

                    <h5>
                        Pembayaran
                    </h5>
                    <?php
                    if ($metode_bayar == 'transfer') : ?>
                        No. Rek Mandiri <br>
                        1902390393019202 <br>
                        An. Junkfood <br>
                    <?php elseif ($metode_bayar == 'ovo') : ?>
                        Ovo <br>
                    <?php elseif ($metode_bayar == 'gopay') : ?>
                        GO-PAY <br>
                    <?php endif; ?>

                    <strong>
                        <?= 'Rp. ' . number_format($this->cart->total(), '0', ',', '.'); ?>
                    </strong>
                    <div class="mt-3">
                        <input type="submit" class="btn btn-success" value="Bayar Sekarang">
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="<?= base_url('assets/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>

</body>

</html>