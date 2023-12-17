
@php 
    $name = $name ?? '';
    $sellPrice = $sellPrice ?? '';
    $buyPrice = $buyPrice ?? '';
@endphp
<table class="w-100 table table-bordered">
                            <thead>

                                <tr>
                                    <th class="p-3 text-muted" scope="col">  {{$name}} </th>
                                    <th class="p-3 text-muted" scope="col">{{$countries->where('code',$code)->first()->name}}</th>
                                </tr>

                            </thead>
                            <tbody>

                                    
                                <tr>
                                    <td class="sell-api text-muted fw-bold p-3">1 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat)) ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >  {{number_format($buyPrice * 1, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>

                                <tr >
                                    <td class="sell-api text-muted fw-bold p-3">5 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat))   ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >{{number_format($buyPrice * 5, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>
                                <tr>
                                    <td class="sell-api text-muted fw-bold p-3">10 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat)) ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >{{number_format($buyPrice * 10, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>
                                <tr>
                                    <td class="sell-api text-muted fw-bold p-3">25 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat)) ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >{{number_format($buyPrice * 25, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>
                                <tr>
                                    <td class="sell-api text-muted fw-bold p-3">50 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat)) ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >{{number_format($buyPrice * 50, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>
                                <tr>
                                    <td class="sell-api text-muted fw-bold p-3">100 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat)) ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >{{number_format($buyPrice * 100, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>
                                <tr>
                                    <td class="sell-api text-muted fw-bold p-3">500 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat)) ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >{{number_format($buyPrice * 500, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>
                                <tr>
                                    <td class="sell-api text-muted fw-bold p-3">1000 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat)) ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >{{number_format($buyPrice * 1000, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>
                                <tr>
                                    <td class="sell-api text-muted fw-bold p-3">5000 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat)) ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >{{number_format($buyPrice * 5000, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>
                                <tr>
                                    <td class="sell-api text-muted fw-bold p-3">10000 {{ ($type == "Gold" && is_numeric($items->where('id',$id)->first()->karat)) ? __('Gram') : ''; }}  {{$name}}</td>
                                    <td class="buy-api  text-muted fw-bold p-3 " >{{number_format($buyPrice * 10000, 2)}} {{$countries->where('code',$code)->first()->name}}</td>
                                </tr>
                            </tbody>
                        </table>