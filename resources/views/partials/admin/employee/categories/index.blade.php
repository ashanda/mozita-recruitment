@extends('layouts.app_admin')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row pl-3">
                    <div class="pull-left text-left mb-2 col-md-6">
                        <h4 class="card-title">Job Categories</h4>
                    </div>
                    <div class="pull-right text-right col-md-6">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">Create category</a>
                    </div>
                </div>





                <div class="container">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th>Actions</th>
                                    <th>Job Category</th>
                                    <th>Sub Category</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <a href="{{ route('categories.edit', ['category'=> $category->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                        <form action="{{ route('categories.destroy', ['category'=> $category->id]) }}" method="POST" style="display: inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-xs btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    
                                        @if ($category->parent)
                                        <td>{{ $category->parent->name}}</td>
                                        <td>{{ $category->name}}</td>
                                        @elseif ($category->parent == null)
                                        <td>{{ $category->name}}</td>
                                        <td>{{ 'No Parent'}}</td>
                                        
                                        
                                        @endif
                                    

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection