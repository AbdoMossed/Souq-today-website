
@php
    $id = $id ?? $items->first()->id;
    $price = $items->where('id', $id)->first()->prices[0]->buy_price;
@endphp

<div class="container px-1">
    <p class="text-light px-2 fw-bold fs-5 container">
        
        @if($type == 'Currency' )
            {{__('Currency_Exchange')}}
        @else
            {{__('Grams_Calculator')}}
        @endif
    </p>
    <div class="d-flex flex-column container">
        <label for="" class="text-light py-2"> {{__('Enter The Amount')}} </label>
        <input class="inputNumber bg-primary text-light border border-success p-2 rounded"  min="1" value="1" type="number">
    </div>
    <div class="d-flex flex-column my-4 container">
        <label for="" class="text-light py-2 fs-6"> {{__('Choose_Type')}} </label>
        <select name="" id="" class="currencey-item bg-primary text-light border border-success p-2 rounded cursor-pointer">
           
        @foreach ($items as $item)
                    <option  data-price="{{$item->prices[0]->sell_price}}" {{ ($item->id == $id) ? 'selected' : ''; }}>
                        {{$item->name}}
                    </option>
            @endforeach
        </select>
    </div>
    <p class="currencyValue fs-1 p-3  fw-bold text-light text-center m-0 ">  {{number_format($price, 2,)}}</p>
</div>

<script>

    window.onload = function(){
        $(function () {
 
            $('input.inputNumber , select.currencey-item').on("change , keyup , input",function () {
                var inputNumber   = $("input.inputNumber").val();
                var priceSelected = $('select.currencey-item ').find(":selected").data('price');

                var currencyValue = priceSelected;
        
                var ValueCalc = inputNumber * currencyValue;
                
                $('p.currencyValue').html((priceSelected).toFixed(2));
                $('p.currencyValue').html((ValueCalc).toFixed(2));


            });
  
            
        })
    }
</script>