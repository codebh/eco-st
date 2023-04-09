@extends('admin.index')
@section('content')



@livewire('admin.edit-product-full', ['post' => $product])
@livewire('admin.edit-product', ['post' => $product])

@livewire('admin.edit-main-image-product',['post' => $product])
@livewire('admin.edit-other-image-product',['post' => $product])






@endsection
