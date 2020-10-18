{{-- If the user is logged in then the user data will be available for if they buy an item --}}
@php
if(auth()->check()){
$name = auth()->user()->name;
$email = auth()->user()->email;  
$phone = auth()->user()->phone;
} else {
  $name = '';
  $email = '';
  $phone = '';
}
@endphp


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <script>
      $(document).ready(function() {
      $(".buyButton").click(function(e) {
          e.preventDefault();
          var item = $(this).val();
          $.ajax({
          type: "POST",
          url: "/insert",
          data: {item: item, name: '{{$name}}', email: '{{$email}}', phone: '{{$phone}}'},
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")},
          success: function(response){
            alert(response);
        }, error: function() {
          console.log("error");
        }
});
      })
      })
      </script>


    <body>
{{-- displays all items on the webpage --}}
      <div class="cardContainer">
      @foreach ($items as $item)
      <div class="card">
        <img src="{{$item->item_img}}">
        <h1>{{$item->item_name}}</h1>
        <p class="price">£{{$item->item_price}}</p>
        @if(auth()->check())
      <p><button class='buyButton' value='{{$item->item_name}}'>Buy</button></p>
         @endif
      </div>
      @endforeach
      </div>
    </body>
</html>
