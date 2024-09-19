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
				text : 'Graphical Analysis of Flock Medication'
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
					text : 'Quantity'
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
						lineColor : '#666666',
						lineWidth : 1
					}
				}
			},
			series : [{

				name : 'Medicine Quantity/Pen',
				data : days
			}]
		});
	});
}); 