
<table class="w-100 table ">
    <thead>
        <tr>
            <th scope="col" class="text-muted">{{ $type == 'Currency' ?  __('Currency') : __('Karat') }}</th>
            <th scope="col" class=" text-muted">{{__('Sell')}}</th>
            <th scope="col" class=" text-muted">{{__('Buy')}}</th>
        </tr>

    </thead>
    <tbody>


        @foreach ($items as $currency )
            <tr>
                <td class='p-0'><a href="{{url($slug.'/'.$currency->id)}}" class="d-block py-2 px-2  text-decoration-none fs-6  text-muted"><img src="{{url('/storage/'.$currency->icon)}}" alt=""  class="p-1 me-2" width="35px" ><span >{{$currency->name}}</span></a></td>
                <td class="sell-api-currrnceis p-0">
                    <a href="{{url($slug.'/'.$currency->id)}}" class="d-block py-3 px-2 text-decoration-none fs-6  text-success">
                        {{number_format($currency->prices[0]->sell_price, 2)}} 

                        {{ $code == 'egp' ? __('PoundEg') : __('PoundSy')  }}
                </a></td>
                <td class="buy-api-currrnceis p-0"><a href="{{url($slug.'/'.$currency->id)}}" class="d-block py-3 px-2 text-decoration-none fs-6  text-success">
                     {{number_format($currency->prices[0]->buy_price, 2)}}

                     {{ $code == 'egp' ? __('PoundEg') : __('PoundSy')  }}
                    </a></td>
            </tr>
        @endforeach


        

    </tbody>
</table>