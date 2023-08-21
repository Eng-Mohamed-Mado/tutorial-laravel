@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center my-5">
        <div class="h6 text dark">
            <a href="#">Projects </a>
        </div>

        <div>
            <a href="{{url('/project/create')}}" class="btn btn-primary">Create New Project</a>
        </div>
    </header>

    <section  class="text-left">
        <div class="row">
            {{-- Import Data Use Vairable --}}
            {{-- @foreach ($projects as $project )
            @endforeach --}}

            @forelse ($projects as $project)
                <div class="col-4 mb-4">
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
                                {{Str::limit($project->description,150)}}
                            </div>
                        </div>
                        <div class="d-flex">
                            {{$project->creatted_at->diffForHumans()}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <h3> Not Get Any Projects</h3>
                    <a href="{{url('/project/create')}}" class="btn btn-primary">Create New Project</a>
                </div>
            @endforelse
        </div>
    </section>

@endsection
