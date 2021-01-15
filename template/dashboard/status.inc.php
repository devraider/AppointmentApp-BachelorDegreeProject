<script type="text/javascript">
$.ajax({
	method: "GET",
	url: "../../licenta/dashboard/get_status.php",
	success: function (data) {
		data = JSON.parse(data);
		var options = {
			exportEnabled: true,
			animationEnabled: true,
			title:{
				text: "Status Email/SMS"
			},
			legend:{
				horizontalAlign: "right",
				verticalAlign: "center"
			},
			data: [{
				type: "pie",
				showInLegend: true,
				toolTipContent: "<b>{name}</b>: {y} (#percent%)",
				indexLabel: "{name}",
				legendText: "{name} (#percent%)",
				indexLabelPlacement: "inside",
				dataPoints: [
					{ y: parseInt(data['emails']), name: "Emails Trimise" },
					{ y: parseInt(data['sms']), name: "SMS Trimise" }
				]
			}]
		};
		$("#chartContainer").CanvasJSChart(options);
		console.log(data);
		$("#counter1").text(data["programari"]);
		$("#counter2").text(data["count_emails"]);
		$("#counter3").text(data["count_phone"]);
  	$('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });


	} });
</script>

<style media="screen">
.counter
{
    background-color: #f5f5f5;
    text-align: center;
}
.design
{
    margin-top: 70px;
    margin-bottom: 70px;
}
.counter-count
{
    font-size: 20px;
    background-color: #00b3e7;
    border-radius: 50%;
    position: relative;
    color: #ffffff;
    text-align: center;
    line-height: 122px;
    width: 122px;
    height: 122px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    display: inline-block;
}

.titles
{
    font-size: 20px;
    color: #000000;
    line-height: 34px;
}
</style>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<div class="counter">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="design">
                    <p class="counter-count" data-count="0" id="counter1">0</p>
                    <p class="titles">Total Programari</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="design">
                    <p class="counter-count" data-count="0" id="counter2" >0</p>
                    <p class="titles">Total Email Clienti</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="design">
                    <p class="counter-count" ata-count="0" id="counter3">0</p>
                    <p class="titles">Total Nr.Tel. Clienti</p>
                </div>
            </div>

        </div>
    </div>
</div>
