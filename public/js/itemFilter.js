$(document).ready(function() {
	window.onload = function() {
		var zero = '0';
		//on page load up this will run displaying all the items in the database
		$.ajax({
			type: 'GET',
			url: '/AllItems/' + zero,
			data: {allItems: 'test'},
			success: function(response) {
				$('#furniture_output').html(response);
			}
		});
	};
	//when the room select box changes then this will send a request to database.php requesting all the item types (ie. pans)
	$('#Room_Type').on('change', function() {
		var Room_Type = $(this).val();
		$('#Item_Type').empty();
		$('#Item_Type').append('<option disabled selected value="">Select Item</option>');
		if (Room_Type) {
			$.ajax({
				type: 'GET',
				url: '/getItemCat/' + Room_Type,
				dataType: 'json',
				success: function(data) {
					$.each(data, function(key, value) {
						$('#Item_Type').append('<option value="' + value.item_type_id + '">' + value.name + '</option>');
					});
				}
			})
		}
	});
	//when the user changes the room type then all the items associated with that room will display
	$('#Room_Type').on('change', function() {
		var Room_Type = $(this).val();
		$.ajax({
			type: 'GET',
			url: '/AllItems/' + Room_Type,
			data: {RoomItems: 'items'},
			success: function(response) {
				$('#furniture_output').html(response);
			}
		});
	});
	//when the user selects an item type then all of that item type will display
	$('#Item_Type').on('change', function() {
		var Item_Type = $(this).val();
		$.ajax({
			type: 'GET',
			url: '/items/' + Item_Type,
			data: {items: 'items'},
			success: function(response) {
				$('#furniture_output').html(response);
			}
		});
	});
});

