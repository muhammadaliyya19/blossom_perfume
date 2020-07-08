google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var datapendapatan = new Array();
  $.ajax({
    url: 'http://localhost/blossom_parfume/pendapatan/getAllPendapatan',
    method: 'post',
    dataType: 'json',
    success: function (data) {
      // $('#pie_chart').empty();
      // console.log(data);
      // var recentProj = 0;
      // var OnGoingProj = 0;
      // var DoneProj = 0;
      // for (i in data) {
      //   var progress = data[i].projProgress;
      //   if (progress == 0) {
      //     recentProj++;
      //   } else if (progress == 100) {
      //     DoneProj++;
      //   } else {
      //     OnGoingProj++;
      //   }
      // }

      // dataproject.push(['Recent Project', recentProj]);
      // dataproject.push(['On Going Project', OnGoingProj]);
      // dataproject.push(['Done Project', DoneProj]);

      // var dataholder = new google.visualization.DataTable();
      // dataholder.addColumn('string', 'Status');
      // dataholder.addColumn('number', 'Jumlah');

      // var options = {
      //   colors: ['#ff0000', '#00ff00', '#00ccff'],
      //   title: 'Prosentase Proyek',
      //   height: 470,
      //   width: 700

      // };

      // dataholder.addRows(dataproject);
      // var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      // chart.draw(dataholder, options);
    }
  });

  // FUNGSI APABILA GANTT DETAIL PROYEK DIKLIK

  $('.ganttPrj').on('click', function () {
    $('#chart_pie_project').empty();
    var options = {
      // 'legend':'left',
      'title': 'Prosentase Tugas',
      // 'is3D':true,
      colors: new Array(),
      'width': 700,
      'height': 400
    };

    var pid = $(this).data('pid');
    var role = $(this).data('role');
    var empid = $(this).data('empid');
    var databoard = new Array();
    // if (role=='1' || role=='3') {
    $.ajax({
      url: 'http://localhost/wpu-login/board/getBoardByProj_',
      data: { projid: pid },
      method: 'post',
      dataType: 'json',
      success: function (datab) {
        for (i in datab) {
          databoard.push(datab[i]);
          // console.log(datab[i]);
        }
      }
    });

    $.ajax({
      url: 'http://localhost/wpu-login/task/getTaskByProject',
      data: { id: pid },
      method: 'post',
      dataType: 'json',
      success: function (datatask) {
        var datatabel = new google.visualization.DataTable();
        var datapiecharttask = new Array();
        datatabel.addColumn('string', 'Status');
        datatabel.addColumn('number', 'Prosentase');
        var nameboard = "";
        for (i in databoard) {
          var count = 0;
          nameboard = databoard[i].name;
          var randomColor = "#000000".replace(/0/g, function () { return (~~(Math.random() * 16)).toString(16); });
          options.colors.push(randomColor);
          // console.log(nameboard);
          for (j in datatask) {
            if (datatask[j].status == databoard[i].id) {
              // console.log(j + ' ' + datatask[j].status)
              count++;
            }
          }
          datapiecharttask.push([nameboard, count]);
        }
        datatabel.addRows(datapiecharttask);
        var chart = new google.visualization.PieChart(document.getElementById('chart_pie_project_task'));
        chart.draw(datatabel, options);
        // console.log(datapiecharttask);
      }
    });
    // }
  });
}