<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Termination Process for {{ $employee->first_name }} {{ $employee->last_name }}</h2>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card bg-light mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Termination Letter</h4>
                            <p class="card-text">Dear {{ $employee->first_name }},</p>
                            <p class="card-text">We regret to inform you that your employment with ATNER will be terminated effective {{ now() }}.</p>
                            <hr>
                            <button class="btn btn-primary" onclick="printTerminationLetter()">Print Termination Letter</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bg-light mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Fire or Delete Employee</h4>
                            <p class="card-text">Are you sure you want to terminate the employment of {{ $employee->first_name }} {{ $employee->last_name }}?</p>
                            <form method="POST" action="{{ route('employee.destroy', ['employee' => $employee->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Fire Employee</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printTerminationLetter() {
        var terminationLetter = `
            <div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 18px; line-height: 1.6; padding: 20px;">
                <img src="{{ asset('default_images/Logo.png') }}" alt="Company Logo" style="width: 150px; margin-bottom: 20px;">
                <p>${new Date().toLocaleDateString()}</p>
                <p>{{ $employee->first_name }} {{ $employee->last_name }}<br>
                {{ $employee->address }}</p>
                <p>Dear {{ $employee->first_name }},</p>
                <p>We regret to inform you that your employment with "ATNER" will be terminated effective ${new Date().toLocaleDateString()}.</p>
                <p>This decision was not made lightly and follows a thorough review of your employment history and performance. Despite our efforts to provide support and guidance, it has become clear that a continuation of your employment with the company is no longer feasible.</p>
                <p>We want to express our appreciation for your contributions and efforts during your time with us. We understand that this news may come as a surprise, and we will do our best to assist you during this transition period.</p>
                <p>We wish you the best in your future endeavors and hope that you find success and fulfillment in your future pursuits.</p>
                <p>Sincerely,</p>
                <p>{{ Auth()->user()->first_name }}<br>
                Human Resource<br>
                ATNER</p>
            </div>
        `;

        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write(terminationLetter);
        printWindow.document.close();
        printWindow.print();
    }
</script>
