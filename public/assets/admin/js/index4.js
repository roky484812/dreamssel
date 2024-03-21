

function projectTracked() {
  
	var chartdata3 = [
		{
		  name: 'Project In',
		  type: 'bar',
		  stack: 'Stack',
		  barMaxWidth: 18,
		  data: [1453, 3425, 7654, 3245, 4532, 5643, 7635, 5465, 6754, 5432, 5435, 6545],
		  itemStyle: {
                normal: {
                    barBorderRadius: [0] ,
				}
		  }
		},
		{
		  name: 'Project take',
		  type: 'bar',
		  stack: 'Stack',
		  barMaxWidth:18,
		  data: [1123, 2435, 5463, 1245, 3245, 4534, 5435, 3452, 5432, 3452, 2564, 3456 ],
		  itemStyle: {
                normal: {
                    barBorderRadius: [0] ,
				}
		  }
		},
		{
		  name: 'On Hold',
		  type: 'bar',
		  stack: 'Stack',
		  barMaxWidth:18,
		  data: [330, 990, 2191, 2000, 1287, 1109, 2013, 1322, 1980, 2971, 3089, 1234],
		  itemStyle: {
                normal: {
                    barBorderRadius: [50, 50, 0, 0] ,
				}
		  }
		}
	];

	var option5 = {
		grid: {
		  top: '6',
		  right: '0',
		  bottom: '17',
		  left: '40',
		},
		tooltip: {
			show: true,
			showContent: true,
			alwaysShowContent: true,
			triggerOn: 'mousemove',
			trigger: 'axis',
			axisPointer:
			{
				label: {
					show: false,
				}
			}

		},
		xAxis: {
		  data: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
		  axisLine: {
			lineStyle: {
			  color: 'rgba(67, 87, 133, .09)'
			}
		  },
		  axisLabel: {
			fontSize: 10,
			color: '#8e9cad'
		  }
		},
		yAxis: {
		  splitLine: {
			lineStyle: {
			  color: 'rgba(67, 87, 133, .09)'
			}
		  },
		  axisLine: {
			lineStyle: {
			  color: 'rgba(67, 87, 133, .09)'
			}
		  },
		  axisLabel: {
			fontSize: 10,
			color: '#8e9cad'
		  }
		},
		series: chartdata3,
		color:[ myVarVal, '#f72d66','#cedbfd']
	};
	var chart5 = document.getElementById('projectTracked');
	var barChart5 = echarts.init(chart5);
	barChart5.setOption(option5);
	window.addEventListener('resize',function(){
		barChart5.resize();
	})

}

function chartcircleprimary() {
	$('#chart-circle-primary').circleProgress({
		fill: {
			color: myVarVal
		},
		emptyFill: hexToRgba(myVarVal, 0.4),
	})
}

function chartcircleprimary1() {
	$('#chart-circle-primary1').circleProgress({
		fill: {
			color: myVarVal
		},
		emptyFill: hexToRgba(myVarVal, 0.4),
	})
}

function chartcircleprimary2() {
	$('#chart-circle-primary2').circleProgress({
		fill: {
			color: myVarVal
		},
		emptyFill: hexToRgba(myVarVal, 0.4),
	})
}

function chartcircleprimary3() {
	$('#chart-circle-primary3').circleProgress({
		fill: {
			color: myVarVal
		},
		emptyFill: hexToRgba(myVarVal, 0.4),
	})
}