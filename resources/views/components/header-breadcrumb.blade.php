@props(['title'])
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                    <h4 class="mb-0">{{ $title }}</h4>
                </div>
                <div class="card-action">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>
</div>