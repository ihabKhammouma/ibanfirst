<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //check if the env is setup
        if (env('API_END_POINT') == null) {
            $this->handleErrors('Unauthorized API_END_POINT must exist check env', 401);
        }
        if (env('API_USERNAME') == null) {
            $this->handleErrors('Unauthorized API_USERNAME must exist check env', 401);
        }
        if (env('API_PASSWORD') == null) {
            $this->handleErrors('Unauthorized API_PASSWORD must exist check env', 401);
        }
        $baseUrl = env('API_END_POINT');

        $userName = env('API_USERNAME');
        $password = env('API_PASSWORD');

        // declare header and auth for all aplication
        $options['headers'] = $this->getHeaders($userName, $password);

        $this->app->singleton('GuzzleHttp\Client', function ($api) use ($baseUrl, $options) {
            return new Client([
                'base_uri' => $baseUrl, 'headers' => $options['headers'],
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    // X-WSSE header for auth
    private function getHeaders($userName, $password)
    {
        $nonce = substr(sha1((string) time()), 0, 15);
        $nonce64 = base64_encode($nonce);
        $date = new \DateTime();
        $formattedDate = $date->format('Y-m-d\TH:i:s\Z');
        $digest = base64_encode(sha1($nonce . $formattedDate . $password, true));
        $header = sprintf('UsernameToken Username="%s", PasswordDigest="%s", Nonce="%s", Created="%s"', $userName, $digest, $nonce64, $formattedDate);

        return [
            'X-WSSE' => $header,
            'Content-Type' => 'application/json',
        ];
    }

    // handle validation message in json fromat
    private function handleErrors($msg, $code)
    {
        abort(response()->json(['msg' => $msg], $code));
    }
}
