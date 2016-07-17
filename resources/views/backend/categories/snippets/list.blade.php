@if(count($categories))
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Category Name</th>
            <th>Code</th>
            <th>Parent Category Name</th>
            {{--<th>Description</th>--}}
            <th>Created at</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><img src="{{$category->image_url}}" alt="{{$category->name}}" width="80px" class="img-thumbnail"></td>
                <td>
                    <a href="{{route('backend.category.show', ['id' => $category->id])}}">
                        {{$category->name}}
                    </a>
                </td>
                <td>{{$category->code}}</td>
                <td>@if($category->parentCategory)
                        <a href="{{route('backend.category.show', ['id' => $category->parentCategory->id])}}">
                            {{$category->parentCategory->name}}
                        </a>
                    @else
                        {{$category->rootCategoryName}}
                    @endif
                </td>
{{--                <td>{{$category->description}}</td>--}}
                <td>{{$category->updated_at}}</td>
                <td>
                    <a href="{{route('backend.category.edit', ['id' => $category->id])}}" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {!! $categories->links() !!}
{{--@else--}}
    {{--No category is set.--}}
@endif