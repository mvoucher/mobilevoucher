<?php

if (!function_exists('classActivePath')) {
	function classActivePath($path)
	{
		return Request::is($path) ? ' class="current"' : '';
	}
}

if (!function_exists('classActiveSegment')) {
	function classActiveSegment($segment, $value)
	{
		if (strpos(Request::segment($segment),$value) !== false) {
    return ' class="current active"';
}
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' class="current active"' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' class="current active"';
		}
		return '';
	}
}

if (!function_exists('classActiveOnlyPath')) {
	function classActiveOnlyPath($path)
	{
		return Request::is($path) ? ' current' : '';
	}
}

if (!function_exists('classActiveOnlySegment')) {
	function classActiveOnlySegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' current' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' current';
		}
		return '';
	}
}