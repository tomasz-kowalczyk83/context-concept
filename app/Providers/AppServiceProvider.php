<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Company\Interfaces\CompanyInterface;
use App\Company\Repositories\CompanyRepository;

// use App\Context\Manager;
// use App\Context\EnterpriseContext;
// use App\Context\TrainingProviderContext;

use App\InpinContext\RequestResolvers\EnterpriseRequestResolver;
use App\InpinContext\InpinContext;
use App\InpinContext\RequestResolvers\Manager as RequestResolversManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
			'App\\Company\\Interfaces\\CompanyInterface',
			'App\\Company\\Repositories\\CompanyRepository'
		);

		// $this->app->singleton(EnterpriseContext::class, function () {
		//     return new EnterpriseContext(new );
		// });
		//
		// $this->app->singleton(TrainingProviderContext::class, function () {
		//     return new TrainingProviderContext(new TrainingProviderRequestResolver);
		// });


		$this->app->singleton('requestResolver', function () {
		    return new RequestResolversManager([
				'system'			=> EnterpriseRequestResolver::class,
		        'enterprise' 	  	=> EnterpriseRequestResolver::class,
				'trainingProvider' 	=> EnterpriseRequestResolver::class,

		    ]);
		});

		$this->app->singleton('inpincontext', function () {
		    return new InpinContext();
		});
    }
}
