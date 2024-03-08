$(document).ready(function() {
    // Ambil data pertumbuhan dari server
    $.ajax({
        url: "<?php echo base_url('dashboard/get_growth_data'); ?>",
        method: "GET",
        success: function(data) {
            var dates = [];
            var activeCounts = [];
            var offlineCounts = [];
            var disabledCounts = [];

            for (var i in data) {
                dates.push(data[i].date);
                activeCounts.push(data[i].active_count);
                offlineCounts.push(data[i].offline_count);
                disabledCounts.push(data[i].disabled_count);
            }

            // Tampilkan grafik
            var ctx = document.getElementById('growthChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Active',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        data: activeCounts,
                        borderWidth: 1
                    }, {
                        label: 'Offline',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        data: offlineCounts,
                        borderWidth: 1
                    }, {
                        label: 'Disabled',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        data: disabledCounts,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});
