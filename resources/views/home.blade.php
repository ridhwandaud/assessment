@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Workspace</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    @foreach($workspaces as $workspace)
    <div class="col-md-3">
        <a href="/workspace/{{$workspace->id}}">
            <div class="card">
                <div class="card-header">{{$workspace->id}}</div>
                <div class="card-body">
                    <div class="card-title">
                        {{$workspace->name}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    </div>
    <div class="row mt-3">
        <div class="col-md-12 clearfix">
            <div class="pull-right">
                <a href="/workspace">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#workspaceModal">Create New Workspace</button>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
