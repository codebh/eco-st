<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{

    public $data = [];
    public $path = '';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap  ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try{
            $fileName   ='sitemap.xml';
            $this->path =public_path('/sitemap/');

            ini_set("memory_limit","-1");
            set_time_limit(0);
            ini_set('max_execution_time', 0);
            ignore_user_abort(true);



            if(file_exists($this->path . $fileName)){
                chmod($this->path ,0777);
                chmod($this->path.$fileName,0777);
                rename($this->path.$fileName,$this->path . 'sitemap-old-' .date(format:'D-d-M-Yh-s') . 'xml');
            }

            SitemapGenerator::create('https://tafseel.net')
            ->hasCrawled(function(Url $url){
                $priorityUrl=[
                'shops',
                'sellWithUs',
                'termAndConditions',
                'faqs',
                'policy/buyer',
                ];

                if(
                    $url->segment(1) ==$priorityUrl[0]||
                    $url->segment(1) ==$priorityUrl[1]||
                    $url->segment(1) ==$priorityUrl[2]||
                    $url->segment(1) ==$priorityUrl[3]||
                    $url->segment(1) ==$priorityUrl[4]
                ){
                    $url->setPriority(1.0)
                    ->setLastModificationDate(Carbon::now());

                }else{
                    $url->setPriority(0.8)
                    ->setLastModificationDate(Carbon::now());

                }
                return $url;
            })

            ->writeToFile($this->path . $fileName);

            // Location To Sitemap File
            $sitemapUrl='https://tafseel.net/public/sitemap/'.$fileName;


            function myCurl($url){
                $ch=curl_init($url);
                curl_setopt($ch, CURLOPT_HEADER , 0);
                curl_exec($ch);
                $httpCode=curl_getinfo($ch , CURLINFO_HTTP_CODE);
                curl_close($ch);
                return$httpCode;
            }


            // Sitemap For Google
            $url="http://www.google.com/webmasters/sitemaps/ping?sitemap=".$sitemapUrl;
            $returnCode=myCurl($url);
            echo"<p>Google Sitemaps has been pinged(return code:$returnCode).</p>";



            // Sitemap For Bing/MSN
            $url="http://www.bing.com/ping?siteMap=".$sitemapUrl;
            $returnCode=myCurl($url);
            echo"<p>Bing/MSN Sitemaps has been pinged(return code:$returnCode).</p>";


            // Sitemap For Bing/MSN
            $url="http://www.bing.com/ping?siteMap=".$sitemapUrl;
            $returnCode=myCurl($url);
            echo"<p>Bing/MSN Sitemaps has been pinged(return code:$returnCode).</p>";

        }catch(Exception $e){
            Log::error($e);
        }

    }
}
