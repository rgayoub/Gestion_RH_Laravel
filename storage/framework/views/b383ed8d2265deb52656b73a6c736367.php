<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Vacation Stats</span>
    </div>
    <div class="mycontent">
        <div class="container-sm mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h4>Most Past Vacations</h4>
                    <p>Name: <?php echo e($mostPastVacations->first_name ?? 'N/A'); ?> <?php echo e($mostPastVacations->last_name ?? ''); ?> - Total: <?php echo e($mostPastVacations->total ?? 0); ?></p>
                </div>
                <div class="col-md-6">
                    <h4>Longest Vacation</h4>
                    <p>Name: <?php echo e($longestVacation->first_name ?? 'N/A'); ?> <?php echo e($longestVacation->last_name ?? ''); ?> - Days: <?php echo e($longestVacation->duration ?? 0); ?></p>
                </div>

                <hr>
                <div class="col-md-6 bg-white rounded">
                    <canvas id="vacationsPerMonthChart" width="400" height="400"></canvas>
                </div>

                <div class="col-md-6 bg-white rounded">
                    <canvas id="vacationStatusChart" width="400" height="400"></canvas>
                </div>

            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const vacationsPerMonthData = <?php echo json_encode($vacationsPerMonth, 15, 512) ?>;
        const vacationStatusData = <?php echo json_encode($vacationStatus, 15, 512) ?>;

        renderVacationsPerMonth(vacationsPerMonthData);
        renderVacationStatus(vacationStatusData);
    });

    function renderVacationsPerMonth(data) {
        const ctx = document.getElementById('vacationsPerMonthChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(item => `Month ${item.month}`),
                datasets: [{
                    label: 'Vacations per Month',
                    data: data.map(item => item.count),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function renderVacationStatus(data) {
        const ctx = document.getElementById('vacationStatusChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: data.map(item => item.status),
                datasets: [{
                    label: 'Vacation Status',
                    data: data.map(item => item.count),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    }
</script>

<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/vacations/statistics.blade.php ENDPATH**/ ?>