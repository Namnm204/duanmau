<div class="row2">
    <div class="row2 font_title">
        <h1>BIỂU ĐỒ THEO DANH MỤC</h1>
    </div>
    <div class="row2 form_content ">
        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
        </div>
        <script>
            google.charts.load('current', { 'packages': ['corechart'] });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                // Set Data
                const data = google.visualization.arrayToDataTable([
                    ['Contry', 'Mhl'],
                    <?php
                    $tongdm = count($listthongke);
                    $i = 1;
                        foreach ($listthongke as $thongke) {
                            extract($thongke);
                            if ($i == $tongdm) {
                                $dauphay = "";
                            }else{
                                $dauphay = ",";
                            }
                            echo "['".$thongke['tendm']."', ".$thongke['countsp']."]".$dauphay;
                            $i += 1;
                        }
                    ?>
                ]);

                // Set Options
                const options = {
                    title: 'Thống kê sản phẩm theo danh mục',
                    is3D: true
                };

                // Draw
                const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);

            }
        </script>
    </div>
</div>