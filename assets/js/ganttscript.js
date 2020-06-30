google.charts.load('current', { 'packages': ['gantt'] });
google.charts.setOnLoadCallback(drawChart);
var trackHeight = 40;
function drawChart() {
	var empRole = $('#emprole').val();
	var empId = $('#empid').val();
	// alert(empRole);
	var datatabel = new google.visualization.DataTable();
	datatabel.addColumn('string', 'Project ID');
	datatabel.addColumn('string', 'Project Name');
	datatabel.addColumn('string', 'Resource');
	datatabel.addColumn('date', 'Start Date');
	datatabel.addColumn('date', 'End Date');
	datatabel.addColumn('number', 'Duration');
	datatabel.addColumn('number', 'Percent Complete');
	datatabel.addColumn('string', 'Dependencies');

	var datatabel2 = new google.visualization.DataTable();
	datatabel2.addColumn('string', 'Task ID');
	datatabel2.addColumn('string', 'Task Name');
	datatabel2.addColumn('string', 'Resource');
	datatabel2.addColumn('date', 'Start Date');
	datatabel2.addColumn('date', 'End Date');
	datatabel2.addColumn('number', 'Duration');
	datatabel2.addColumn('number', 'Percent Complete');
	datatabel2.addColumn('string', 'Dependencies');

	if (empRole == 1) {
		var dataproject = new Array();
		$.ajax({
			url: 'http://localhost/wpu-login/project/getAllProject',
			//data:{id : id},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#chart_project').empty();
				for (i in data) {
					//alert(data[i].name);
					var id = data[i].id;
					var name = data[i].projName;
					var startDate = data[i].projStartDate;
					var endDate = data[i].projEndDate;
					var progress = data[i].projProgress;
					dataproject.push([id, name, 'Project', new Date(startDate), new Date(endDate) /*endDate*/, null, parseInt(progress), null]);
				}
				var options = {
					height: (dataproject.length * trackHeight) + 50,
					width: "100%",
					hAxis: {
						textStyle: {
							fontName: ["RobotoCondensedRegular"]
						}
					},
					gantt: {
						labelStyle: {
							fontName: ["RobotoCondensedRegular"],
							fontSize: 12,
							color: '#757575',
						},
						trackHeight: trackHeight
					}
				}
				// console.log(dataproject);					
				datatabel.addRows(dataproject);
				var chart = new google.visualization.Gantt(document.getElementById('chart_project'));
				chart.draw(datatabel, options);
			}
		});

	} else if (empRole == 3) {
		var dataprojectpm = new Array();
		$.ajax({
			url: 'http://localhost/wpu-login/project/getProjectPM',
			//data:{id : id},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#chart_projectpm').empty();
				for (i in data) {
					//alert(data[i].name);
					var id = data[i].id;
					var name = data[i].projName;
					var startDate = data[i].projStartDate;
					var endDate = data[i].projEndDate;
					var progress = data[i].projProgress;
					dataprojectpm.push([id, name, 'Project', new Date(startDate), new Date(endDate) /*endDate*/, null, parseInt(progress), null]);
				}
				var options = {
					height: (dataprojectpm.length * trackHeight) + 50,
					width: "100%",
					hAxis: {
						textStyle: {
							fontName: ["RobotoCondensedRegular"]
						}
					},
					gantt: {
						labelStyle: {
							fontName: ["RobotoCondensedRegular"],
							fontSize: 12,
							color: '#757575',
						},
						trackHeight: trackHeight
					}
				}
				// console.log(dataproject);					
				datatabel.addRows(dataprojectpm);
				var chartpm = new google.visualization.Gantt(document.getElementById('chart_projectpm'));
				chartpm.draw(datatabel, options);
			}
		});
	} else {
		var datataskemp = new Array();
		$.ajax({
			url: 'http://localhost/wpu-login/task/getTaskByEmployee',
			data: { id: empId },
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#chart_task_employee').empty();
				for (i in data) {
					var id = data[i].id;
					var name = data[i].name;
					var startDate = new Date(data[i].startDate);
					var endDate = new Date(data[i].endDate);
					datataskemp.push([id, name, 'task', new Date(startDate), new Date(endDate) /*endDate*/, null, 100, null]);
					// console.log(datatask);
					// var appendList = '<div class="card-header mb-2">'+id+'<br>'+name+'<br>'+startDate+'<br>'+endDate+'<br></div>';
					// $('#chart_div2').append(appendList);
					// console.log(data[i]);
				}
				var options = {
					height: (datataskemp.length * trackHeight) + 50,
					width: "100%",
					hAxis: {
						textStyle: {
							fontName: ["RobotoCondensedRegular"]
						}
					},
					gantt: {
						labelStyle: {
							fontName: ["RobotoCondensedRegular"],
							fontSize: 12,
							color: '#757575',
						},
						trackHeight: trackHeight
					}
				}
				datatabel2.addRows(datataskemp);
				var chart3 = new google.visualization.Gantt(document.getElementById('chart_task_employee'));
				chart3.draw(datatabel2, options);
			}
		});
	}
}

$('.ganttPrj').on('click', function () {
	// alert('diklik');
	var pid = $(this).data('pid');
	var role = $(this).data('role');
	var empid = $(this).data('empid');
	var datatask = new Array();
	// console.log(pid+ ' ' + role + ' ' + empid);			
	var datataskprj = new Array();

	var datatabel3 = new google.visualization.DataTable();
	datatabel3.addColumn('string', 'Task ID');
	datatabel3.addColumn('string', 'Task Name');
	datatabel3.addColumn('string', 'Resource');
	datatabel3.addColumn('date', 'Start Date');
	datatabel3.addColumn('date', 'End Date');
	datatabel3.addColumn('number', 'Duration');
	datatabel3.addColumn('number', 'Percent Complete');
	datatabel3.addColumn('string', 'Dependencies');

	if (role == '1' || role == '3') {
		$.ajax({
			url: 'http://localhost/wpu-login/task/getTaskByProject',
			data: { id: pid },
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#chart_task_prj').empty();
				for (i in data) {
					var id = data[i].id;
					var name = data[i].name;
					datataskprj.push([data[i].id, data[i].name, 'task', new Date(data[i].startDate), new Date(data[i].endDate) /*endDate*/, null, 100, null]);
					// console.log(datatask);
					// var appendList = '<div class="card-header mb-2">'+id+'<br>'+name+'<br>'+startDate+'<br>'+endDate+'<br></div>';
					// $('#chart_div2').append(appendList);
					// console.log(data[i]);
				}
				var options = {
					height: (datataskprj.length * trackHeight) + 50,
					width: "100%",
					hAxis: {
						textStyle: {
							fontName: ["RobotoCondensedRegular"]
						}
					},
					gantt: {
						labelStyle: {
							fontName: ["RobotoCondensedRegular"],
							fontSize: 12,
							color: '#757575',
						},
						trackHeight: trackHeight
					}
				}
				datatabel3.addRows(datataskprj);
				var chart3 = new google.visualization.Gantt(document.getElementById('chart_task_prj'));
				chart3.draw(datatabel3, options);
			}
		});
	} else {
		$.ajax({
			url: 'http://localhost/wpu-login/task/getTaskByProject',
			data: { id: pid },
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#chart_task_prj').empty();
				for (i in data) {
					var id = data[i].id;
					var name = data[i].name;
					var startDate = new Date(data[i].startDate);
					var endDate = new Date(data[i].endDate);
					var assignee = data[i].empId;
					if (assignee == empid) {
						datataskprj.push([id, name, 'task', new Date(startDate), new Date(endDate) /*endDate*/, null, 100, null]);
					}
					// console.log(datatask);
					// var appendList = '<div class="card-header mb-2">'+id+'<br>'+name+'<br>'+startDate+'<br>'+endDate+'<br></div>';
					// $('#chart_div2').append(appendList);
					// console.log(data[i]);
				}
				var options = {
					height: (datataskprj.length * trackHeight) + 50,
					width: "100%",
					hAxis: {
						textStyle: {
							fontName: ["RobotoCondensedRegular"]
						}
					},
					gantt: {
						labelStyle: {
							fontName: ["RobotoCondensedRegular"],
							fontSize: 12,
							color: '#757575',
						},
						trackHeight: trackHeight
					}
				}
				datatabel3.addRows(datataskprj);
				var chart3 = new google.visualization.Gantt(document.getElementById('chart_task_prj'));
				chart3.draw(datatabel3, options);
			}
		});
	}
});
