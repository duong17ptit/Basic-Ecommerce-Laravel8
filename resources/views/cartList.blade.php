@extends('master')
@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container padding-bottom-3x mb-1">
        <!-- Alert-->
        <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span
                class="alert-close" data-dismiss="alert"></span><img class="d-inline align-center"
                src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAzIDUxMi4wMDMiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDMgNTEyLjAwMzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjE2cHgiPgo8Zz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBkPSJNMjU2LjAwMSw2NGMtNzAuNTkyLDAtMTI4LDU3LjQwOC0xMjgsMTI4czU3LjQwOCwxMjgsMTI4LDEyOHMxMjgtNTcuNDA4LDEyOC0xMjhTMzI2LjU5Myw2NCwyNTYuMDAxLDY0eiAgICAgIE0yNTYuMDAxLDI5OC42NjdjLTU4LjgxNiwwLTEwNi42NjctNDcuODUxLTEwNi42NjctMTA2LjY2N1MxOTcuMTg1LDg1LjMzMywyNTYuMDAxLDg1LjMzM1MzNjIuNjY4LDEzMy4xODQsMzYyLjY2OCwxOTIgICAgIFMzMTQuODE3LDI5OC42NjcsMjU2LjAwMSwyOTguNjY3eiIgZmlsbD0iIzUwYzZlOSIvPgoJCQk8cGF0aCBkPSJNMzg1LjY0NCwzMzMuMjA1YzM4LjIyOS0zNS4xMzYsNjIuMzU3LTg1LjMzMyw2Mi4zNTctMTQxLjIwNWMwLTEwNS44NTYtODYuMTIzLTE5Mi0xOTItMTkycy0xOTIsODYuMTQ0LTE5MiwxOTIgICAgIGMwLDU1Ljg1MSwyNC4xMjgsMTA2LjA2OSw2Mi4zMzYsMTQxLjE4NEw2NC42ODQsNDk3LjZjLTEuNTM2LDQuMTE3LTAuNDA1LDguNzI1LDIuODM3LDExLjY2OSAgICAgYzIuMDI3LDEuNzkyLDQuNTY1LDIuNzMxLDcuMTQ3LDIuNzMxYzEuNjIxLDAsMy4yNDMtMC4zNjMsNC43NzktMS4xMDlsNzkuNzg3LTM5Ljg5M2w1OC44NTksMzkuMjMyICAgICBjMi42ODgsMS43OTIsNi4xMDEsMi4yNCw5LjE5NSwxLjI4YzMuMDkzLTEuMDAzLDUuNTY4LTMuMzQ5LDYuNjk5LTYuNGwyMy4yOTYtNjIuMTQ0bDIwLjU4Nyw2MS43MzkgICAgIGMxLjA2NywzLjE1NywzLjU0MSw1LjYzMiw2LjY3Nyw2LjcyYzMuMTM2LDEuMDY3LDYuNTkyLDAuNjQsOS4zNjUtMS4yMTZsNTguODU5LTM5LjIzMmw3OS43ODcsMzkuODkzICAgICBjMS41MzYsMC43NjgsMy4xNTcsMS4xMzEsNC43NzksMS4xMzFjMi41ODEsMCw1LjEyLTAuOTM5LDcuMTI1LTIuNzUyYzMuMjY0LTIuOTIzLDQuMzczLTcuNTUyLDIuODM3LTExLjY2OUwzODUuNjQ0LDMzMy4yMDV6ICAgICAgTTI0Ni4wMTcsNDEyLjI2N2wtMjcuMjg1LDcyLjc0N2wtNTIuODIxLTM1LjJjLTMuMi0yLjExMi03LjMxNy0yLjM4OS0xMC42ODgtMC42NjFMOTQuMTg4LDQ3OS42OGw0OS41NzktMTMyLjIyNCAgICAgYzI2Ljg1OSwxOS40MzUsNTguNzk1LDMyLjIxMyw5My41NDcsMzUuNjA1TDI0Ni43LDQxMS4yQzI0Ni40ODcsNDExLjU2MywyNDYuMTY3LDQxMS44NCwyNDYuMDE3LDQxMi4yNjd6IE0yNTYuMDAxLDM2Mi42NjcgICAgIEMxNjEuOSwzNjIuNjY3LDg1LjMzNSwyODYuMTAxLDg1LjMzNSwxOTJTMTYxLjksMjEuMzMzLDI1Ni4wMDEsMjEuMzMzUzQyNi42NjgsOTcuODk5LDQyNi42NjgsMTkyICAgICBTMzUwLjEwMywzNjIuNjY3LDI1Ni4wMDEsMzYyLjY2N3ogTTM1Ni43NTksNDQ5LjEzMWMtMy40MTMtMS43MjgtNy41MDktMS40NzItMTAuNjg4LDAuNjYxbC01Mi4zNzMsMzQuOTIzbC0zMy42NDMtMTAwLjkyOCAgICAgYzQwLjM0MS0wLjg1Myw3Ny41ODktMTQuMTg3LDEwOC4xNi0zNi4zMzFsNDkuNTc5LDEzMi4yMDNMMzU2Ljc1OSw0NDkuMTMxeiIgZmlsbD0iIzUwYzZlOSIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"
                width="18" height="18" alt="Medal icon">&nbsp;&nbsp;With this purchase you will earn <strong>300</strong>
            Reward Points.</div>
        <!-- Shopping Cart-->

        {{-- <div class="alert alert-danger" role="alert">
            {{Session::get('remove_message')}}
        </div> --}}

        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}} 
            {{Session::forget('message')}}
        </div>
        @endif
        @if (count($cartProducts)>0)
        <div class="table-responsive shopping-cart">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Discount</th>
                        <th class="text-center"><a class="btn btn-sm btn-outline-danger"
                                href="{{ url('/clear-cart') }}">Clear Cart</a></th>
                    </tr>
                </thead>
                <tbody>
                    <form class="count-input" action="{{ url('/cart/update') }}" id="form_qty"  method="POST">
                        @csrf
                    @foreach ($cartProducts as $item)
                        <tr>
                            <td>
                                <div class="product-item">
                                    <a class="product-thumb" href="#"><img src="{{ $item->gallery }}" alt="Product"></a>
                                    <div class="product-info">
                                        <h4 class="product-title"><a href="#">{{ $item->name }}</a></h4>
                                        <span><em>Category:</em>
                                            {{ $item->category }}</span><span><em>Color:</em> {{ $item->color }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center col-1" >
                         
                                    <input class="form-control" type="hidden" name="incart_id[]" id="" value="{{$item->cart_id}}">
                                    <input class="form-control" type="hidden" name="product_id[]" id="" value="{{$item->id}}">
                                    <input class="form-control" type="number" min="1" name="qty[]" id="" value="{{$item->cart_qty}}">   
                                
                            </td>
                            <td class="text-center text-lg text-medium">${{ $item->price }}</td>
                            <td class="text-center text-lg text-medium">$0.00</td>
                            <td class="text-center"><a class="remove-from-cart"
                                    href="{{ url("/removeCart/$item->cart_id") }}" data-toggle="tooltip" title=""
                                    data-original-title="Remove item"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    @endforeach
                </form>
                </tbody>
            </table>
        </div>
        <div class="shopping-cart-footer border-top-0">
            <div class="column">
                {{-- <form class="coupon-form" method="post">
                    <input class="form-control form-control-sm" type="text" placeholder="Coupon code" required="">
                    <button class="btn btn-outline-primary btn-sm" type="submit">Apply Coupon</button>
                </form> --}}
            </div>
            <div class="column text-lg"><strong> Subtotal: <span class="text-medium">$<?php echo $total; ?></span></strong></div>
        </div>
        <div class="shopping-cart-footer">
            <div class="column"><a class="btn btn-outline-secondary" href="{{ url("/") }}"><i
                        class="icon-arrow-left"></i>&nbsp;Back to
                    Shopping</a></div>
            <div class="column">
                <button class="btn btn-primary" data-toast="" data-toast-type="success"
                data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart"
                data-toast-message="is updated successfully!" form = "form_qty" type="submit">Update Cart</button>
                    <a class="btn btn-success" href="{{ url('/order-now') }}">Order Now</a>
                </div>
        </div>
        @endif
        @if (count($cartProducts)<= 0)
        <div class="table-responsive shopping-cart">
            <table class="table">
                <thead>
                    <tr>
                        
                        <th class="text-center" style="font-size: 25px">Hi, Have a good day ! </th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                  
                    <tr>
                        
                       
                        <td class="border-bottom-0">
                            <div class="product-item">
                                <div class="alert alert-warning alert-dismissible fade show text-center" style="margin-bottom: 30px;">
                                    There are no products in your cart !!
                                    <span class="alert-close" data-dismiss="alert"></span></div>
                            </div>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="shopping-cart-footer">
            <div class="column"><a class="btn btn-outline-secondary" href="{{ url("/") }}"><i
                        class="icon-arrow-left"></i>&nbsp;Back to
                    Shopping</a></div>
           
        </div>
        @endif
    </div>

    {{-- <script type="text/javascipt">
        function removeItem(){
            $.post
        }                              
    </script> --}}
@endsection
