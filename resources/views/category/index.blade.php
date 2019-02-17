@extends('layouts.master')
@section('content')
<div class="col-md-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Simple Full Width Table</h3>
      
      <!-- Button trigger modal add new -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Add new
      </button>
      
      <!-- Modal add new -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="title">Title: </label>
                    <input type="text" class="form-control" name="title" id="title">
                  </div>
                  <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea type="text" class="form-control" name="description" cols="20" rows="5" id="description"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
      
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
      <table class="table">
        <tbody>
          <tr>
            <th>#id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
            <th>Modify</th>
          </tr>
          @foreach ($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->created_at}}</td>
            <td>
              <!-- Button trigger modal add new -->
              <button type="button" class="btn btn-info"
              data-title="{{$category->title}}"
              data-mydescription="{{$category->description}}" 
              data-toggle="modal"
              data-target="#editModal">Edit
              </button>
              /
              Delete
              <!-- Modal edit -->
              <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      </div>
                      <form action="{{route('category.update', $category->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="title">Title: </label>
                            <input type="text" class="form-control" name="title" id="title">
                          </div>
                          <div class="form-group"> 
                            <label for="description">Description: </label>
                            <textarea type="text" class="form-control" 
                            name="description"
                            cols="20" rows="5"
                            id="description"></textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                
                    </div>
                  </div>
                </div>
                
                {{--  --}}

              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>

@endsection