<div class="card border-0 shadow">
    <div class="card-body">
        <h5 class="card-title text-center mb-4">Employee Statistics</h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span >Total Employees:</span>
                <span class="badge bg-warning text-dark"><?php echo e($totalEmployees); ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Average Employees per Position:</span>
                <span class="badge bg-info text-dark"><?php echo e($totalEmployees > 0 ? round($totalEmployees / $data->count(), 2) : 0); ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Position with Most Employees:</span>
                <span class="badge bg-warning text-dark"><?php echo e($positionWithMostEmployees ? $positionWithMostEmployees->name : 'N/A'); ?></span>
                <span class="badge bg-warning text-dark"><?php echo e($maxEmployeeCount); ?> employees</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Position with Fewest Employees:</span>
                <span class="badge bg-info text-dark"><?php echo e($positionWithFewestEmployees ? $positionWithFewestEmployees->name : 'N/A'); ?></span>
                <span class="badge bg-info text-dark"><?php echo e($minEmployeeCount); ?> employees</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Total Salary Expense:</span>
                <span class="badge bg-warning text-dark">$<?php echo e($totalSalaryExpense); ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Total Trainees:</span>
                <span class="badge bg-info text-dark"><?php echo e($totalTrainees); ?></span>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Laravel\HRMS\resources\views/positions/components/statistics.blade.php ENDPATH**/ ?>