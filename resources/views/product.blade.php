@extends('layouts.app')

@section('content')

    <table class="table table-hover table-bordered">
      <tr class="bg-light">
        <th class="text-md-center">NO</th>
        <th class="text-md-center">Product</th>
        <th class="text-md-center">Slug</th>
        <th class="text-md-center">Image Name</th>
        <th width="280px" class="text-md-center">Action</th>
      </tr>
      @forelse ($product as $pr)
      <tr>
          <td class="text-md-center">{{ $loop->iteration }}</td>
          <td class="text-md-center">{{ $pr->product_title }}</td>
          <td class="text-md-center">{{ $pr->product_slug }}</td> 
          <td class="text-md-center">{{ $pr->product_image }}</td>
          <td class="text-md-center">
            <form action="{{ route('product.destroy', $pr->id) }}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('product.edit', $pr->id) }}" class="btn btn-warning">
                Edit
              </a>
              <button type="submit" class="btn btn-danger">
                Delete
              </button>
            </form>
          </td>
      </tr>    
      @empty
        <tr>
          <td colspan="8" class="text-center">Tidak Ada Data</td>
        </tr>
      @endforelse
    </table>
@endsection