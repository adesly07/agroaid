$(function() {
	//Highcharts with mySQL and PHP - Ajax101.com

	var months = [];
	var days = [];
	var switch1 = true;
	$.get('values.php', function(data) { // Connect to db

		data = data.split('/');
		for (var i in data) {
			if (switch1 == true) {
				months.push(data[i]);
				switch1 = false;
			} else {
				days.push(parseFloat(data[i]));
				switch1 = true;
			}

		}
		months.pop();

		$('#chart').highcharts({
			chart : {
				type : 'spline'
			},
			title : {
				text : 'Graphical Analysis of Mortality Rate'
			},
			subtitle : {
				text : ''
			},
			xAxis : {
				title : {
					text : 'Pen'
				},
				categories : months
			},
			yAxis : {
				title : {
					text : 'Mortality'
				},
				labels : {
					formatter : function() {
						return this.value
					}
				}
			},
			tooltip : {
				crosshairs : true,
				shared : true,
				valueSuffix : ''
			},
			plotOptions : {
				spline : {
					marker : {
						radius : 4,
						lineColor : '#FF0000',
						lineWidth : 1
					}
				}
			},
			series : [{

				name : 'Mortality',
				data : days
			}]
		});
	});
}); 