<?php
require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../root/grid.css">
    <link rel="stylesheet" href="../root/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>

    <title>Document</title>
    <style>
        #container {
            height: 400px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        #sliders td input[type="range"] {
            display: inline;
        }

        #sliders td {
            padding-right: 1em;
            white-space: nowrap;
            border: none;
        }

        table {
            all: unset;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
</head>

<body>
    <?php
    require '../root/connect.php';
    ?>
    <div class="main">
        <?php
        require './menu.php';
        ?>
        <div class="container">
            <?php require './header.php' ?>
            <div class="content">
                <h2 class="content__heading">Dashboard</h2>
                <div class="grid">
                    <div class="row">
                        <div class="col l-3">
                            <div class="statistic__item bg-info">
                                <a href="../orders/" class="statistic__item-wrap">
                                    <div class="statistic__item-info">
                                        <?php $order = "select count(*) from orders where status_id=1";
                                        $result_order = mysqli_query($connect, $order);
                                        $number_order = mysqli_fetch_array($result_order)['count(*)'];
                                        ?>
                                        <h1 class="info-item-parameter text-center"><?php echo $number_order ?></h1>
                                        <div class="info-item-name">Đơn hàng mới</div>
                                    </div>
                                    <div class="statistic-item-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                                </a>
                            </div>
                        </div>

                        <div class="col l-3">
                            <div class="statistic__item bg-success">
                                <a href="../orders/" class="statistic__item-wrap">
                                    <?php $sql_total_revenue = "select SUM(total_price) as sum from orders WHERE MONTH(CURRENT_DATE()) = MONTH(created_at)";
                                    $result_total_revenue = mysqli_query($connect, $sql_total_revenue);
                                    $total_revenue = mysqli_fetch_array($result_total_revenue)['sum'];
                                    ?>
                                    <div class="statistic__item-info">
                                        <h2 class="info-item-parameter text-center"><?php echo number_format($total_revenue, 0, 0, '.') ?>₫</h2>
                                        <div class="info-item-name">Doanh thu tháng này</div>
                                    </div>
                                    <div class="statistic-item-icon"><i class="fa-solid fa-chart-simple"></i></div>
                                </a>
                            </div>
                        </div>

                        <div class="col l-3">
                            <div class="statistic__item bg-warning">
                                <a href="../customer/" class="statistic__item-wrap">
                                    <?php $customers = "select count(*) from customers";
                                    $result_customers = mysqli_query($connect, $customers);
                                    $number_customers = mysqli_fetch_array($result_customers)['count(*)'];
                                    ?>
                                    <div class="statistic__item-info">
                                        <h2 class="info-item-parameter text-center"><?php echo $number_customers ?></h2>
                                        <div class="info-item-name">Số người dùng đăng ký</div>
                                    </div>
                                    <div class="statistic-item-icon"><i class="fa-solid fa-user"></i></div>
                                </a>
                            </div>
                        </div>

                        <div class="col l-3">
                            <div class="statistic__item bg-error">
                                <a href="../products/" class="statistic__item-wrap">
                                    <?php $products = "select count(*) from products";
                                    $result_products = mysqli_query($connect, $products);
                                    $number_products = mysqli_fetch_array($result_products)['count(*)'];
                                    ?>
                                    <div class="statistic__item-info">
                                        <h2 class="info-item-parameter text-center"><?php echo $number_products ?></h2>
                                        <div class="info-item-name">Tổng số sản phẩm</div>
                                    </div>
                                    <div class="statistic-item-icon"><i class="fa-solid fa-box-archive"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <h2>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    ?>
                </h2>

                <div class="chart">

                    <figure class="highcharts-figure">
                        <div id="container2"></div>
                        <p class="highcharts-description">
                            Biểu đồ được thiết kế để làm nổi bật các tùy chọn kết xuất biểu đồ cột 3D.
                            Di chuyển các thanh trượt bên dưới để thay đổi cài đặt 3D cơ bản cho biểu đồ.
                            Biểu đồ cột 3D thường khó đọc hơn biểu đồ 2D, nhưng mang lại hiệu ứng hình ảnh thú vị.
                        </p>
                        <div id="sliders">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><label for="alpha">Alpha Angle</label></td>
                                        <td><input id="alpha" type="range" min="0" max="45" value="15"> <span id="alpha-value" class="value"></span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="beta">Beta Angle</label></td>
                                        <td><input id="beta" type="range" min="-45" max="45" value="15"> <span id="beta-value" class="value"></span></td>
                                    </tr>
                                    <tr>
                                        <td><label for="depth">Depth</label></td>
                                        <td><input id="depth" type="range" min="20" max="100" value="50"> <span id="depth-value" class="value"></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </figure>

                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description">
                            Chart showing browser market shares. Clicking on individual columns
                            brings up more detailed data. This chart makes use of the drilldown
                            feature in Highcharts to easily switch between datasets.
                        </p>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<?php
    $sql_number_manufacturers = "select * from manufacturers";
    $result_number_manufacturers = mysqli_query($connect, $sql_number_manufacturers);
    $number_manufacturers = mysqli_fetch_array($result_number_manufacturers);

    $sql = "SELECT SUM(orders.total_price) AS total_price, manufacturers.id, manufacturers.name AS manufacturer_name 
                FROM orders JOIN order_product ON order_product.order_id = orders.id
                                JOIN products ON products.id = order_product.product_id
                                JOIN sub_categories ON products.sub_category_id = sub_categories.id
                                JOIN categories ON sub_categories.category_id = categories.id
                                JOIN manufacturers ON categories.manufacturer_id = manufacturers.id
                GROUP BY manufacturers.id";
    $resul = mysqli_query($connect, $sql);

    $arr = [];


    foreach ($result_number_manufacturers as $each_manufacturer) {
        $arr[$each_manufacturer['name']] = 0;
        foreach ($resul as $each) {
            $arr[$each['manufacturer_name']] = (float) $each['total_price'];
        }
    }


    $arrManufacturers = array_keys($arr);
    $arrDoanhThu = array_values($arr);


    $sql_monthly_revenue = "select sum(orders.total_price) as total_price, month(orders.created_at) as month from orders group by month(orders.created_at)";
    $resul_monthly_revenue = mysqli_query($connect, $sql_monthly_revenue);

    $arr_monthly_revenue = [];


    for ($i = 1; $i <= 12; $i++) {

        if (empty($arr_monthly_revenue[$i])) {
            $arr_monthly_revenue[$i] = [
                'name' => $i,
                'y' => 0,
                'drilldown' => $i
            ];
        }
    }


    foreach ($resul_monthly_revenue as $monthly_revenue) {
        $arr_monthly_revenue[$monthly_revenue['month']] = [
            'name' => (int) $monthly_revenue['month'],
            'y' => (float) $monthly_revenue['total_price'],
            'drilldown' => (int) $monthly_revenue['month']
        ];
    }

    $arrMonthlyRevenueValues = array_values($arr_monthly_revenue);
    $arrKey = array_keys($arr_monthly_revenue);


    $sql_daily_revenue = "select sum(orders.total_price) as total_price, DAY(orders.created_at) AS day, month(orders.created_at) AS month from orders group BY DAY(orders.created_at), month";
    $result_daily_revenue = mysqli_query($connect, $sql_daily_revenue);

    $arr_daily_revenue = [];

    $sql_daily_revenue = "select sum(orders.total_price) as total_price, DAY(orders.created_at) AS day, month(orders.created_at) AS month from orders group BY DAY(orders.created_at), month";
    $result_daily_revenue = mysqli_query($connect, $sql_daily_revenue);
    
    // foreach($result_daily_revenue as $each) {
    //     echo $each['total_price'];
    // }
    // die;
    $arr_daily_revenue = [];

    for ($i = 1; $i <= 12; $i++) {
        for ($j=1; $j <= cal_days_in_month(1, $i, date('Y')); $j++) { 
            if (empty($arr_daily_revenue[$i])) {
                $arr_daily_revenue[$i] = [
                    'name' => $i,
                    'id' => $i,
                ];
            }
            $arr_daily_revenue[$i]['data'][$j] = [
                $j, 0
            ];    
        }
    }

    
    foreach($result_daily_revenue as $daily_revenue) {
        $arr_daily_revenue[$daily_revenue['month']]['data'][$daily_revenue['day']] = [
            (int) $daily_revenue['day'], (int) $daily_revenue['total_price']
        ];
    }
    // echo json_encode($arr_daily_revenue);

    $dailyRevenueValue = array_values($arr_daily_revenue);
    $length = count($dailyRevenueValue);
    for ($i=0; $i < 12; $i++) { 
        $dailyRevenueValue[$i]['data'] = array_values($dailyRevenueValue[$i]['data']);
        
    }

?>
<script>

    console.log(<?php echo json_encode($arr_monthly_revenue) ?>);
    console.log(<?php echo json_encode($arrMonthlyRevenueValues) ?>);
    console.log(<?php echo cal_days_in_month(1, date('m'), date('Y')) ?>);
    // Set up the chart
    const chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container2',
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
        },
        xAxis: {
            categories: <?php echo json_encode($arrManufacturers) ?>,
            title: {}
        },
        yAxis: {
            title: {
                text: 'M (triệu đồng)',
            }
        },
        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: 'Tổng tiền: {point.y}'
        },
        title: {
            text: 'Doanh thu theo từng hãng sản xuất',
            align: 'center'
        },
        subtitle: {
            // text: 'Source: ' +
            //     '<a href="https://ofv.no/registreringsstatistikk"' +
            //     'target="_blank">OFV</a>',
            // align: 'left'
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        series: [{
            data: <?php echo json_encode($arrDoanhThu) ?>,
            colorByPoint: true
        }]
    });

    function showValues() {
        document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
        document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
        document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
    }

    // Activate the sliders
    document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
        chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
        showValues();
        chart.redraw(false);
    }));

    showValues();



    // Data retrieved from https://gs.statcounter.com/browser-market-share#monthly-202201-202201-bar

    // Create the chart
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'center',
            text: 'Doanh thu theo từng tháng'
        },
        subtitle: {
            align: 'center',
            text: 'Bấm vào các cột để xem chi tiết.'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Doanh thu'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">Doanh thu</span><br>',
            pointFormat: '<span style="color:{point.color}">Tháng: {point.name}</span>: <b>{point.y}</b><br/>'
        },

        series: [{
            name: 'Browsers',
            colorByPoint: true,
            data: <?php echo json_encode($arrMonthlyRevenueValues) ?>
        }],
        drilldown: {
            breadcrumbs: {
                position: {
                    align: 'right'
                }
            },
            series: <?php echo json_encode($dailyRevenueValue) ?>
        }
    });
</script>

</html>