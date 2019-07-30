<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PopulateBrandsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:brands';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Popula la barra de navegación con marcas';

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
     * @return mixed
     */
    public function handle()
    {
      $brands = require database_path('data/brands.php');

      foreach ($brands as $brand) {
        \DB::table('brands')->insert($brand);
      }

      $this->info('Ok!');
    }
}
