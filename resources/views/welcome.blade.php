@include('include.header')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script src="{{ URL::asset('http://code.jquery.com/jquery-3.1.1.js') }}" type="text/javascript" ></script>
        <script src="{{ URL::asset('js/itemFilter.js') }}" type="text/javascript" ></script>
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <title>Laravel</title>

    </head>
    <body>
  </div>
</div>
<div align ="center" >
{{-- The select box for selecting a room --}}
<select class="Room_Type" name="Room_Type" id="Room_Type">
  <option disabled selected value="">Select Room</option>
    @foreach ($rooms as $room)
  <option value='{{ $room->room_id }}'>{{ $room->room_name }}</option>
    @endforeach
</select>
  
 {{-- This is the second select box with all of the item types within --}}
 
<select class="Room_Item" name="Item_Type" id="Item_Type">
  <option disabled selected value="">Select Item</option>
</select>
</div>

  <div id="furniture_output"></div>

    </body>
</html>
