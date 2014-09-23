<?php namespace todoparrot\Providers;

use Illuminate\Routing\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'todoparrot\Http\Filters\MaintenanceFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'todoparrot\Http\Filters\AuthFilter',
		'auth.basic' => 'todoparrot\Http\Filters\BasicAuthFilter',
		'csrf' => 'todoparrot\Http\Filters\CsrfFilter',
		'guest' => 'todoparrot\Http\Filters\GuestFilter',
	];

}