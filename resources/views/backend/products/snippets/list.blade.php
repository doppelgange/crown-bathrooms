@if(count($products))
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category Name</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>
                    <a href="{{route('backend.product.show', ['id' => $product->id])}}">
                        {{$product->name}}
                    </a>
                </td>
                <td>{{link_to(route('backend.category.show',$product->category->id),$product->category->name,['target'=>'_blank'])}}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a href="{{route('backend.product.edit', ['id' => $product->id])}}" class="btn btn-primary btn-xs">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {!! $products->appends(request()->except('page'))->links() !!}
{{--@else--}}
    {{--No product is set.--}}
@endif