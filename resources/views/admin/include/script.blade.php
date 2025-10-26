<!-- jQuery -->
<script src="{{ asset('/') }}admin/assets/node_modules/jquery/dist/jquery.min.js"></script>

<!-- Core Bootstrap JavaScript -->
<script src="{{ asset('/') }}admin/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Scrollbar JavaScript for smooth scrolling -->
<script src="{{ asset('/') }}admin/dist/js/perfect-scrollbar.jquery.min.js"></script>

<!-- Wave Effects for UI interactions -->
<script src="{{ asset('/') }}admin/dist/js/waves.js"></script>

<!-- Sidebar Menu JavaScript -->
<script src="{{ asset('/') }}admin/dist/js/sidebarmenu.js"></script>

<!-- Custom JavaScript for Admin Panel -->
<script src="{{ asset('/') }}admin/dist/js/custom.min.js"></script>

<!-- Page-Specific Plugins -->
<!-- Morris.js Charts for data visualization -->
<script src="{{ asset('/') }}admin/assets/node_modules/raphael/raphael-min.js"></script>
<script src="{{ asset('/') }}admin/assets/node_modules/morrisjs/morris.min.js"></script>

<!-- Sparkline Charts for small inline charts -->
<script src="{{ asset('/') }}admin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Toast Notifications for alerts and messages -->
<script src="{{ asset('/') }}admin/assets/node_modules/toast-master/js/jquery.toast.js"></script>

<!-- Dashboard Chart Initialization -->
<script src="{{ asset('/') }}admin/dist/js/dashboard1.js"></script>

<!-- Dropify for File Uploads -->
<script src="{{ asset('/') }}admin/assets/node_modules/dropify/dist/js/dropify.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Dropify for basic file uploads
        $('.dropify').dropify();

        // Initialize Dropify with custom messages (e.g., French translations)
        $('.dropify-fr').dropify({
            messages: {
                default: 'Drag and drop a file here or click',
                replace: 'Drag and drop or click to replace',
                remove: 'Remove',
                error: 'Sorry, the file is too large'
            }
        });

        // Dropify events for file handling
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\"?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('An error occurred');
        });

        // Toggle Dropify functionality
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify');
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        });
    });
</script>

<!-- DataTables for interactive tables -->
<script src="{{ asset('/') }}admin/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}admin/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>

<script>
    $(function() {
        // Initialize basic DataTable
        $('#myTable').DataTable();

        // Example DataTable with grouping
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group +
                            '</td></tr>');
                        last = group;
                    }
                });
            }
        });

        // Order by grouping when clicking on group rows
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });

        // Responsive DataTable
        $('#config-table').DataTable({
            responsive: true
        });

        // DataTable with export buttons
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        // Add custom classes to export buttons
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
            'btn btn-primary me-1');
    });
</script>

<!-- Auto-dismiss success alert script -->
<script>
    // This script handles the auto-dismiss functionality for success alerts.
    // The alert will fade out after 5 seconds and then be removed from the DOM.
    setTimeout(() => {
        const alert = document.querySelector('.alert'); // Select the alert element
        if (alert) {
            alert.classList.add('fade'); // Add fade-out animation
            setTimeout(() => alert.remove(), 500); // Remove the alert element after fading out
        }
    }, 2000); // 2000ms = 2 seconds
</script>


<!-- SummerNote Text Editor -->
<script src="{{ asset('/') }}admin/assets/node_modules/summernote/dist/summernote-bs4.min.js"></script>
<script>
    $(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
</script>

<!-- AJAX - Get Subcategories Related To Categories -->
<script>
    $(document).ready(function() {
        // Listen for changes on the category dropdown
        $('#category_id').on('change', function() {
            var categoryID = $(this).val();

            // Clear the subcategory dropdown
            var subcategoryDropdown = $('#subcategory_id');
            subcategoryDropdown.empty();
            subcategoryDropdown.append(
                '<option value="" disabled selected>-- Select Subcategory --</option>');

            if (categoryID) {
                // Make an AJAX request to fetch subcategories
                $.ajax({
                    type: "GET",
                    url: "{{ route('product.get-subcategory-by-category') }}", // Route to fetch subcategories
                    data: {
                        id: categoryID
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.length > 0) {
                            // Populate the subcategory dropdown with the response data
                            $.each(response, function(key, value) {
                                subcategoryDropdown.append('<option value="' + value
                                    .id + '">' + value.name + '</option>');
                            });
                        } else {
                            subcategoryDropdown.append(
                                '<option value="" disabled>No Subcategories Found</option>'
                            );
                        }
                    },
                    error: function() {
                        alert('Failed to fetch subcategories. Please try again.');
                    }
                });
            }
        });
    });
</script>
