@extends('layouts.frontend.default',['vueView'  => 'FrontendCart'])
@section('main')
    <div class="container">
        <table class="table table-striped table-hover form-inline">
            <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Item Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart as $row)
                <tr v-show="hideItems.indexOf('{{$row->rowId}}') <0 ">
                    <td>
                        {{$row->id}}
                    </td>
                    <td>
                        {{$row->name}}
                    </td>
                    <td>{{$row->price(2)}}</td>
                    <td>
                        <input
                            type="number" value="{{$row->qty}}"
                            class="form-control"
                            @change="updateQty('{{$row->rowId}}',$event)"></td>
                    <td>{{$row->subtotal(2)}}</td>
                    <td>
                        <span
                            class="btn btn-xs btn-danger"
                            @click="removeItem('{{$row->rowId}}',$event)"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</span></td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-right">Total</td>
                    <td>{{Cart::total()}}</td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

    </div>
@endsection