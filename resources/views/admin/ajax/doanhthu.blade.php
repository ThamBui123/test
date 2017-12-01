<div class="row-fluid">
   <div class="span12">
     <canvas id="myChart" width="400" height="200" style="padding: 10px"></canvas>
   </div>
</div>
<script src="{{ asset('js/admin/chart.min.js') }}"></script> 
<script type="text/javascript">
	labels = [];
	data = [];
	@foreach ($doanhthu_ngay['data'] as $chitiet)
	  labels.push('ngày ' + {{ $chitiet->OrderDay }});
	  data.push({{ $chitiet->total_price }});
	@endforeach
	ctx = document.getElementById("myChart");
	myChart = new Chart(ctx, {
	    type: 'line',
	    data: {
	      labels: labels,
	      datasets: [
	        {
	          label: "Doanh thu",
	          fill: false,
	          lineTension: 0.1,
	          backgroundColor: "rgba(75,192,192,0.4)",
	          borderColor: "rgba(75,192,192,1)",
	          borderCapStyle: 'butt',
	          borderDash: [],
	          borderDashOffset: 0.0,
	          borderJoinStyle: 'miter',
	          pointBorderColor: "rgba(75,192,192,1)",
	          pointBackgroundColor: "#fff",
	          pointBorderWidth: 1,
	          pointHoverRadius: 10,
	          pointHoverBackgroundColor: "rgba(75,192,192,1)",
	          pointHoverBorderColor: "rgba(220,220,220,1)",
	          pointHoverBorderWidth: 2,
	          pointRadius: 5,
	          pointHitRadius: 10,
	          data: data,
	          spanGaps: false,
	       },
	      ]
	    },
	    options: {
	      scales: {
	        yAxes: [{
	            ticks: {
	                beginAtZero:true,
	                  callback: function(value, index, values) {
	                    if(parseInt(value) > 999){
	                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	                    } else if (parseInt(value) < -999) {
	                        return Math.abs(value).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	                    } else {
	                        return value;
	                    }
	                }
	            }
	        }],
	      },
	      legend: {
	        display: false,
	      },
	      title: {
	        display: true,
	        text: 'Biểu đồ doanh thu trong tháng {{ $doanhthu_ngay['thang'] }} năm {{ $doanhthu_ngay['nam'] }} thu được {{ number_format($doanhthu_ngay['tongtien']) }} vnđ'
	      },
	       tooltips: {
	        enabled: true,
	        mode: 'single',
	        callbacks: {
	          title: function (tooltipItems, data) { 
	          	console.log(data);
	          	return "Doanh thu " + tooltipItems[0].xLabel.toLowerCase(); 
	          },
	          label: function(tooltipItem, data) {
	            var label = 'Tổng cộng';
	            var datasetLabel = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
	            return label + ': ' + addCommas(datasetLabel) ;
	          }
	        }
	      } 
	    }
	});


function addCommas(nStr)
{
   nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
</script>