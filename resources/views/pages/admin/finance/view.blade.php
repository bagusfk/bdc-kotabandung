@extends('layouts.appadmin')
@section('title', 'Kelola Penjualan')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>


    <style>
        th {
            white-space: nowrap;
        }

        select#dt-length-0 {
            padding-right: 2.5rem;
        }

        table.dataTable td.dt-type-numeric {
            text-align: center;
        }

        table.dataTable th.dt-type-numeric {
            text-align: left;
        }

        .dataTables_length>label>select {
            width: 75px;
        }
    </style>

    @php
        \Carbon\Carbon::setLocale('id');
    @endphp
    <div class="mt-[1rem]">
        @if (session('delete'))
            <div id="alert-2"
                class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {!! html_entity_decode(session('delete')) !!}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @elseif (session('status'))
            <div id="alert-1"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {!! html_entity_decode(session('status')) !!}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <div class="flex justify-between">
        <div class="flex items-center">
            <svg class="w-6 h-6 inline-flex" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm64 320H64V320c35.3 0 64 28.7 64 64zM64 192V128h64c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64v64H448zm64-192c-35.3 0-64-28.7-64-64h64v64zM176 256a112 112 0 1 1 224 0 112 112 0 1 1 -224 0zm76-48c0 9.7 6.9 17.7 16 19.6V276h-4c-11 0-20 9-20 20s9 20 20 20h24 24c11 0 20-9 20-20s-9-20-20-20h-4V208c0-11-9-20-20-20H272c-11 0-20 9-20 20z" />
            </svg>
            <span class="text-2xl font-semibold ml-[1rem]">Kelola Keuangan</span>
        </div>
    </div>

    <div class="w-fit flex mt-[1rem]">
        <label class="inline-flex items-center mr-4">
            <input class="rounded-full mr-2" type="radio" name="kategori" id="neraca_radio" value="neraca" checked>
            <p>Neraca</p>
        </label>
        <label class="inline-flex items-center mr-4">
            <input class="rounded-full mr-2" type="radio" name="kategori" id="labarugi_radio" value="labarugi">
            <p>Laba/Rugi</p>
        </label>
        <label class="inline-flex items-center">
            <input class="rounded-full mr-2" type="radio" name="kategori" id="omzet_radio" value="omzet">
            <p>Omzet</p>
        </label>
    </div>
    <div id="neraca_content">
        @include('pages.admin.finance.neraca.view')
    </div>

    <div id="labarugi_content">
        @include('pages.admin.finance.labarugi.view')
    </div>

    <div id="omzet_content" class="relative">
        @include('pages.admin.finance.omzet.view')
    </div>
    <script>
        function editData(data) {
            var formAction = '{{ url('neraca_update') }}/' + data.id;
            document.getElementById('editForm').action = formAction;
            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_input_date').value = data.input_date;
            document.getElementById('edit_cash').value = data.cash;
            document.getElementById('edit_receivables').value = data.receivables;
            document.getElementById('edit_supplies').value = data.supplies;
            document.getElementById('edit_equipment').value = data.equipment;
            document.getElementById('edit_debt').value = data.debt;
            document.getElementById('edit_capital').value = data.capital;
            document.getElementById('edit_information').value = data.information;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable1').DataTable({
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp.,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i :
                            0;
                    };

                    // Total over this page for column 4
                    pageTotalColumn4 = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page for column 5
                    pageTotalColumn5 = api
                        .column(5, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Format the result as Rupiah
                    var formatRupiah = function(num) {
                        return 'Rp. ' + num.toLocaleString('id-ID', {
                            style: 'decimal',
                            maximumFractionDigits: 0
                        });
                    };

                    // Update footer for column 4
                    $(api.column(4).footer()).html(
                        formatRupiah(pageTotalColumn4)
                    );

                    // Update footer for column 5
                    $(api.column(5).footer()).html(
                        formatRupiah(pageTotalColumn5)
                    );
                },
                layout: {
                    topStart: {
                        buttons: [{
                                text: 'Add',
                                action: function() {
                                    // Trigger the hidden button with data-target for create
                                    $('#createModal1').click();
                                }
                            }, {
                                extend: 'excel',
                                title: 'Neraca',
                                exportOptions: {
                                    columns: ':not(:first-child):not(:last-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'pdf',
                                title: 'Neraca\n12 Agustus 2021', // Title with line break
                                exportOptions: {
                                    columns: ':not(:first-child):not(:last-child)' // Exclude the first and last columns
                                },
                                customize: function(doc) {
                                    // Center the title in the PDF
                                    doc.styles.title = {
                                        alignment: 'center', // Center alignment
                                        fontSize: 18, // Font size for title
                                        bold: true // Bold the title
                                    };
                                    // Optional: Add custom styling for the table
                                    doc.content[1].table.widths = ['*', '*', '*', '*',
                                        '*'
                                    ]; // Adjust table column widths
                                }
                            },
                            {
                                extend: 'print',
                                title: '',
                                exportOptions: {
                                    columns: ':not(:first-child):not(:last-child)' // Exclude first and last columns
                                },
                                customize: function(win) {
                                    // Get the month from the first filtered row
                                    // var filteredMonth = table.column(1, {
                                    //     search: 'applied'
                                    // }).data()[0];
                                    // Insert dynamic month in the print header
                                    $(win.document.body).prepend(
                                        '<h3 style="text-align:center;">Laporan Neraca<br></h3>'
                                    );
                                    $(win.document.body).find('table').addClass('display').css(
                                        'width', '100%');
                                }
                            }
                        ]
                    }
                }
            });
            $('#dataTable1_filter input').on('keyup', function() {
                table.search(this.value).draw(); // Default DataTables search
            });
            $('#dataTable2').DataTable({
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp.,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i :
                            0;
                    };

                    // Total over this page for column 4
                    pageTotalColumn4 = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page for column 5
                    pageTotalColumn5 = api
                        .column(5, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Format the result as Rupiah
                    var formatRupiah = function(num) {
                        return 'Rp. ' + num.toLocaleString('id-ID', {
                            style: 'decimal',
                            maximumFractionDigits: 0
                        });
                    };

                    // Update footer for column 4
                    $(api.column(4).footer()).html(
                        formatRupiah(pageTotalColumn4)
                    );

                    // Update footer for column 5
                    $(api.column(5).footer()).html(
                        formatRupiah(pageTotalColumn5)
                    );
                },
                layout: {
                    topStart: {
                        buttons: [{
                                text: 'Add',
                                action: function() {
                                    // Trigger the hidden button with data-target for create
                                    $('#createModal2').click();
                                }
                            }, {
                                extend: 'excel',
                                title: 'Laba / Rugi',
                                exportOptions: {
                                    columns: ':not(:first-child):not(:last-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'pdf',
                                title: 'Laba / Rugi',
                                exportOptions: {
                                    columns: ':not(:first-child):not(:last-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'print',
                                title: 'Laba / Rugi',
                                exportOptions: {
                                    columns: ':not(:first-child):not(:last-child)' // Exclude the first and last columns
                                }
                            }
                        ]
                    }
                }
            });
            $('#dataTable3').DataTable({
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\Rp.,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i :
                            0;
                    };

                    // Total over all pages
                    total = api
                        .column(4)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(4, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    var formatRupiah = function(num) {
                        return 'Rp. ' + num.toLocaleString('id-ID', {
                            style: 'decimal',
                            maximumFractionDigits: 0
                        });
                    };

                    // Update footer with formatted totals
                    $(api.column(4).footer()).html(
                        formatRupiah(total)
                    );
                },
                layout: {
                    topStart: {
                        buttons: [{
                                text: 'Add',
                                action: function() {
                                    // Trigger the hidden button with data-target for create
                                    $('#createAddOmzet').click();
                                }
                            },
                            {
                                extend: 'excel',
                                title: 'Omzet',
                                exportOptions: {
                                    columns: ':not(:first-child):not(:last-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'pdf',
                                title: 'Omzet',
                                exportOptions: {
                                    columns: ':not(:first-child):not(:last-child)' // Exclude the first and last columns
                                }
                            },
                            {
                                extend: 'print',
                                title: 'Omzet',
                                exportOptions: {
                                    columns: ':not(:first-child):not(:last-child)' // Exclude the first and last columns
                                }
                            }
                        ]
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const neracaRadio = document.getElementById('neraca_radio');
            const labarugiRadio = document.getElementById('labarugi_radio');
            const omzetRadio = document.getElementById('omzet_radio');
            const neracaContent = document.getElementById('neraca_content');
            const labarugiContent = document.getElementById('labarugi_content');
            const omzetContent = document.getElementById('omzet_content');

            if (neracaRadio.checked) {
                neracaContent.classList.remove('hidden');
                labarugiContent.classList.add('hidden');
                omzetContent.classList.add('hidden');
            }

            // Get the selected category from the session
            const selectCategory = "{{ session('selected_radio', '') }}";

            // Set the correct radio button based on the session value
            document.querySelectorAll('input[name="kategori"]').forEach(radio => {
                if (radio.value === selectCategory) {
                    radio.checked = true;
                }

                // Show/hide the content based on the selected radio button
                radio.addEventListener('change', function() {
                    if (this.value === 'neraca') {
                        neracaContent.classList.remove('hidden');
                        labarugiContent.classList.add('hidden');
                        omzetContent.classList.add('hidden');
                    } else if (this.value === 'labarugi') {
                        neracaContent.classList.add('hidden');
                        labarugiContent.classList.remove('hidden');
                        omzetContent.classList.add('hidden');
                    } else if (this.value === 'omzet') {
                        neracaContent.classList.add('hidden');
                        labarugiContent.classList.add('hidden');
                        omzetContent.classList.remove('hidden');
                    }
                });
            });

            // Trigger change event for the initially selected radio
            if (selectCategory) {
                document.querySelector(`input[value="${selectCategory}"]`).dispatchEvent(new Event('change'));
            }
        });
    </script>


@endsection()
