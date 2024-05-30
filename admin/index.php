<?php include '../classses/statistical.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <link rel="stylesheet" href="assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Admin</title>
</head>
<?php
$statistical1 = new statistical();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $getTongDoanhThuTheoNGay = $statistical1->gettongSPTheoNgay($_POST);
}
?>

<body>
    <?php include './inc/sidebar.php' ?>
    <div class="main-content">
        <?php include './inc/header.php' ?>
        <main>
            <h2 class="dash-title">Overview</h2>

            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-briefcase"> </span>
                        <div class="card-body-DT">
                            <?php
                            $statistical = new statistical();
                            $getTongDoanhThu = $statistical->gettongDoanhThu();
                            $total0 = 0;
                            while ($result = $getTongDoanhThu->fetch_assoc()) {
                                $total0 += $result['total'];
                            }
                            ?>
                            <h5> Total Revenue</h5>
                            <h4><?php echo "RM" . number_format($total0, 2, '.', '')  ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-reload"> </span>
                        <div class="card-body-DT">
                            <?php
                            $statistical = new statistical();
                            $getTongDoanhThu = $statistical->gettongKhachHang();
                            $dem = 0;
                            while ($result = $getTongDoanhThu->fetch_assoc()) {
                                $dem++;
                            }
                            ?>
                            <h5> Quantity Customer</h5>
                            <h4><?php echo $dem ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">

                        <span class="ti-check-box"> </span>
                        <div class="card-body-DT">
                            <?php
                            $statistical = new statistical();
                            $getTongDoanhThu = $statistical->gettongSP();
                            $dem = 0;
                            while ($result = $getTongDoanhThu->fetch_assoc()) {
                                $dem++;
                            }
                            ?>
                            <h5>Quantity Products</h5>
                            <h4><?php echo $dem ?></h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View all</a>
                    </div>
                </div>
            </div>
            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Product Statistics</h3>
                        <div>
                            <form method="POST" action="">
                                <div class="activity-card-calendar">
                                   
                                        <div class="input-group mb-3">
                                            <input id="datePickerId" value="2021-01-01" name="date1" type="date" data-date-inline-picker="true" />
                                        </div>
                                        <div class="input-group mb-3">
                                            <input id="datePickerId" value="2022-12-30" name="date2" type="date" data-date-inline-picker="true" />
                                        </div>
                                        <div class="input-group1 mb-3">
                                            <input id="submit" name="submit" type="submit" value="Search">
                                        </div>
                                   
                                </div>
                                <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Quantity sold</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if (isset($getTongDoanhThuTheoNGay) && $getTongDoanhThuTheoNGay) {
                                            $totalquantity = 0;
                                            $sumDT = 0;
                                            while ($result_dtngay = $getTongDoanhThuTheoNGay->fetch_assoc()) {
                                                $totalquantity += $result_dtngay['value_count'];
                                                $sumDT += $result_dtngay['value_sumTT'];
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $result_dtngay['productName'] ?></td>
                                                        <td><img src="upload/<?php echo $result_dtngay['image'] ?>" alt="" style="width: 100px;"></td>
                                                        <td><?php echo "RM" . number_format($result_dtngay['price'], 2, '.', '');   ?></td>
                                                        <td><?php echo  $result_dtngay['value_count'] ?></td>

                                                        <td><?php echo "RM" . number_format($result_dtngay['value_sumTT'], 2, '.', ''); ?></td>
                                                    </tr>

                                                <?php
                                            }
                                                ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    Quantity Products sold : <?php echo $totalquantity ?>
                                                </td>
                                                <td>
                                                    Total sales : <?php echo "RM" . number_format($sumDT, 2, '.', ''); ?>
                                                </td>
                                                </tbody>
                                            <?php
                                        } else {
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4" style="text-align:center">No products found within this time frame</td>
                                                    </tr>
                                                </tbody>
                                            <?php
                                        }
                                            ?>
                                    </table>
                                    <?php
                                    //}
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
<link rel='stylesheet' href='https://cdn.oesmith.co.uk/morris-0.5.1.css'>
<link rel="stylesheet" href="./style.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js'></script>
<script text="text/javascript  ">
    var data = [{
                y: '2014',
                a: 50,
                b: 90
            },
            {
                y: '2015',
                a: 65,
                b: 75
            },
            {
                y: '2016',
                a: 50,
                b: 50
            },
            {
                y: '2017',
                a: 75,
                b: 60
            },
            {
                y: '2018',
                a: 80,
                b: 65
            },
            {
                y: '2019',
                a: 90,
                b: 70
            },
            {
                y: '2020',
                a: 100,
                b: 75
            },
            {
                y: '2021',
                a: 115,
                b: 75
            },
            {
                y: '2022',
                a: 120,
                b: 85
            },
            {
                y: '2023',
                a: 145,
                b: 85
            },
            {
                y: '2024',
                a: 160,
                b: 95
            }
        ],
        config = {
            data: data,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Products sold', 'Revenue'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors: ['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors: ['gray', 'red']
        };
    config.element = 'stacked';
    config.stacked = true;
    Morris.Bar(config);
    Morris.Donut({
        element: 'pie-chart',
        data: [{
                label: "Products",
                value: <?php echo $demSP ?>
            },
            {
                label: "Employee",
                value: <?php echo $countAdmin ?>
            },
            {
                label: "Customer",
                value: <?php echo $demKH ?>
            }
        ]
    });
</script>

</html>