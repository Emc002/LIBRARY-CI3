        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(250, 25, 141, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(250, 25, 141, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(250, 25, 141, 0)');

        // <?php
        // foreach ($database->tampil_data1() as $d) {
        //   $nama[] = $d['nama'];
        //   $jumlah[] = $d['jumlah'];
        // }

        // ?>
        new Chart(ctx1, {
          type: "line",
          data: {
            labels: [nana,nana,nana],
            datasets: [{
              label: "STOCK",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#F72585",
              backgroundColor: gradientStroke1,
              borderWidth: 3,
              fill: true,
              data: [10,10,10],
              maxBarThickness: 6

            }],


          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: false,
              }
            },
            interaction: {
              intersect: false,
              mode: 'index',
            },
            scales: {
              y: {
                grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5]
                },
                ticks: {
                  display: true,
                  padding: 10,
                  color: '#F72585',
                  font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                  },
                }
              },
              x: {
                grid: {
                  drawBorder: false,
                  display: false,
                  drawOnChartArea: false,
                  drawTicks: false,
                  borderDash: [5, 5]
                },
                ticks: {
                  display: true,
                  color: '#F72585',
                  padding: 20,
                  font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                  },
                }
              },
            },
          },
        });


