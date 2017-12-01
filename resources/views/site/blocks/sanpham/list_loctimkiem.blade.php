@if (request()->all())
	<ul class="pull-right">
	<label>Đã lọc: </label>
	@foreach (request()->except('page','show') as $key => $value)
	@php
		$name = '';
		switch ($key) {
			case 'sortby':
				$name = 'Sắp theo ';
				if($value === 'name')
				{
					$name .= 'tên';
					break;
				}
				if($value === 'id')
				{
					$name .= 'ID';
					break;
				}

				$name .= $value === 'price' ? 'giá' : 'khuyến mãi';
				break;
			case 'price_from':
				$name = 'giá từ ' . $value;
				break;
			case 'price_to':
				$name = 'giá đến ' . $value;
				break;
			case 'orderby':
				$name = 'Hiện thị ';
				$name .= $value === 'asc' ? 'cũ nhất' : 'mới nhât';
				break;
			default:
				break;
		}
		
		$array_params = [
			'sortby',
			'price_from',
			'price_to',
			'orderby'
		];
	@endphp
	@if($value && in_array($key, $array_params))
	<li>
		<a href="{{ remove_param_url($key) }}">
			{{ $name }} &nbsp; <span class="glyphicon glyphicon-remove-sign"></span>
		</a>

	</li>
	@endif
	@endforeach
	<li>
		<a href="{{ url()->current() }}">
			Xóa hết &nbsp; <span class="glyphicon glyphicon-remove-sign"></span>
		</a>

	</li>
	</ul>
@endif