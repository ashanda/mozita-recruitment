@extends('layouts.app_employee')

@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row pl-3">
              <div class="pull-left text-left mb-2 col-md-6">
                <h4 class="card-title"> Edit Job Categories</h4>
              </div>
              <div class="pull-right text-right col-md-6">
                <a href="{{ route('user_categories.index') }}" class="btn btn-primary float-right">Back</a>              </div>
              </div>

                    
      
                    

                    <form action="{{ route('user_categories.update', $category->id ) }}" method="post">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <label for="name">Job Category:</label>
                            <input type="name" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Job Role:</label>
                            <select class="form-control" name="parent_category">
                                <option>Select a category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('parent_category') }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        
    </div>
</div>
@endsection