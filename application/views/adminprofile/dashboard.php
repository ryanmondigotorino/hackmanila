<div style="display:none;" id="myDiv" class="animate-bottom">
    <div class="profile_container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <div class="card" style="width:100%;">
                    <div class="card-body">
                        <div class="profile_content">
                            <?php $this->load->view('landing/includes/messages') ?><!--Alert-->
                            <h1 class="h2"><span class="fa fa-table"></span> Top 10 Best seller</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <canvas id="canvas1"></canvas>
                                </div>
                            </div><hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <canvas id="canvas2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const CHART = $('#canvas1');
    Chart.defaults.global.animation.duration = 500;
    let barChart = new Chart(CHART,{
        type: 'bar',
        scaleBeginAtZero : true,
        data: {
            labels: ['I phone Case','Case Ring','Head Phones'],
            datasets: [
                {
                    label: 'Item Sales',
                    backgroundColor: '#937C67',
                    borderColor: '#000000',
                    data: ['0','100','30']
                }
            ]
        }
    });
    const CHART2 = $('#canvas2');
    Chart.defaults.global.animation.duration = 500;
    let barChart2 = new Chart(CHART2,{
        type: 'line',
        scaleBeginAtZero : true,
        data: {
            labels: ['January','Febuary','March','April','May','June','July','August','September','October','November','December'],
            datasets: [
                {
                    label: 'Monthly Sales',
                    backgroundColor: '#363431',
                    borderColor: '#000000',
                    data: ['0','0','0','0','0','0','0','0','0','0','50','0']
                }
            ]
        }
    });
</script>