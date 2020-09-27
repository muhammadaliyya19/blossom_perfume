google.charts.load('current', { 'packages': ['corechart', 'line'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  const dataHarian = new Array();
  $.ajax({
    url: 'http://localhost/blossom_parfume/pendapatan/getPendapatanHarian',
    method: 'post',
    dataType: 'json',
    success: function (data) {      
      var count = 0;
      for (i in data) {
        dataHarian.push([new Date(data[i].pertanggal), parseInt(data[i].pendapatan)]);        
        count++;
      }

      // console.log(dataHarian);

      $('#chart_daily').empty();
      var data = new google.visualization.DataTable();
      data.addColumn('date', 'X');
      data.addColumn('number', 'Pendapatan');
      var dummy_data = dataHarian;
      data.addRows(dummy_data);
      var options = {
        hAxis: {
          title: 'Tanggal'
        },
        vAxis: {
          title: 'Pendapatan (Rp.)'
        },
        backgroundColor: '#f1f8e9',
        height: 265,
        width: 1180
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_daily'));
      chart.draw(data, options);
    }
  });

  const dataBulanan = new Array();
  $.ajax({
    url: 'http://localhost/blossom_parfume/pendapatan/getPendapatanBulanan',
    method: 'post',
    dataType: 'json',
    success: function (data) {      
      var count = 0;
      for (i in data) {
        dataBulanan.push([new Date(data[i].pertanggal), parseInt(data[i].pendapatan)]);        
        count++;
      }

      // console.log(dataBulanan);

      $('#chart_monthly').empty();
      var data = new google.visualization.DataTable();
      data.addColumn('date', 'X');
      data.addColumn('number', 'Pendapatan');
      var dummy_data = dataBulanan;
      data.addRows(dummy_data);
      var options = {
        hAxis: {
          title: 'Tanggal'
        },
        vAxis: {
          title: 'Pendapatan (Rp.)'
        },
        backgroundColor: '#f1f8e9',
        height: 265,
        width: 1180
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_monthly'));
      chart.draw(data, options);
    }
  });

  const dataTahunan = new Array();
  $.ajax({
    url: 'http://localhost/blossom_parfume/pendapatan/getPendapatanTahunan',
    method: 'post',
    dataType: 'json',
    success: function (data) {      
      var count = 0;
      for (i in data) {
        dataTahunan.push([new Date(data[i].pertanggal), parseInt(data[i].pendapatan)]);        
        count++;
      }

      // console.log(dataTahunan);

      $('#chart_yearly').empty();
      var data = new google.visualization.DataTable();
      data.addColumn('date', 'X');
      data.addColumn('number', 'Pendapatan');
      var dummy_data = dataTahunan;
      data.addRows(dummy_data);
      var options = {
        hAxis: {
          title: 'Tanggal'
        },
        vAxis: {
          title: 'Pendapatan (Rp.)'
        },
        backgroundColor: '#f1f8e9',
        height: 265,
        width: 1180
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_yearly'));
      chart.draw(data, options);
    }
  });
}

$(function() {
  $('.pendapatan_outlet').on('click', function() {
    const outlet = $(this).data('outlet');
    const dataHarian = new Array();
    $.ajax({
      url: 'http://localhost/blossom_parfume/pendapatan/getPendapatanHarian',
      method: 'post',
      data: { id: outlet },
      dataType: 'json',
      success: function (data) {      
        console.log(data);
        var count = 0;
        for (i in data) {
          dataHarian.push([new Date(data[i].pertanggal), parseInt(data[i].pendapatan)]);        
          count++;
        }

        // console.log(dataHarian);

        $('#chart_daily').empty();
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'X');
        data.addColumn('number', 'Pendapatan');
        var dummy_data = dataHarian;
        data.addRows(dummy_data);
        var options = {
          hAxis: {
            title: 'Tanggal'
          },
          vAxis: {
            title: 'Pendapatan (Rp.)'
          },
          backgroundColor: '#f1f8e9',
          height: 265,
          width: 1180
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_daily'));
        chart.draw(data, options);
      }
    });
  });

  $('.harian').on('click', function() {
    const outlet = $(this).data('outlet');
    const dataHarian = new Array();
    $.ajax({
      url: 'http://localhost/blossom_parfume/pendapatan/getPendapatanHarian',
      method: 'post',
      data: { id: outlet },
      dataType: 'json',
      success: function (data) {      
        console.log(data);   
        var count = 0;
        for (i in data) {
          dataHarian.push([new Date(data[i].pertanggal), parseInt(data[i].pendapatan)]);        
          count++;
        }

        // console.log(dataHarian);

        $('#chart_daily').empty();
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'X');
        data.addColumn('number', 'Pendapatan');
        var dummy_data = dataHarian;
        data.addRows(dummy_data);
        var options = {
          hAxis: {
            title: 'Tanggal'
          },
          vAxis: {
            title: 'Pendapatan (Rp.)'
          },
          backgroundColor: '#f1f8e9',
          height: 265,
          width: 1180
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_daily'));
        chart.draw(data, options);
      }
    });
  });

  $('.bulanan').on('click', function() {
    const outlet = $(this).data('outlet');
    // console.log(outlet + " bulanan");
    const dataBulanan = new Array();
    $.ajax({
      url: 'http://localhost/blossom_parfume/pendapatan/getPendapatanBulanan',
      method: 'post',
      data: { id: outlet },
      dataType: 'json',
      success: function (data) {      
        var count = 0;
        for (i in data) {
          dataBulanan.push([new Date(data[i].pertanggal), parseInt(data[i].pendapatan)]);        
          count++;
        }

        // console.log(dataBulanan);

        $('#chart_monthly').empty();
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'X');
        data.addColumn('number', 'Pendapatan');
        var dummy_data = dataBulanan;
        data.addRows(dummy_data);
        var options = {
          hAxis: {
            title: 'Tanggal'
          },
          vAxis: {
            title: 'Pendapatan (Rp.)'
          },
          backgroundColor: '#f1f8e9',
          height: 265,
          width: 1180
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_monthly'));
        chart.draw(data, options);
      }
    });
  });

  $('.tahunan').on('click', function() {
    const outlet = $(this).data('outlet');
    // console.log(outlet + " tahunan");
    const dataTahunan = new Array();
    $.ajax({
      url: 'http://localhost/blossom_parfume/pendapatan/getPendapatanTahunan',
      method: 'post',
      data: { id: outlet },
      dataType: 'json',
      success: function (data) {      
        var count = 0;
        for (i in data) {
          dataTahunan.push([new Date(data[i].pertanggal), parseInt(data[i].pendapatan)]);        
          count++;
        }

        // console.log(dataTahunan);

        $('#chart_yearly').empty();
        var data = new google.visualization.DataTable();
        data.addColumn('date', 'X');
        data.addColumn('number', 'Pendapatan');
        var dummy_data = dataTahunan;
        data.addRows(dummy_data);
        var options = {
          hAxis: {
            title: 'Tanggal'
          },
          vAxis: {
            title: 'Pendapatan (Rp.)'
          },
          backgroundColor: '#f1f8e9',
          height: 265,
          width: 1180
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_yearly'));
        chart.draw(data, options);
      }
    });
  });
});

