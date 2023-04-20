@extends('../layout/' . $layout)

@section('subhead')
    <title>Accordion - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Topics</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('topics.topic.create') }}" class="btn btn-success" title="Create New Topic">
                    <i data-lucide="plus" class="block mx-auto"></i>
                </a>
            </div>

        </div>
        
        @if(count($topics) == 0)
            <div class="panel-body text-center">
                <h4>No Topics Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Title</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($topics as $topic)
                        <tr>
                            <td>{{ $topic->date }}</td>
                            <td>{{ $topic->title }}</td>

                            <td>

                                <form method="POST" action="{!! route('topics.topic.destroy', $topic->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('topics.topic.show', $topic->id ) }}" class="btn btn-info" title="Show Topic">
                                            <i data-lucide="eye" class="block mx-auto"></i>
                                        </a>
                                        <a href="{{ route('topics.topic.edit', $topic->id ) }}" class="btn btn-primary" title="Edit Topic">
                                            <i data-lucide="edit" class="block mx-auto"></i>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Topic" onclick="return confirm(&quot;Click Ok to delete Topic.&quot;)">
                                            <i data-lucide="delete" class="block mx-auto"></i>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $topics->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
