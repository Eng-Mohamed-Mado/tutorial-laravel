@extends('layouts.app')

@section('content')
<header class="d-flex justify-content-between align-items-center my-5">
    <div class="h6 text dark">
        <a href="{{url('/project')}}">Projects </a>
    </div>

    <div>
        <a href="{{url('/project/create')}}" class="btn btn-primary">Create New Project</a>
    </div>
</header>



<section class="row text-left">
    <div class="col-lg-4">
        <div class="card">
              <div class="card-header">
                    <h5>{{$project->title}}</h5>
            </div>

            <div class="card-body">
                <div>
                    <span>Status :</span>
                    @switch($project->status)
                        @case(0)
                            <span class="text-warning">Pending</span>
                            @break
                        @case(1)
                            <span class="text-warning">Complete</span>
                            @break
                    @endswitch
                </div>
                <div class="card-text mt-4">
                    {{-- Limit Chracter View --}}
                    {{$project->description}}
                </div>
                <div class="d-flex">
                    {{$project->creatted_at->diffForHumans()}}
                </div>
            </div>
        </div>

        {{-- EDit Status Card --}}
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="font-weight-bold">Change Status Project : </h5>
                <form action="{{url('/project/',$project->id)}}" method="POST">
                    @csrf
                    @method('PATCH')

                        <select name="status" id='status' onchange='this.form.submit()'>
                            <option value="0" {{($project->status == 0) ? 'selected': ''}}>Pendding</option>
                            <option value="1" {{($project->status == 1) ? 'selected': ''}}>Complete</option>
                        </select>
                </form>
            </div>
        </div>
    </div>

    {{-- Tasks --}}
    <div class="col-lg-8">
        {{-- tasks -> Releation  --}}
        @foreach ( $project->tasks as $task )
        <div class="card d-flex flex-row mt-3 p-3 align-items-center">
            <div >
                {{$task->body}}
            </div>
            <div class="mr-auto">
                <form action="{{url('/project/'.$project->id.'/tasks/'.$task->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-check">
                    <input type="checkbox" name="done" id='done' class="form-check-input" {{($task->done == 1)?'checked':''}} onchange='this.form.submit()'>

                    </div>
                </form>
            </div>
        </div>
        @endforeach

         {{-- Form Create Tasks  --}}
        <div class="card mt-4">
            <form action="{{url('/project/'.{{$project->id}}.'/tasks')}}" method="POST">
                @csrf
                {{-- Pass Id Project --}}
                <input type="hidden" value="{{$project->id}}" id="project_id" name="project_id">
                <input type="text" name="body" id="body" class="form-control p-2 ml-2 border-0" placeholder="Add New Task ...">
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>


</section>
@endsection

