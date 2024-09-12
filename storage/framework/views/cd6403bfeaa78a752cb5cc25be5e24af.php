
<?php echo $__env->make('components.private.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('components.private.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text">Schedule Statistics</span>
    </div>
    <div class="mycontent">
        <div class="container-sm mt-5">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Summary</h5>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item ">Total Employees Across All Schedules:
                            <strong><?php echo e($totalEmployees); ?></strong></li>
                        <li class="list-group-item">Highest Paying Schedule:
                            <strong><?php echo e($highestPayingSchedule['name']); ?></strong> (Average Salary:
                            <strong>$<?php echo e(number_format($highestPayingSchedule['averageSalary'], 2)); ?></strong>)</li>
                        <li class="list-group-item">Lowest Paying Schedule:
                            <strong><?php echo e($lowestPayingSchedule['name']); ?></strong> (Average Salary:
                            <strong>$<?php echo e(number_format($lowestPayingSchedule['averageSalary'], 2)); ?></strong>)</li>
                    </ul>
                </div>
            </div>

            <h4 class="mb-4">Schedule Durations</h4>
            <ul class="list-group mb-4">
                <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $startTime = new DateTime($schedule->start_time);
                        $endTime = new DateTime($schedule->end_time);

                        // If the end time is earlier than the start time, assume it's the next day
                        if ($endTime < $startTime) {
                            $endTime->modify('+1 day');
                        }

                        $duration = $startTime->diff($endTime);
                        $hours = $duration->h;
                        if ($duration->days > 0) {
                            $hours += 24 * $duration->days; // Add 24 hours for each full day
                        }
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo e($schedule->name); ?>

                        <span><?php echo e($hours); ?> hours</span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <div class="alert alert-info" role="alert">
                <strong>Note:</strong> These statistics are dynamically generated based on the data available.
            </div>

            <div class="row bg-white rounded">
                <div class="col-md-6">
                    <canvas id="employeeChart"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="salaryChart"></canvas>
                </div>
            </div>
            <div class="row bg-white rounded">
                <div class="col-md-6">
                    <canvas id="positionsChart"></canvas>
                </div>
            </div>

            <script>
                // Employee distribution chart
                const ctx1 = document.getElementById('employeeChart').getContext('2d');
                const employeeChart = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($scheduleStats->pluck('name')); ?>,
                        datasets: [{
                            label: '# of Employees',
                            data: <?php echo json_encode($scheduleStats->pluck('employeeCount')); ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
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

                // Average salary chart
                const ctx2 = document.getElementById('salaryChart').getContext('2d');
                const salaryChart = new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($scheduleStats->pluck('name')); ?>,
                        datasets: [{
                            label: 'Average Salary',
                            data: <?php echo json_encode($scheduleStats->pluck('averageSalary')); ?>,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
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

                // Positions breakdown chart
                const ctx3 = document.getElementById('positionsChart').getContext('2d');
                const positionsChart = new Chart(ctx3, {
                    type: 'pie',
                    data: {
                        labels: <?php echo json_encode($scheduleStats->pluck('positionsCount')->collapse()->keys()); ?>,
                        datasets: [{
                            label: 'Positions Distribution',
                            data: <?php echo json_encode($scheduleStats->pluck('positionsCount')->collapse()->values()); ?>,
                            backgroundColor: ['rgba(255, 206, 86, 0.2)', 'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 99, 132, 0.2)', 'rgba(75, 192, 192, 0.2)'
                            ],
                            borderColor: ['rgba(255, 206, 86, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    }
                });
            </script>
        </div>
    </div>
</section>

<?php echo $__env->make('components.private.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/schedules/showStatistics.blade.php ENDPATH**/ ?>