<span class="label
{{$level == 'user'?'label-warning':''}}
{{$level == 'vendor'?'label-primary':''}}
{{$level == 'company'?'label-success':''}}
">
{{trans('admin.'.$level)}}
</span>
