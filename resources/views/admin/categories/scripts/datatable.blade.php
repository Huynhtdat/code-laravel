<script>
    function searchColumsDataTable(datatable) {
        datatable.api().columns([1, 2, 3, 4]).every(function () {
            var column = this;
            var input = document.createElement("input");
            if(column.selector.cols == 4){
                input.setAttribute('type', 'date');
            }else if(column.selector.cols == 3){
                input = document.createElement("select");
                createSelectColumnUniqueDatatableAll(input, @json($status));
            }
            input.setAttribute('placeholder', 'Nhập từ khóa');
            input.setAttribute('class', 'form-control');

            $(input).appendTo($(column.footer()).empty())
            .on('change', function () {
                column.search($(this).val(), false, false, true).draw();
            });
        });
    }
</script>

<x-input type="hidden" id="postRoute" name="route_search_select_tag":value="route('admin.search.select.post')" />

<script>
$(document).ready(function() {
select2LoadData($('#postRoute').val(), '.select2-bs5-ajax[name="post_id[]"]');

});
</script>
