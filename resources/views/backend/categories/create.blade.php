@extends('layouts.backend.default')

@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(array('url' => 'foo/bar')) !!}
            <table>
                <tr>
                    <td>Parent Category</td>
                    <td>
                        {{Form::select('parent_category_id',$parentCategory)}}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{Form::text('Name','')}}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{Form::textarea('Description','')}}</td>
                </tr>
            </table>
            {!! Form::close() !!}
        </div>
    </div>
@endsection