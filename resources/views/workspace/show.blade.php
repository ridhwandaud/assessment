@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Task</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      @foreach($tasks as $task)
      <div class="col-md-3 mb-3">
        <a data-bs-toggle="modal" id="smallButton" data-bs-target="#toggleModal-{{$task->id}}">
          <div class="card">
              <div class="card-header">
                {{$task->complete ? 'Completed' : 'Incomplete' }}
              </div>
              <div class="card-body">
                  <div class="card-title {{$task->complete ? 'text-decoration-line-through' : ''}}">
                      {{$task->name}}
                  </div>
                  <div>
                    @if ($task->complete) {{\Carbon\Carbon::parse($task->completed_at)->diffForHumans()}}
                    @endif
                    @if (!$task->complete) {{\Carbon\Carbon::parse($task->deadline)->diffForHumans()}}
                    @endif
                  </div>  
              </div>
          </div>
        </a>
        <div class="modal" tabindex="-1" id="toggleModal-{{$task->id}}">
          <form method="POST" action="/task/update/{{$task->id}}">
            @csrf
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Mark task as {{$task->complete ? 'incomplete' : 'completed' }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Are you sure ?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" value="Save Changes" />
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      @endforeach
    </div>
    <div class="row mt-3">
        <div class="col-md-12 clearfix">
            <div class="pull-right">
                <a href="/task/{{$id}}">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#workspaceModal">Create New Task</button>
                </a>
            </div>
        </div>
    </div>
    <!-- small modal -->
    
</div>
@endsection
