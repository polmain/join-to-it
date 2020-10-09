<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('company.page_name')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table id="companies_table" class="table">
                    <thead>
                    <tr>
                        <th>@lang('company.table_header_id')</th>
                        <th>@lang('company.table_header_name')</th>
                        <th>@lang('company.table_header_logo')</th>
                        <th>@lang('company.table_header_email')</th>
                        <th>@lang('company.table_header_website')</th>
                        <th style="min-width: 100px"></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <script defer>
        jQuery(document).ready(function (){
            window.table = jQuery('#companies_table').DataTable( {
                "language": {
                    "url": "@lang('table.localization_link')",
                },
                "pageLength": 10,
                "autoWidth": true,
                "processing": true,
                "serverSide": true,
                "ajax": "{!! route('companies.ajax') !!}",
                "columns": [
                    {
                        className: 'text-center',
                        data: 'id',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'logo_html',
                        "orderable":      false,
                    },
                    {
                        data: 'email',
                    },
                    {
                        data: 'website',
                    },
                    {
                        data: 'actions',
                        "orderable":      false,
                    },
                ],
            } );
        });
    </script>
</x-app-layout>
