<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Code</th>
        <th>Name</th>
        {{--<th>Is Master</th>--}}
        <th>Material</th>
        <th>Color</th>
        <th>Width</th>
        <th>Depth</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($variants as $variant)
        <tr>
            <td>{{$variant->id}}</td>
            <td title="{{$variant->product->name}}">
                {{link_to_route('backend.product.edit',$variant->product->name,['id' => $variant->product->id])}}
            </td>
            <td>{{$variant->code}}</td>
            <td>
                <a href="{{route('backend.variant.show', ['id' => $variant->id])}}">
                {{$variant->name}}
                </a>
            </td>
{{--            <td>{{$variant->is_master==1? 'Yes':'No'}}</td>--}}
            <td>{{$variant->material}}</td>
            <td>{{$variant->color}}</td>
            <td>{{$variant->width}}</td>
            <td>{{$variant->depth}}</td>
            <td>{{$variant->price}}</td>
            {{--<td>{{$variant->special_price}}</td>--}}
            {{--<td>{!!  $variant->description  !!}</td>--}}
            <td>
                <a href="{{route('backend.variant.edit', ['id' => $variant->id])}}" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $variants->appends(request()->except('page'))->links() !!}