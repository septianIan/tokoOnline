<a href="/admin/{{ request()->segment(3) }}/{{ $model->id }}/edit" class="btn btn-success"><i class="fa fa-edit"></i></a>

<button type="submit" class="button btn btn-danger" style="display: inline" id="delete" data-id="{{ $model->id }}">
<i class="fa fa-trash"></i>
</button>

{{-- admin(segment 1)/product(segment 2)/edit(segment 3) --}}
{{-- {{ request()->segment(3) }} --}} 