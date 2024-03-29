<div class="col-12 col-md-3">
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Đăng') }}
        </div>
        <div class="card-body p-2">
            <x-button.submit :title="__('Thêm')" />
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ __('Post') }}
        </div>
        <div class="card-body">
            <x-select name="post_id[]" class="select2-bs5-ajax" :data-url="route('admin.search.select.post')" :multiple="true"></x-select>
        </div>
    </div>
</div>
