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
                <li class="nav-item"><a href="<?= base_url(); ?>" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="<?= base_url('home/cart'); ?>" class="nav-link">Keranjang <span class="badge badge-light"><?= $this->cart->total_items(); ?></span></a></li>
            </ul>
        </div>
    </nav>

    <div class="container bg-light mt-3 py-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <ul class="nav nav-tabs" id="menuTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="food-tab" data-toggle="tab" href="#food" role="tab">Makanan</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="beverage-tab" data-toggle="tab" href="#beverage" role="tab">Minuman</a>

                    </li>
                </ul>
                <div class="tab-content" id="foodTabContent">
                    <div class="p-2 tab-pane fade show active" id="food" role="tab">
                        <?php foreach ($food as $fdrow) : ?>
                            <div class="food-item mb-1" style="border: 1px solid #eaedef">
                                <div class="row no-gutters">
                                    <div class="col-4"><img class="img-fluid" src="<?= base_url('assets/img/') . $fdrow['gambar']; ?>" alt=""></div>
                                    <div class="col-8 p-1 pl-2">
                                        <h5 class="food-name text-dark mb-1"><?= $fdrow['nama']; ?></h5>
                                        <div class="row no-gutters">
                                            <div class="col">
                                                <p class="harga mb-1" style="font-size: 14px;"><?= 'Rp. ' . number_format($fdrow['harga'], '0', ',', '.'); ?></p>
                                            </div>
                                            <div class="col text-right">
                                                <button type="button" class="btn btn-sm btn-primary orderbtn" data-foodid="<?= $fdrow['id']; ?>">Order</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="foodModal" tabindex="-1" role="dialog" aria-labelledby="foodModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="foodModalLabel">Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('food/order'); ?>" method="post">
                                        <input type="hidden" name="foodid" id="foodid">
                                        <div class="form-group">
                                            <label for="quantity-input">Jumlah</label>
                                            <input type="number" name="jumlah" class="form-control" id="quantity-input" aria-label="Text input with segmented dropdown button">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <input type="submit" class="btn btn-primary" value="Order">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 tab-pane fade" id="beverage" role="tab">
                        <?php foreach ($drink as $fdrow) : ?>
                            <div class="food-item mb-1" style="border: 1px solid #eaedef">
                                <div class="row no-gutters">
                                    <div class="col-4"><img class="img-fluid" src="<?= base_url('assets/img/') . $fdrow['gambar']; ?>" alt=""></div>
                                    <div class="col-8 p-1 pl-2">
                                        <h5 class="food-name text-dark mb-1"><?= $fdrow['nama']; ?></h5>
                                        <div class="row no-gutters">
                                            <div class="col">
                                                <p class="harga mb-1" style="font-size: 14px;"><?= 'Rp. ' . number_format($fdrow['harga'], '0', ',', '.'); ?></p>
                                            </div>
                                            <div class="col text-right">
                                                <button type="button" class="btn btn-sm btn-primary orderbtn" data-foodid="<?= $fdrow['id']; ?>">Order</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?= base_url('assets/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.orderbtn').on('click', function() {
                $('#foodModal').modal('show');
                var id = $(this).data('foodid');
                console.log(id);
                $('#foodid').val(id);
                $('#quantity-input').val(1);
            });

        });
    </script>
</body>

</html>