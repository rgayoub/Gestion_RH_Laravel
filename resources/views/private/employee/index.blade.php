@include('components.private.header')
@include('components.private.sidebar')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

{{-- @foreach ($data as $employee)
    <div>
        <p>{{ $employee->first_name }} {{ $employee->last_name }}</p>
        <p>Email: {{ $employee->email }}</p>
        <!-- Add other attributes you want to display -->
    </div>
@endforeach --}}
<style>
    /* Ensure the table uses the full area in fullscreen */
    #tableContainer:-webkit-full-screen,
    #tableContainer:-moz-full-screen,
    #tableContainer:fullscreen {
        width: 100%;
        height: 100%;
    }

    .email-link {
        color: inherit;
        /* Makes the color the same as the surrounding text */
        text-decoration: none;
        /* Removes underline */
        cursor: pointer;
        /* Changes the cursor to indicate it's clickable */
    }

    .email-link:hover,
    .email-link:focus {
        text-decoration: underline;
        /* Adds underline on hover for emphasis */
        color: #0056b3;
        /* Optional: changes color on hover */
    }

    .btn-modal-trigger {
        padding: 0;
        margin: 0;
        border: none;
        background-color: transparent;
        cursor: pointer;
    }

    .table-hover tbody tr td:nth-child(2) {
        cursor: pointer;
    }


    .salary-number {
        font-weight: bold;
        /* Makes the number bold */
        color: #333;
        /* Sets a dark gray color for better contrast */
    }



    /* Optional: Custom styles for resize handles */
    .ui-resizable-handle {
        background-color: #272727;
        width: 10px;
        height: 100%;
        right: -5px;
        top: 0;
        cursor: col-resize;
    }

    th {
        position: relative;
        /* Necessary to contain the resize handle */
    }

    #customContextMenu {
        border: 1px solid #ccc;
        background-color: white;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        width: 150px;
        cursor: pointer;
    }
</style>
<div id="customContextMenu" style="display: none; position: absolute; z-index: 1000;" class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">View Details</li>
        <li class="list-group-item">Edit</li>
    </ul>
</div>

<section class="home-section" style="margin-bottom: 500px">
    <div class="home-content">
        <i class='bx bx-menu'></i>
        <span class="text"> All Employees </span>
    </div>
    <div class="position-absolute top-0 end-0 m-3 d-flex">
        <button id="fullscreenBtn" class="btn btn-secondary me-1">
            <i class="bi bi-fullscreen" id="fullscreenIcon"></i>
        </button>

        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoModal"
            data-bs-placement="left" title="Help Information">
            <i class="bi bi-info-circle"></i>
        </button>
    </div>




    <!-- Modal -->
    <div class="modal fade modal-xl" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Employee Table user manual</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span class="badge pill text-bg-danger">!Off</span>
                            The employee is currently on vacation and does not have a scheduled return.
                        </li>
                        <li class="list-group-item">
                            <span class="badge rounded-pill text-bg-danger">Off</span>
                            The employee is on leave of absence.
                        </li>
                        <li class="list-group-item">
                            <span class="badge rounded-pill text-bg-warning">On</span>
                            The employee is currently working but is unscheduled.
                        </li>
                        <li class="list-group-item">
                            <span class="badge rounded-pill text-bg-success">On</span>
                            The employee is actively engaged and present.
                        </li>
                        <li class="list-group-item">
                            <i class="fas fa-file-pdf"></i>
                            Indicates that the employee's curriculum vitae (CV) is not available.
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-info-circle ms-1" title="Click on a row to see more details"></i>
                            Click on an employee's first name to view detailed information.
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('default_images/user.png') }}" alt=""
                                style="height: 50px; width: 50px; border-radius: 50%;">
                            The employee dont have profile picture
                        </li>
                        <li class="list-group-item">
                            <img src="{{ asset('default_images/monimage.jpg') }}" alt=""
                                 style="height: 50px; width: 50px; border-radius: 50%;">
                            if the employee have image you can click it to see in full view
                        </li>
                        <li class="list-group-item">
                            Right-click on an employee's row to edit details or view more information.
                        </li>
                        <li class="list-group-item bg-info rounded">
                            If a row is highlighted in light blue, it indicates that the employee has an upcoming
                            vacation scheduled. </li>
                        <li class="list-group-item">
                            <span class="badge text-bg-primary">Salary Colors Explained:</span>
                            Salaries displayed in <strong style="color: rgb(0, 173, 87);">green</strong> indicate that
                            the employee's salary is above the average for their position, while those in <strong
                                style="color: rgb(230, 36, 36);">red</strong> indicate below-average earnings. Salaries
                            highlighted in <strong style="color: rgb(0, 140, 255);">blue</strong> represent the highest
                            earners within their respective positions.
                        </li>
                        <li class="list-group-item">
                            <span class="badge text-bg-secondary">Fullscreen Mode:</span>
                            Click the button with the <i class="bi bi-fullscreen"></i> icon to view the table in
                            fullscreen mode. You can exit fullscreen by pressing the
                            <strong>Esc</strong> key on your keyboard.
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Employee Detail Modal -->
    <div class="modal fade" id="employeeDetailModal" tabindex="-1" aria-labelledby="employeeDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="employeeDetailModalLabel">Employee Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="employeeDetails">

                    <!-- Details will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>

    <div class="mycontent">
        <div class="mt-2">
            <div>
                <form action="{{ route('employee.index') }}" method="GET" class="d-flex float-start">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search"
                        aria-label="Search" style="width: 400px" value="{{ request('search') }}">
                    <div class="btn-group" role="group" class="mb-3"> <!-- Bootstrap margin bottom class -->
                        <button class="btn btn-success" type="submit" title="Search"> <i class='bx bx-search'></i>
                        </button>
                        <a href="{{ route('employee.index') }}" class="btn btn-outline-dark">
                            <i class="bi bi-arrow-clockwise" title="Refresh"></i>
                        </a>
                    </div>

                    <!-- Position Filter -->
                    <select name="position" class="form-select ms-2">
                        <option value="">All Positions</option>
                        @foreach (\App\Models\Position::all() as $position)
                            <option value="{{ $position->id }}"
                                {{ request('position') == $position->id ? 'selected' : '' }}>
                                {{ $position->name }} {{ $position->employees->count() }}

                            </option>
                        @endforeach
                    </select>

                    <!-- Salary Filter -->
                    <!-- Salary Sorting -->
                    <select name="salary_sort" class="form-select ms-2">
                        <option value="">Sort by Salary</option>
                        <option value="asc" {{ request('salary_sort') == 'asc' ? 'selected' : '' }}>Ascending
                        </option>
                        <option value="desc" {{ request('salary_sort') == 'desc' ? 'selected' : '' }}>Descending
                        </option>
                    </select>
                    <div class="dropdown ms-2">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bx bx-menu'></i>

                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('employees.statistics') }}"> <i
                                        class="fas fa-chart-bar"></i> Statistics</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('employees.terminated') }}"><i
                                        class="fas fa-ban"></i>
                                    Terminated</a>
                            </li>
                        </ul>
                    </div>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
                        rel="stylesheet">
                </form>

                <div class="float-end ">
                    {{ $data->appends(request()->input())->links('vendor.pagination.simple-bootstrap-5') }}
                </div>
            </div>
        </div>
        <br>
        <br>

        <div id="tableContainer">
            <!-- Your table code here -->
            @include('private.employee.components.table', ['data' => $data])
        </div>



    </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<script>
    document.getElementById('fullscreenBtn').addEventListener('click', function() {
        var tableContainer = document.getElementById('tableContainer');
        if (!document.fullscreenElement) {
            tableContainer.requestFullscreen().catch(err => {
                alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`);
            });
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            }
        }
    });

    // Optional: Add an event listener to adjust button text based on fullscreen state
    document.addEventListener('fullscreenchange', () => {
        const fullscreenBtn = document.getElementById('fullscreenBtn');
        fullscreenBtn.textContent = document.fullscreenElement ? 'Exit Fullscreen' : 'View Table in Fullscreen';
    });
</script>

<script>
    $(document).ready(function() {
        // Bind click event to the second column (first name) of each row in the table
        $('.table-hover tbody tr td:nth-child(2)').click(function() {
            const row = $(this).parent(); // Get the parent tr of this td
            const employeeId = row.data(
                'employee-id'); // Assuming each row has a data attribute like `data-employee-id`

            const details = `
                <p><strong>Name:</strong> ${row.find('td:nth-child(2)').text()} ${row.find('td:nth-child(3)').text()}</p>
                <p><strong>Phone:</strong> ${row.find('td:nth-child(4)').text()}</p>
                <p><strong>Email:</strong> ${row.find('td:nth-child(5)').text()}</p>
                <p><strong>Position:</strong> ${row.find('td:nth-child(6)').text()}</p>
                <p><strong>Salary:</strong> ${row.find('td:nth-child(7)').text()}</p>
                <p><strong>Status:</strong> ${row.find('td:nth-child(8)').html()}</p>
                <a href="/employee/${employeeId}" class="btn btn-primary">View Full Details</a> <!-- Adjust the route as necessary -->
            `;

            // Set the details in the modal's body and show the modal
            $('#employeeDetails').html(details);
            $('#employeeDetailModal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Right-click event on table row
        $('table tbody tr').on('contextmenu', function(e) {
            e.preventDefault(); // Prevent the default context menu

            // Position the context menu
            $('#customContextMenu').css({
                top: e.pageY + 'px',
                left: e.pageX + 'px',
                display: 'block'
            });

            // Store the ID or any relevant data attribute of the row if needed
            var employeeId = $(this).data('employee-id');
            $('#customContextMenu').data('employee-id', employeeId);
        });

        // Click anywhere to close the context menu
        $(document).click(function(e) {
            $('#customContextMenu').hide();
        });

        // Example action when clicking on menu items
        $('#customContextMenu .list-group-item').click(function() {
            var action = $(this).text();
            var employeeId = $('#customContextMenu').data('employee-id');

            console.log("Action: " + action + ", on Employee ID: " + employeeId);

            // Here you can redirect or perform further actions based on the clicked item
            if (action === "View Details") {
                window.location.href = '/employee/' + employeeId; // Adjust URL as needed
            }
            if (action === "Edit") {
                window.location.href = '/employee/' + employeeId + '/edit'; // Adjust URL as needed
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('tbody tr');
        const colorMap = {};

        function generateColor() {
            const randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
            return randomColor;
        }

        rows.forEach(row => {
            const position = row.dataset.position;
            if (!colorMap[position]) {
                colorMap[position] = generateColor(); // Generate color if it doesn't exist
            }
            row.style.backgroundColor = colorMap[position];
        });
    });
</script>

<script>
    document.addEventListener('fullscreenchange', () => {
        const fullscreenBtn = document.getElementById('fullscreenBtn');
        // Clear the current content of the button
        fullscreenBtn.innerHTML = '';

        // Fill it with the correct icon based on fullscreen state
        if (document.fullscreenElement) {
            fullscreenBtn.innerHTML = '<i class="bi bi-fullscreen-exit" id="fullscreenIcon"></i>';
        } else {
            fullscreenBtn.innerHTML = '<i class="bi bi-fullscreen" id="fullscreenIcon"></i>';
        }
    });
</script>
@include('components.private.footer')
