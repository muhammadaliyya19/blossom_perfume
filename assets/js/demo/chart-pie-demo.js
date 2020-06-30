// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var ctx2 = document.getElementById("myPieChart_2");

// DATA
          var dataproject = new Array();
          var datapercentproject = new Array();
          var recent = 0;
          var inprogres = 0;
          var doneproj = 0;
          $.ajax({
            url:'http://localhost/wpu-login/project/getAllProject',
            //data:{id : id},
            method:'post',
            dataType:'json',
            success:function(dataproj) {              
              $('#myPieChart').empty();
              $('#myBarChart').empty();
              $('.captionpiechart').html("Jumlah Proyek " + dataproj.length);
              for (i in dataproj) {
                //alert(data[i].name);
                // var id = data[i].id;
                // var name = data[i].projName;
                // var startDate = data[i].projStartDate;
                // var endDate = data[i].projEndDate;
                var progress = parseInt(dataproj[i].projProgress);
                console.log(dataproj[i].projName);          
                if (progress > 0 && progress < 100) {
                  inprogres++;
                }else if (progress == 100) {
                  doneproj++;
                }else{
                  recent++;
                }
              }
              dataproject.push(recent);
              dataproject.push(inprogres);
              dataproject.push(doneproj);              
              // datatabel.addRows(dataproject);
              datapercentproject.push((recent/dataproj.length)*100);
              datapercentproject.push((inprogres/dataproj.length)*100);
              datapercentproject.push((doneproj/dataproj.length)*100);              
            }
          });
// DATA

              var myPieChart = new Chart(ctx, {
              type: 'doughnut',
              data: {                
                labels: ["New Project", "In Progress Project", "Done Project"],
                datasets: [{
                  data: dataproject,
                  backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                  hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                  }],
                },
                options: {
                  maintainAspectRatio: false,
                  tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                  },
                  legend: {
                    display: false
                  },
                  cutoutPercentage: 80,
                },
              });

              var myPieChart2 = new Chart(ctx2, {
              type: 'doughnut',
              data: {                
                labels: ["Percent New Project", "Percent In Progress Project", "Percent Done Project"],
                datasets: [{
                  data: datapercentproject,
                  backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                  hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                  }],
                },
                options: {
                  maintainAspectRatio: false,
                  tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                  },
                  legend: {
                    display: false
                  },
                  cutoutPercentage: 80,
                },
              });
            // }
          // });

